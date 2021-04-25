<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

use App\Models\User;
use App\Models\Student;
use App\Models\Spp;
use App\Models\Payment;

use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\PaymentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $student    = Student::all();
        $spp        = Spp::all();
        return view('payments.index', compact('student','spp'));
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $payment  = Payment::all();
            return DataTables::of($payment)
                ->addColumn('student_id', function($payment){
                    return Student::find($payment->student_id)->nisn;
                })->addColumn('spp_id', function($payment){
                    return Spp::find($payment->spp_id)->period;
                })->addColumn('amount', function($payment){
                    return 'Rp '.number_format($payment->amount, 0, ",", ".");
                })->addColumn('created_at', function($payment){
                    return $payment->created_at->format('j M, Y h:ia');
                })->addColumn('updated_at', function($payment){
                    return $payment->updated_at->format('j M, Y h:ia');
                })->addColumn('action', function($payment){
                    return '<a data-admin="/pembayaran/'.$payment->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function spp(Request $request){
        $student = Student::find($request->student_id);
        $ymes = $student->year_entered.$student->month_entered;
        $ymns = $student->year_end.$student->month_end;
        $spp = Spp::all();
        $spps_id = [];
        foreach($spp as $data){
            $ymep = $data->year_start.$data->month_start;
            $ymnp = $data->year_end.$data->month_end;
            //jika bulan tahun tamat belum diisi
            if($student->year_end == null && $student->month_end == null){
                if((int)$ymes <= (int)$ymnp){
                    array_push($spps_id, $data->id);
                }
            }else{
                if((int)$ymes > (int)$ymnp){
                    //
                }else if((int)$ymep > (int)$ymns){
                    //
                }else{
                    array_push($spps_id, $data->id);
                }
                
                // if((int)$ymep <= (int)$ymns && (int)$ymns <= (int)$ymnp){
                //     array_push($spps_id, $data->id);
                // }
            }
        }
        $data['spp'] = Spp::whereIn('id',$spps_id)->get();
        return response()->json($data);
    }
    public function payment(Request $request){
        $student = Student::find($request->student_id);
        $ymes = (int)$student->year_entered * 12 + (int)$student->month_entered;
        $ymns = (int)$student->year_end * 12 + (int)$student->month_end;
        $spp = Spp::find($request->spp_id);
        $ymep = (int)$spp->year_start * 12 + (int)$spp->month_start;
        $ymnp = (int)$spp->year_end * 12 + (int)$spp->month_end;
        $total_bulan = $ymnp - $ymep + 1;
        if($ymep <= $ymes){
            $total_bulan = $total_bulan + $ymep - $ymes;
        }
        if($student->year_end != null && $student->month_end != null){
            if($ymnp >= $ymns){
                $total_bulan = $total_bulan + $ymns - $ymnp;
            }
        }
        $harus_dibayaru = (int)$spp->nominal * $total_bulan;
        $payment = Payment::where([['student_id',$request->student_id],['spp_id',$request->spp_id]])->sum('amount');
        $grand_total = $harus_dibayaru - $payment;
        return response()->json($grand_total);
    }
    public function store(Request $request)
    {
        try {
            
            $payment                = new Payment();
            $payment->student_id    = $request->get('student_id');
            $payment->spp_id        = $request->get('spp_id');
            $payment->date          = $request->get('date');
            $payment->amount        = $request->get('amount');
            $payment->user_id       = Auth::User()->id;

            $payment->save();
            alert()->success('Sukses','Data sukses disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy($id){
        try {
            $payment       = Payment::find($id);
            // dd($datasiswa->delete());
            if($payment->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
    public function export(Request $request) 
    {
        return Excel::download(new PaymentsExport($request->get('spp_id')), 'Laporan Transaksi Pembayaran SPP.xlsx');
    }
}
