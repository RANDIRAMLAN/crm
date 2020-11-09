<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function list_complaint()
    {
        $data = [
            'judul' => 'List Complaint'
        ];
        return view('/Menu/list_complaint', $data);
    }
}
