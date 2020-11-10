<?php

namespace App\Database\Seeds;

class SubMenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'menu_id' => 2,
            'desc'    => 'Customer',
            'url'     => '/menu/list_customer',
            'icon'    => '-',
            'status'  => 1
        ];

        $data2 = [
            'menu_id' => 2,
            'desc'    => 'Complaint',
            'url'     => '/menu/list_complaint',
            'icon'    => '-',
            'status'  => 1
        ];

        $data3 = [
            'menu_id' => 1,
            'desc'    => 'User',
            'url'     => '/menu/list_user',
            'icon'    => '-',
            'status'  => 1
        ];

        $data4 = [
            'menu_id' => 2,
            'desc'    => 'Logout',
            'url'     => '/menu/logout',
            'icon'    => '-',
            'status'  => 1
        ];

        // Using Query Builder
        $this->db->table('menu')->insert($data1);
        $this->db->table('menu')->insert($data2);
        $this->db->table('menu')->insert($data3);
        $this->db->table('menu')->insert($data4);
    }
}
