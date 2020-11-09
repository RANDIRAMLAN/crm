<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'employee_id' => '2020110701',
            'name'    => 'Randi',
            'email' => 'randi@gmail.com',
            'password' => '12345',
            'role_id' => 1,
            'status' => 1
        ];

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
