<?php

namespace App\Controllers;

use App\Models\ComplaintModel;

class Complaint extends BaseController
{
    protected $ComplaintModel;

    public function __construct()
    {
        $this->ComplaintModel = new ComplaintModel();
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
}
