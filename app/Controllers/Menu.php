<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\PerformanceModel;
use App\Models\PostalModel;

class Menu extends BaseController
{
    protected $MenuModel;
    protected $UserModel;
    protected $CustomerModel;
    protected $PostalModel;
    protected $PerformanceModel;
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->UserModel = new UserModel();
        $this->CustomerModel = new CustomerModel();
        $this->PostalModel = new PostalModel();
        $this->PerformanceModel = new PerformanceModel();
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
    // autocomplate search data company
    public function company()
    {
        $autocomplate = $this->request->getVar('term');
        $company = $this->CustomerModel->autocompleteCompany($autocomplate);
        $data = array();
        foreach ($company as $c) {
            $data[] = [
                'label' => $c['company'],
                'phone_number' => $c['phone_number'],
                'email' => $c['email']
            ];
        }
        echo json_encode($data);
    }
    // autocomplate search data user
    public function name()
    {
        $autocomplate = $this->request->getVar('term');
        $to_do = $this->UserModel->autocompleteUser($autocomplate);
        $data = array();
        foreach ($to_do as $u) {
            $data[] = [
                'label' => $u['name'],
                'employee_id' => $u['employee_id']
            ];
        }
        echo json_encode($data);
    }
    // performance 
    public function performance()
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
                'title' => 'Performance',
                'name'  => $name,
                'menu'  => $menu,
                'pending' => $this->PerformanceModel->pending(),
                'progress' => $this->PerformanceModel->progress(),
                'done' => $this->PerformanceModel->done(),
                'submit' => $this->PerformanceModel->submit(),
                'total' => $this->PerformanceModel->total()
            ];
            return view('/Menu/performance', $data);
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
