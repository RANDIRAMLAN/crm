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
    // show data and search
    public function show_data()
    {
        if ($this->request->isAJAX()) {
            $search = $this->request->getVar('search');
            if ($search) {
                $data = $this->UserModel->searchData($search);
            } else {
                $data = $this->UserModel->getAllData();
            }
            echo json_encode($data);
        } else {
            return redirect()->to('/User/list_user');
        }
    }
}
