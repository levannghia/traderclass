<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Role_Model;
use Illuminate\Support\Facades\Gate;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TestExcel extends Controller
{
    public function index()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Tên khách hàng');
        $sheet->setCellValue('B1', 'tên khóa học');
        $sheet->setCellValue('C1', 'Giá');

        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');
        echo "<meta http-equiv='refresh' content='0;url=hello world.xlsx'/>";

    }
    public function downloadExcel($id)
    {
        $order_detail = DB::table('order_detail')
        ->rightJoin('course','course.id','=','order_detail.course_id')
        ->rightJoin('order','order.id','=','order_detail.order_id')
        ->rightJoin('users','users.id','=','order.user_id')
        ->select('course.name','course.price','order_detail.created_at','users.fullname','users.email')
        ->where('order_detail.order_id',$id)->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //thiet lap kieu chu trong file excel
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
        //thiet lap do dai cot trong excel
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        // dd($order_detail[0]->fullname);
        // die;
        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'tên khóa học')
            ->setCellValue('C1', 'Giá')
            ->setCellValue('D1', 'Ngày mua')
            ->setCellValue('I1', 'Email')
            ->setCellValue('I2', 'Họ & Tên')
            ->setCellValue('J1', $order_detail[0]->email)
            ->setCellValue('J2', $order_detail[0]->fullname);

        $spreadsheet->getActiveSheet()
            ->getStyle('D')
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);
        $spreadsheet->getActiveSheet()
            ->getStyle('C')
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_NUMBER);
        $i = 2;
        $a = 2;
        $b = 2;
        $d = 2;
        $y =1;
            foreach ($order_detail as $value) {
                $spreadsheet->getActiveSheet()
                ->setCellValue('A'.$i++, $y++)
                ->setCellValue('B'.$a++, $value->name)
                ->setCellValue('C'.$b++, $value->price)
                ->setCellValue('D'.$d++, Date::PHPToExcel($value->created_at));
            }
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-disposition: attachment; filename=result.xlsx');
        $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
        $writer->save('php://output');
        // echo "<meta http-equiv='refresh' content='0;url=hello world.xlsx'/>";

    }
}
