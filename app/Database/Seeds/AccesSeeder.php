<?php

namespace App\Database\Seeds;

class AccesSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'role_id' => 1,
            'menu_id'    => 1,
        ];

        $data2 = [
            'role_id' => 1,
            'menu_id' => 2,
        ];

        $data3 = [
            'role_id' => 2,
            'menu_id' => 2
        ];

        // Using Query Builder
        $this->db->table('user_acces_menu')->insert($data1);
        $this->db->table('user_acces_menu')->insert($data2);
        $this->db->table('user_acces_menu')->insert($data3);
    }
}
