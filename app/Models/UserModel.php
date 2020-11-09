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
}
