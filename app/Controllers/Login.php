<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        $data = [
            'judul' => 'Login'
        ];
        return view('/Login/login', $data);
    }
}
