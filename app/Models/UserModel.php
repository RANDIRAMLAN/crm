<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = [];
    // get user by Id
    public function getUser($id)
    {
        return $this->where(['employee_id' => $id])->orWhere(['email' => $id])->first();
    }
    // get All data
    public function getAllData()
    {
        return $this->findAll();
    }
    // live search
    public function searchData($search)
    {
        return $this->like(['employee_id' => $search])
            ->orLike(['name' => $search])
            ->orLike(['email' => $search])
            ->orLike(['role_id' => $search])
            ->orLike(['status' => $search])
            ->findAll();
    }
}
