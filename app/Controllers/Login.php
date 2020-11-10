<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MenuModel;

class Login extends BaseController
{
    protected $UserModel;
    protected $MenuModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->MenuModel = new MenuModel();
    }
    // menu Login
    public function login()
    {
        $role_id = 0;
        $data = [
            'title' => 'Login',
            'menu'  => $this->MenuModel->getUserMenu($role_id)
        ];
        return view('/Login/login', $data);
    }
    // login to app
    public function login_app()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'id' => [
                    'role' => 'required',
                    'errors' => [
                        'required' => 'ID Employee or Email Can Not Empty'
                    ]
                ],
                'password' => [
                    'role' => 'required',
                    'errors' => [
                        'required'  => 'Password Can Not Empty'
                    ]
                ]
            ])) {

                $msg = [
                    'error' => [
                        'id'        => $validation->getError('id'),
                        'password'  => $validation->getError('password')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getVar('id');
                $password = $this->request->getVar('password');
                $user = $this->UserModel->getUser($id);
                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'employee_id' => $user['employee_id'],
                            'email'       => $user['email'],
                            'role_id'     => $user['role_id']
                        ];
                        $msg = [];
                        echo json_encode($msg);
                        session()->set($data);
                    } else {
                        $msg = [
                            'error' => [
                                'msg_password' => 'Wrong Password'
                            ]
                        ];
                        echo json_encode($msg);
                    }
                } else {
                    $msg = [
                        'error' => [
                            'msg_id' => 'Employee ID or Email Not Found'
                        ]
                    ];

                    echo json_encode($msg);
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
}
