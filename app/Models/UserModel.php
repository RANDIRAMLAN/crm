<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = [
        'employee_id',
        'name',
        'email',
        'password',
        'role_id',
        'status'
    ];
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
    // add data user
    public function add_data_user($data)
    {
        return $this->insert($data);
    }
}
