<?php

namespace App\Models;

use CodeIgniter\Model;

class PerformanceModel extends Model
{
    protected $table      = 'complaint';
    public function performance()
    {
        return $this->db->table('user', 'complaint')
            ->select('user.employee_id, user.name, complaint.complaint, complaint.status, complaint.created_at, complaint.updated_at')
            ->join('complaint', 'user.employee_id=complaint.to_do')
            ->where(['user.status' => 1])
            ->where(['complaint.status' => 'Pending'])
            ->orWhere(['complaint.status' => 'Progress'])
            ->orWhere(['complaint.status' => 'Done'])
            ->orWhere(['complaint.status' => 'Submit'])
            ->orderBy('user.employee_id', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function pending()
    {
        return $this->selectCount('status')->where(['status' => 'Pending'])->countAllResults();
    }
    public function Progress()
    {
        return $this->selectCount('status')->where(['status' => 'Progress'])->countAllResults();
    }
    public function done()
    {
        return $this->selectCount('status')->where(['status' => 'Done'])->countAllResults();
    }
    public function Submit()
    {
        return $this->selectCount('status')->where(['status' => 'Submit'])->countAllResults();
    }
    public function total()
    {
        return $this->selectCount('status')->countAll();
    }
}
