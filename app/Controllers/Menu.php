<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\PostalModel;

class Menu extends BaseController
{
    protected $MenuModel;
    protected $UserModel;
    protected $CustomerModel;
    protected $PostalModel;
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->UserModel = new UserModel();
        $this->CustomerModel = new CustomerModel();
        $this->PostalModel = new PostalModel();
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
                'menu'  => $menu,
                'customer' => $this->CustomerModel->getAllCustomer(),
                'country' => $this->PostalModel->country()
            ];
            return view('/Menu/list_customer', $data);
        } else {
            return redirect()->to('/');
        }
    }
    // show data province
    public function province()
    {
        if ($this->request->isAJAX()) {
            $country = $this->request->getVar('country');
            $data = $this->PostalModel->province($country);
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
    // show data city
    public function city()
    {
        if ($this->request->isAJAX()) {
            $province = $this->request->getVar('province');
            $data = $this->PostalModel->city($province);
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
    // show data district
    public function district()
    {
        if ($this->request->isAJAX()) {
            $city = $this->request->getVar('city');
            $data = $this->PostalModel->district($city);
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
    // show data sub district
    public function sub_district()
    {
        if ($this->request->isAJAX()) {
            $district = $this->request->getVar('district');
            $data = $this->PostalModel->sub_district($district);
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
    //  show postal code
    public function postal_code()
    {
        if ($this->request->isAJAX()) {
            $sub_district = $this->request->getVar('sub_district');
            $data = $this->PostalModel->postal_code($sub_district);
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/list_customer');
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
                    'menu'  => $menu,
                    'user'  => $this->UserModel->getAllData()
                ];
                return view('/Menu/list_user', $data);
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
