<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    public function getAllmenu()
    {
        return $this->db->table('menu')->get()->getResultArray();
    }
    public function getUserMenu($role_id)
    {
        return $this->db->table('menu')
            ->join('user_menu', 'menu.menu_id=user_menu.id')
            ->where(['status' => 1])
            ->where(['user_menu.id' => $this->db->table('user_menu')
                ->select('user_menu.id')
                ->join('user_acces_menu', 'user_menu.id=user_acces_menu.menu_id')
                ->where(['user_acces_menu.role_id' => $role_id])
                ->get()
                ->getRowArray()])
            ->get()
            ->getResultArray();
    }
}
