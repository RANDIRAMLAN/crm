<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $MenuModel;
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }
    // form list complaint
    public function list_complaint()
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
                'title' => 'List Complaint',
                'name'  => $name,
                'menu'  => $menu
            ];
            return view('/Menu/list_complaint', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // form list customer
    public function list_customer()
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
                'title' => 'List Customer',
                'name'  => $name,
                'menu'  => $menu
            ];
            return view('/Menu/list_complaint', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // form list user
    public function list_user()
    {
        $employee_id = session()->get('employee_id');
        $name = session()->get('name');
        $email = session()->get('email');
        $role_id = session()->get('role_id');
        if ($employee_id || $email) {
            if ($role_id == 1) {
                if ($role_id == 1) {
                    $menu = $this->MenuModel->getAllmenu();
                } else {
                    $menu = $this->MenuModel->getUserMenu($role_id);
                }
                $data = [
                    'title' => 'List User',
                    'name'  => $name,
                    'menu'  => $menu
                ];
                return view('/Menu/list_complaint', $data);
            } else {
                return redirect()->to('/menu/list_complaint');
            }
        } else {
            return redirect()->to('/');
        }
    }
    // logout app
    public function  logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
