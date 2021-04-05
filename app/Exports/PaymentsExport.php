<?php

namespace App\Exports;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Spp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PaymentsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    function __construct($spp_id) {
        $this->spp_id = $spp_id;
    }
    public function collection()
    {
        if($this->spp_id == 'null'){
            $payment = Payment::leftJoin('spps', 'payments.spp_id','=','spps.id')->leftJoin('students', 'payments.student_id','=','students.id')
            ->select('nis','full_name','gender','period','amount')->get();
        }else{
            $payment = Payment::where('spp_id',$this->spp_id)->leftJoin('spps', 'payments.spp_id','=','spps.id')->leftJoin('students', 'payments.student_id','=','students.id')
            ->select('nis','full_name','gender','period','amount')->get();
        }
        return $payment;
    }
    public function headings(): array
    {
        return [
            'NIS',
            'Nama Lengkap',
            'Jenis Kelamin',
            'SPP Periode',
            'Nominal',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12)->setName('Arial')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS
                    ]
                ]);
                $event->sheet->getDelegate()->getStyle('A2:E200')->getFont()->setSize(10)->setName('Arial')->applyFromArray([
                    'font' => [
                        'bold' => false,
                    ]
                ]);
            },
        ];
    }
}
