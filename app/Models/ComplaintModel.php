<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintModel extends Model
{
    protected $table      = 'complaint';
    protected $allowedFields = [
        'company',
        'phone_number',
        'email',
        'complaint',
        'complaint_desc',
        'screen_complaint',
        'status',
        'to_do',
        'solution',
        'screen_fix'
    ];
    protected $useTimestamps = true;

    // get all data 
    public function getComplaint($employee_id)
    {
        return $this
            ->where(['to_do' => $employee_id])
            ->where(['status' => 'Pending'])
            ->orWhere(['status' => 'Progress'])
            ->orWhere(['status' => 'Done'])
            ->findAll();
    }
    public function getAllComplaint()
    {
        return $this
            ->where(['status' => 'Pending'])
            ->orWhere(['status' => 'Progress'])
            ->orWhere(['status' => 'Done'])
            ->findAll();
    }
    // get by Data
    public function getData($search)
    {
        return $this
            ->like(['company' => $search])
            ->orLike(['phone_number' => $search])
            ->orLike(['email' => $search])
            ->orLike(['complaint' => $search])
            ->orLike(['complaint_desc' => $search])
            ->orLike(['status' => $search])
            ->orLike(['to_do' => $search])
            ->orLike(['solution' => $search])
            ->findAll();
    }
    // edit data complaint
    public function edit_data_complaint($id, $company, $phone_number, $email, $complaint, $complaint_desc, $screen_complaint, $status, $to_do, $sulution, $screen_fix)
    {
        return $this
            ->set(['company' => $company])
            ->set(['phone_number' => $phone_number])
            ->set(['email' => $email])
            ->set(['complaint' => $complaint])
            ->set(['complaint_desc' => $complaint_desc])
            ->set(['screen_complaint' => $screen_complaint])
            ->set(['status' => $status])
            ->set(['to_do' => $to_do])
            ->set(['sulution' => $sulution])
            ->set(['screen_fix' => $screen_fix])
            ->where(['id' => $id])
            ->update();
    }
}
