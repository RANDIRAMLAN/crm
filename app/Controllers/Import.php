<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\PostalModel;


class Import extends BaseController
{
    protected $PostalModel;
    protected $MenuModel;
    public  function __construct()
    {
        $this->PostalModel = new PostalModel();
        $this->MenuModel = new MenuModel();
    }
    public function import()
    {
        $employee_id = session()->get('employee_id');
        $name = session()->get('name');
        $email = session()->get('email');
        $role_id = session()->get('role_id');
        if ($employee_id || $email) {
            if ($role_id == 1) {
                $menu = $this->MenuModel->getAllmenu();
            } else {
                $menu = $this->MenuModel->getUserMenu($role_id);
            }
            $data = [
                'title' => 'Import Data',
                'name'  => $name,
                'menu'  => $menu,
                'validation' => \Config\Services::validation()
            ];
            return view('/Import/import', $data);
        } else {
            return redirect()->to('/');
        }
    }

    // import data excel
    public function import_data_postal_code()
    {
        if (!$this->validate([
            'import_postal_code' => [
                'rules' => 'uploaded[import_postal_code]|ext_in[import_postal_code,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'File Can Not Empty',
                    'ext_in' => 'Only For File (xlsx)'
                ]
            ]
        ])) {
            return redirect()->to('Import/import')->withInput();
        }
        $file = $this->request->getFile('import_postal_code');
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        // lokasi file excel
        $spreadsheet = $reader->load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $sheet = $worksheet->toArray();
        $success = 0;
        $field = 0;
        //looping untuk mengambil data
        foreach ($sheet as $x => $row) {
            if ($x == 0) {
                continue;
            }
            $country = $row[0];
            $province = $row[1];
            $city = $row[2];
            $district = $row[3];
            $sub_district = $row[4];
            $postal_code = $row[5];
            $currentData = $this->PostalModel->where(['sub_district' => $sub_district])->where(['postal_code' => $postal_code])->first();
            if ($currentData) {
                $field++;
            } else {
                $this->PostalModel->insert([
                    'country' => $country,
                    'province' => $province,
                    'city' => $city,
                    'district' => $district,
                    'sub_district' => $sub_district,
                    'postal_code' => $postal_code
                ]);
                $success++;
            }
        }
        session()->setFlashdata('msg', '' . $success . ' Success to Import and ' . $field . ' Field to Import');
        return redirect()->to('/Import/import');
    }
}
