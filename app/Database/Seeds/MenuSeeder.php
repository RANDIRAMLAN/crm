<?php

namespace App\Database\Seeds;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'menu' => 'Admin',
        ];

        $data2 = [
            'menu' => 'User',
        ];

        // Using Query Builder
        $this->db->table('user_menu')->insert($data1);
        $this->db->table('user_menu')->insert($data2);
    }
}
