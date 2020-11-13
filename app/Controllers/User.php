<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    // add data user
    public function add_data_user()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'employee_id' => [
                    'rules' => 'is_unique[user.employee_id]|required',
                    'errors' => [
                        'required' => 'Employee Id Can Not Empty',
                        'is_unique' => 'Emplody Id Already Exits'
                    ]
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name Can Not Emty'
                    ]
                ],
                'email' => [
                    'rules' => 'is_unique[user.email]|required',
                    'errors' => [
                        'required' => 'Email Can Not Empty',
                        'is_unique' => 'Email Already Exits'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Can Not Empty'
                    ]
                ],
                'role_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Id Can Not Empty'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Can Not Empty'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'employee_id' => $validation->getError('employee_id'),
                        'name'        => $validation->getError('name'),
                        'email'       => $validation->getError('email'),
                        'password'    => $validation->getError('password'),
                        'role_id'     => $validation->getError('role_id'),
                        'status'      => $validation->getError('status')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $employee_id = $this->request->getVar('employee_id');
                $name = $this->request->getVar('name');
                $email = $this->request->getVar('email');
                $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                $role_id = $this->request->getVar('role_id');
                $status = $this->request->getVar('status');
                $data = [
                    'employee_id'   => $employee_id,
                    'name'          => $name,
                    'email'         => $email,
                    'password'      => $password,
                    'role_id'       => $role_id,
                    'status'        => $status
                ];
                $this->UserModel->add_data_user($data);
                $this->_sendEmail('add');
                $msg = [
                    'msg' => 'Data Saved Successfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_user');
        }
    }
    // edit data user
    public function edit_data_user()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Can Not Empty'
                    ]
                ],
                'role_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Can Not Empty'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Can Not Empty'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'password' => $validation->getError('password'),
                        'role_id' => $validation->getError('role_id'),
                        'status' => $validation->getError('status')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $email = $this->request->getVar('email');
                $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                $role_id = $this->request->getVar('role_id');
                $status = $this->request->getVar('status');
                $this->UserModel->edit_data_user($email, $password, $role_id, $status);
                $this->_sendEmail('edit');
                $msg = [
                    'msg' => 'Data Updated Successfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_user');
        }
    }
    //  email verifikasi saat aktivasi dan lupa sandi
    private function _sendEmail($type)
    {
        $email = \Config\Services::email();
        $email->setFrom('appjingaraka@gmail.com', 'CRM');
        $email->setTo($this->request->getVar('email'));
        if ($type == 'add') {
            $email->setSubject('Create Account');
            $email->setMessage('Your Account: <br> 
                            <table border="1">
                                <tr>
                                    <td>Employee ID</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td>Role</td>
                                    <td>Status</td>
                                    </tr>
                                <tr>
                                    <td>' . $this->request->getVar('employee_id') . '</td>
                                    <td>' . $this->request->getVar('email') . '</td>
                                    <td>' . $this->request->getVar('password') . '</td>
                                    <td>' . $this->request->getVar('role_id') . '</td>
                                    <td>' . $this->request->getVar('status') . '</td>
                                </tr>
                            </table>');
        }
        if ($type == 'edit') {
            $email->setSubject('Update Account');
            $email->setMessage('This Update About Your Account: <br> 
                            <table border="1">
                                <tr>
                                    <td>Password</td>
                                    <td>Role</td>
                                    <td>Status</td>
                                    </tr>
                                <tr>
                                    <td>' . $this->request->getVar('password') . '</td>
                                    <td>' . $this->request->getVar('role_id') . '</td>
                                    <td>' . $this->request->getVar('status') . '</td>
                                </tr>
                            </table>');
        }
        if ($email->send(false)) {
            $email->printDebugger();
        } else {
            $email->send();
        }
    }
}
