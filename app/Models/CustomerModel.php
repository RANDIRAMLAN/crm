<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $allowedFields = [
        'company',
        'owner',
        'phone_number',
        'email',
        'address',
        'country',
        'province',
        'city',
        'district',
        'sub_district',
        'postal_code'
    ];
    // get all customer
    public function getAllCustomer()
    {
        return $this->findAll();
    }
    // add data customer
    public function addData($data)
    {
        return $this->insert($data);
    }
    // edit data customer
    public function editData($id, $company, $owner, $phone_number, $email, $address, $country, $province, $city, $district, $sub_district, $postal_code)
    {
        return $this
            ->set(['company' => $company])
            ->set(['owner' => $owner])
            ->set(['phone_number' => $phone_number])
            ->set(['email' => $email])
            ->set(['address' => $address])
            ->set(['country' => $country])
            ->set(['province' => $province])
            ->set(['city' => $city])
            ->set(['district' => $district])
            ->set(['sub_district' => $sub_district])
            ->set(['postal_code' => $postal_code])
            ->where(['id' => $id])
            ->update();
    }
    // autocomplate search data company
    public function autocompleteCompany($autocomplate)
    {
        return $this->like(['company' => $autocomplate])->findAll();
    }
}
