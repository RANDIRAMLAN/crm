<?php

namespace App\Controllers;

use App\Models\PerformanceModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends BaseController
{
    protected $PerformanceModel;

    public function __construct()
    {
        $this->PerformanceModel = new PerformanceModel();
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $complaint = $this->PerformanceModel->performance();
        // header coloum
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Employee ID')
            ->setCellValue('B1', 'Name')
            ->setCellValue('C1', 'Company')
            ->setCellValue('D1', 'Phone Number')
            ->setCellValue('E1', 'Complaint')
            ->setCellValue('F1', 'Status')
            ->setCellValue('G1', 'Complaint Date');


        $column = 2;
        //data in coloum
        foreach ($complaint as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['employee_id'])
                ->setCellValue('B' . $column, $data['name'])
                ->setCellValue('C' . $column, $data['company'])
                ->setCellValue('D' . $column, $data['phone_number'])
                ->setCellValue('E' . $column, $data['complaint'])
                ->setCellValue('F' . $column, $data['status'])
                ->setCellValue('G' . $column, $data['created_at']);
            $column++;
        }
        // set to .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Complaint';

        // Redirect result to web browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
