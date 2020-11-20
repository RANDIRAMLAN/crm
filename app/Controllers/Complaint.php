<?php

namespace App\Controllers;

use App\Models\ComplaintModel;
use App\Models\MenuModel;

class Complaint extends BaseController
{
    protected $ComplaintModel;
    protected $MenuModel;

    public function __construct()
    {
        $this->ComplaintModel = new ComplaintModel();
        $this->MenuModel = new MenuModel();
    }
    // show data Complaint
    public function show_data_complaint()
    {
        if ($this->request->isAJAX()) {
            $search = $this->request->getVar('search');
            $employee_id = session()->get('employee_id');
            $role_id = session()->get('role_id');
            if ($role_id == 1) {
                if ($search) {
                    $data = $this->ComplaintModel->getData($search);
                } else {
                    $data = $this->ComplaintModel->getAllComplaint();
                }
            } else {
                if ($search) {
                    $data = $this->ComplaintModel->getData($search);
                } else {
                    $data = $this->ComplaintModel->getComplaint($employee_id);
                }
            }
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_complaint');
        }
    }

    // add complaint
    public function add_data_complaint()
    {
        $employee_id = session()->get('employee_id');
        $name = session()->get('name');
        $email = session()->get('email');
        $role_id = session()->get('role_id');
        if ($employee_id || $email) {
            if ($role_id == 1) {
                $menu = $this->MenuModel->getAllmenu();
            } else {
                $menu = $this->MenuModel->getUserMenu($role_id);
            }
            $data = [
                'title' => 'Complaint',
                'name'  => $name,
                'menu'  => $menu
            ];
            return view('/Complaint/add_data_complaint', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // save data complaint
    public function save_data_complaint()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            $role_id = session()->get('role_id');
            $company = $this->request->getVar('company');
            $phone_number = $this->request->getVar('phone_number');
            $email = $this->request->getVar('email');
            $complaint = $this->request->getVar('complaint');
            $complaint_desc = $this->request->getVar('complaint_desc');
            $screen_complaint = 'Default.jpg';
            $status = 'Pending';
            $to_do = $this->request->getVar('to_do');
            $solution = '-';
            $screen_fix = 'Default.jpg';
            if ($role_id == 1) {
                if (!$this->validate([
                    'company' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Company Can Not Empty'
                        ]
                    ],
                    'phone_number' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Phone Number Can Not Empty'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Email Can Not Empty'
                        ]
                    ],
                    'complaint' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Complaint Can Not Empty'
                        ]
                    ],
                    'complaint_desc' => [
                        'rules' => 'required|max_length[500]',
                        'errors' => [
                            'required' => 'Complaint Description Can Not Empty',
                            'max_length' => 'Max Length 500 Character'
                        ]
                    ],
                    'to_do' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'To Can Not Empty'
                        ]
                    ]
                ])) {
                    $msg = [
                        'error' => [
                            'company' => $validation->getError('company'),
                            'phone_number' => $validation->getError('phone_number'),
                            'email' => $validation->getError('email'),
                            'complaint' => $validation->getError('complaint'),
                            'complaint_desc' => $validation->getError('complaint_desc'),
                            'to_do' => $validation->getError('to_do')
                        ]
                    ];
                    echo json_encode($msg);
                } else {
                    $data = [
                        'company' => $company,
                        'phone_number' => $phone_number,
                        'email' => $email,
                        'complaint' => $complaint,
                        'complaint_desc' => $complaint_desc,
                        'screen_complaint' => $screen_complaint,
                        'status' => $status,
                        'to_do' => $to_do,
                        'solution' => $solution,
                        'screen_fix' => $screen_fix
                    ];
                    $this->ComplaintModel->addData($data);
                    $msg = [
                        'msg' => 'Data Saved Successfully'
                    ];
                    echo json_encode($msg);
                }
            } else {
                $msg = [
                    'msg' => 'You Can Not Save This Data'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_complaint');
        }
    }
    // set screen_complaint
    public function screen_complaint()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'screen_complaint' => [
                    'rules' => 'uploaded[screen_complaint]|is_image[screen_complaint]|mime_in[screen_complaint,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Screen Complaint Can Not Empty',
                        'is_image' => 'Only For Screen Complaint(Photo)',
                        'mime_in' => 'File Must .jeg, .jpg or .png'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'screen_complaint' => $validation->getError('screen_complaint')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getVar('id');
                $new_screen_complaint = $this->request->getFile('screen_complaint');
                $current_screen = $this->ComplaintModel->getById($id);
                $screen_complaint = $new_screen_complaint->getRandomName();
                $new_screen_complaint->move('img/Complaint', $screen_complaint);
                if ($current_screen['screen_complaint'] != 'Default.jpg') {
                    unlink('img/Complaint/' . $current_screen['screen_complaint']);
                }
                $this->ComplaintModel->screen_complaint($id, $screen_complaint);
                $msg = [
                    'msg' => 'Screen Complaint Updated Successfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_complaint');
        }
    }
    // set screen fix
    public function screen_fix()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'screen_fix' => [
                    'rules' => 'uploaded[screen_fix]|is_image[screen_fix]|mime_in[screen_fix,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Screen Fix Can Not Empty',
                        'is_image' => 'Only For Screen Complaint(Photo)',
                        'mime_in' => 'File Must .jeg, .jpg or .png'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'screen_fix' => $validation->getError('screen_fix')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getVar('id_fix');
                $new_screen_fix = $this->request->getFile('screen_fix');
                $current_screen = $this->ComplaintModel->getById($id);
                $screen_fix = $new_screen_fix->getRandomName();
                $new_screen_fix->move('img/Complaint', $screen_fix);
                if ($current_screen['screen_fix'] != 'Default.jpg') {
                    unlink('img/Complaint/' . $current_screen['screen_fix']);
                }
                $this->ComplaintModel->screen_fix($id, $screen_fix);
                $msg = [
                    'msg' => 'Screen Fix Updated Successfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_complaint');
        }
    }
    // adit complaint
    public function edit_data_complaint($id)
    {
        $employee_id = session()->get('employee_id');
        $name = session()->get('name');
        $email = session()->get('email');
        $role_id = session()->get('role_id');

        if ($employee_id || $email) {
            if ($role_id == 1) {
                $menu = $this->MenuModel->getAllmenu();
            } else {
                $menu = $this->MenuModel->getUserMenu($role_id);
            }
            $data = [
                'title' => 'Complaint',
                'name'  => $name,
                'menu'  => $menu,
                'complaint'  => $this->ComplaintModel->getById($id)
            ];
            return view('/Complaint/edit_data_complaint', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // update data complaint
    public function update_data_complaint()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Can Not Empty'
                    ]
                ],
                'solution' => [
                    'rules' => 'required|max_length[500]',
                    'errors' => [
                        'required' => 'Solution Can Not Empty',
                        'max_length' => 'Max Length 500 Character'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'status' => $validation->getError('status'),
                        'solution' => $validation->getError('solution')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getVar('id');
                $status = $this->request->getVar('status');
                $solution = $this->request->getVar('solution');
                if ($status == 'Close') {
                    $this->ComplaintModel->editData($id, $status, $solution);
                    $msg = [
                        'msg' => 'Data Updated Successfully'
                    ];
                } else {
                    $this->ComplaintModel->editData($id, $status, $solution);
                    $msg = [
                        'msg' => 'Data Updated Successfully'
                    ];
                }
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('Complaint/edit_data_complaint');
        }
    }
}
