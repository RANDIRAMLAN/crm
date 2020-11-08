<?php

namespace App\Database\Seeds;

class RoleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'role' => 'Admin',
        ];

        $data2 = [
            'role' => 'User',
        ];

        // Using Query Builder
        $this->db->table('user_role')->insert($data1);
        $this->db->table('user_role')->insert($data2);
    }
}
