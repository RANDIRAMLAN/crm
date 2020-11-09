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
            'password' => '$2y$10$hLXcZV/vVrO1b/zMmBfp/.ol3nWyFNkBW4oHXoGfoIyaZGwQ3osne',
            'role_id' => 1,
            'status' => 1
        ];

        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
