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
    // edit data user
    public function edit_data_user($email, $password, $role_id, $status)
    {
        return $this
            ->set(['password' => $password])
            ->set(['role_id' => $role_id])
            ->set(['status' => $status])
            ->where(['email' => $email])
            ->update();
    }
}
