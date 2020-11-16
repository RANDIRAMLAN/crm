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
            return view('/Complaint/complaint', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
