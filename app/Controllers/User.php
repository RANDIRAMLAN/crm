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
                    'rules' => 'required',
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
                $msg = [
                    'msg' => 'Data Saved Successfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_user');
        }
    }
}
