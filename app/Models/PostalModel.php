<?php

namespace App\Models;

use CodeIgniter\Model;

class PostalModel extends Model
{
    protected $table      = 'postal';
    protected $allowedFields = [
        'country',
        'province',
        'city',
        'district',
        'sub_district',
        'postal_code'
    ];

    // show country
    public function country()
    {
        return $this->select('country')->distinct()->orderby('country', 'ASC')->findAll();
    }
    // show province
    public function province($country)
    {
        return $this->select('province')->distinct()->where(['country' => $country])->orderby('province', 'ASC')->findAll();
    }
    // show city
    public function city($province)
    {
        return $this->select('city')->distinct()->where(['province' => $province])->orderby('city', 'ASC')->findAll();
    }
    // show District
    public function district($city)
    {
        return $this->select('district')->distinct()->where(['city' => $city])->orderby('district', 'ASC')->findAll();
    }
    // show sub district
    public function sub_district($district)
    {
        return $this->select('sub_district')->distinct()->where(['district' => $district])->orderby('sub_district', 'ASC')->findAll();
    }
    // show postal code
    public function postal_code($sub_district)
    {
        return $this->select('postal_code')->distinct()->where(['sub_district' => $sub_district])->orderby('postal_code', 'ASC')->findAll();
    }
}
