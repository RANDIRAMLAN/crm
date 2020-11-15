<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $CustomerModel;
    public function __construct()
    {
        $this->CustomerModel = new CustomerModel();
    }
    // add data customer
    public function add_data_customer()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            $company = $this->request->getVar('company');
            $owner = $this->request->getVar('owner');
            $phone_number = $this->request->getVar('phone_number');
            $email = $this->request->getVar('email');
            $address = $this->request->getVar('address');
            $country = $this->request->getVar('country');
            $province = $this->request->getVar('province');
            $city = $this->request->getVar('city');
            $district = $this->request->getVar('disrict');
            $sub_district = $this->request->getVar('sub_district');
            $postal_code = $this->request->getVar('postal_code');
            if (!$this->validate([
                'company' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Company Can Not Empty'
                    ]
                ],
                'owner' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Owner Can Not Empty'
                    ]
                ],
                'phone_number' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Phone Number Can Not Empty'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email Can Not Empty'
                    ]
                ],
                'address' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Address Can Not Empty'
                    ]
                ],
                'country' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Country Can Not Empty'
                    ]
                ],
                'province' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Province Can Not Empty'
                    ]
                ],
                'city' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'City Can Not Empty'
                    ]
                ],
                'district' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'District Can Not Empty'
                    ]
                ],
                'sub_district' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sub District Can Not Empty'
                    ]
                ],
                'postal_code' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Postal Code Can Not Empty'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'company' => $validation->getError('company'),
                        'owner' => $validation->getError('owner'),
                        'phone_number' => $validation->getError('phone_number'),
                        'email' => $validation->getError('email'),
                        'address' => $validation->getError('address'),
                        'country' => $validation->getError('country'),
                        'province' => $validation->getError('province'),
                        'city' => $validation->getError('city'),
                        'district' => $validation->getError('district'),
                        'sub_district' => $validation->getError('sub_district'),
                        'postal_code' => $validation->getError('postal_code')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $data = [
                    'company' => $company,
                    'owner' => $owner,
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'address' => $address,
                    'country' => $country,
                    'province' => $province,
                    'citu' => $city,
                    'district' => $district,
                    'sub_district' => $sub_district,
                    'postal_code' => $postal_code
                ];
                $this->CustomerModel->addData($data);
                $msg = [
                    'msg' => 'Data Saved Succesfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
    // edit data customer
    public function edit_data_customer()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $company = $this->request->getVar('company');
            $owner = $this->request->getVar('owner');
            $phone_number = $this->request->getVar('phone_number');
            $email = $this->request->getVar('email');
            $address = $this->request->getVar('address');
            $new_country = $this->request->getVar('country');
            $old_country = $this->request->getVar('old_country');
            $new_province = $this->request->getVar('province');
            $old_province = $this->request->getVar('old_province');
            $new_city = $this->request->getVar('city');
            $old_city = $this->request->getVar('old_city');
            $new_district = $this->request->getVar('district');
            $old_district = $this->request->getVar('old_district');
            $new_sub_district = $this->request->getVar('sub_district');
            $old_sub_district = $this->request->getVar('old_sub_district');
            $new_postal_code = $this->request->getVar('postal_code');
            $old_postal_code = $this->request->getVar('old_postal_code');
            if ($new_country) {
                $country = $new_country;
                $rules_country = 'required';
            } else {
                $country = $old_country;
                $rules_country = 'permit_empty';
            }
            if ($new_province) {
                $province = $new_province;
                $rules_province = 'required';
            } else {
                $province = $old_province;
                $rules_province = 'permit_empty';
            }
            if ($new_city) {
                $city = $new_city;
                $rules_city = 'required';
            } else {
                $city = $old_city;
                $rules_city = 'permit_empty';
            }
            if ($new_district) {
                $district = $new_district;
                $rules_district = 'required';
            } else {
                $district = $old_district;
                $rules_district = 'permit_empty';
            }
            if ($new_sub_district) {
                $sub_district = $new_sub_district;
                $rules_sub_district = 'required';
            } else {
                $sub_district = $old_sub_district;
                $rules_sub_district = 'permit_empty';
            }
            if ($new_postal_code) {
                $postal_code = $new_postal_code;
            } else {
                $postal_code = $old_postal_code;
            }
            if (!$this->validate([
                'company' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Company Can Not Empty'
                    ]
                ],
                'owner' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Owner Can Not Empty'
                    ]
                ],
                'phone_number' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Phone Number Can Not Empty'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email Can Not Empty'
                    ]
                ],
                'address' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Address Can Not Empty'
                    ]
                ],
                'country' => [
                    'rules' => $rules_country,
                    'errors' => [
                        'required' => 'Country Can Not Empty'
                    ]
                ],
                'province' => [
                    'rules' => $rules_country,
                    'errors' => [
                        'required' => 'Province Can Not Empty'
                    ]
                ],
                'city' => [
                    'rules' => $rules_province,
                    'errors' => [
                        'required' => 'City Can Not Empty'
                    ]
                ],
                'district' => [
                    'rules' => $rules_city,
                    'errors' => [
                        'required' => 'District Can Not Empty'
                    ]
                ],
                'sub_district' => [
                    'rules' => $rules_district,
                    'errors' => [
                        'required' => 'Sub District Can Not Empty'
                    ]
                ],
                'postal_code' => [
                    'rules' => $rules_sub_district,
                    'errors' => [
                        'required' => 'Postal Code Can Not Empty'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'company' => $validation->getError('company'),
                        'owner' => $validation->getError('owner'),
                        'phone_number' => $validation->getError('phone_number'),
                        'email' => $validation->getError('email'),
                        'address' => $validation->getError('address'),
                        'country' => $validation->getError('country'),
                        'province' => $validation->getError('province'),
                        'city' => $validation->getError('city'),
                        'district' => $validation->getError('district'),
                        'sub_district' => $validation->getError('sub_district'),
                        'postal_code' => $validation->getError('postal_code')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $this->CustomerModel->editData($id, $company, $owner, $phone_number, $email, $address, $country, $province, $city, $district, $sub_district, $postal_code);
                $msg = [
                    'msg' => 'Data Updated Succesfully'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/Menu/list_customer');
        }
    }
}
