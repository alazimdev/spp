<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

use App\Models\Spp;
use App\Models\Payment;

use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class SppController extends Controller
{
    public function index()
    {
        return view('spp.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $spp  = Spp::all();
            return DataTables::of($spp)
            ->addColumn('nominal', function($spp){
                return 'Rp '.number_format($spp->nominal, 0, ",", ".");
            })->addColumn('start_end', function($spp){
                return $spp->year_start.'-'.$spp->month_start.' - '.$spp->year_end.'-'.$spp->month_end;
            })->addColumn('updated_at', function($spp){
                return $spp->updated_at->format('j M, Y h:ia');
            })->addColumn('action', function($spp){
                    return '<a href="/spp/'.$spp->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a> <a data-admin="/spp/'.$spp->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        try {
            $start = $request->get('year_start').$request->get('month_start');
            $end = $request->get('year_end').$request->get('month_end');
            //
            if((int)$start > (int)$end){
                alert()->warning('Maaf','Bulan dan Tahun mulai tidak bisa lebih dari Bulan dan Tahun berakhirnya pembayaran');
                return redirect()->back();
            }

            $oldstart;
            $oldend;

            //
            $spp  = Spp::all();
            foreach($spp as $data){
                $oldstart = $data->year_start.$data->month_start;
                $oldend = $data->year_end.$data->month_end;

                $result1 = (int)$oldstart - (int)$start;
                $result2 = (int)$oldstart - (int)$end;
                $result3 = (int)$oldend - (int)$start;
                $result4 = (int)$oldend - (int)$end;
                if($result1 > 0 && $result2 > 0 && $result3 > 0 && $result4 > 0){}
                else if($result1 < 0 && $result2 < 0 && $result3 < 0 && $result4 < 0){}
                else{
                    alert()->warning('Opps','Bulan dan Tahun pembayaran anda bentrok dengan spp periode: '.$data->period);
                    return redirect()->back();
                }
            }
            $spp                    = new Spp();
            $spp->period            = $request->get('period');
            $spp->month_start       = $request->get('month_start');
            $spp->year_start        = $request->get('year_start');
            $spp->month_end         = $request->get('month_end');
            $spp->year_end          = $request->get('year_end');
            $spp->nominal           = $request->get('nominal');

            $spp->save();
            alert()->success('Sukses','Data sukses disimpan');
            return redirect()->back();
        } catch (Exception $e){
            dd($e);
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function edit($id){
        if(Spp::find($id) != null){
            $pay = null;
            $payment       = Payment::where('spp_id',$id)->count();
            if($payment > 0){
                $pay = 'disabled';
            }
            $spp       = Spp::find($id);
            return view('spp.edit', compact('spp', 'pay'));
        }else{
            return abort('404');
        }
    }
    public function update(Request $request, $id){
        if(Spp::find($id) != null){
            $start = $request->get('year_start').$request->get('month_start');
            $end = $request->get('year_end').$request->get('month_end');
            //
            if((int)$start > (int)$end){
                alert()->warning('Maaf','Bulan dan Tahun mulai tidak bisa lebih dari Bulan dan Tahun berakhirnya pembayaran');
                return redirect()->back();
            }

            $oldstart;
            $oldend;

            //
            $spp  = Spp::where('id','!=',$id)->get();
            foreach($spp as $data){
                $oldstart = $data->year_start.$data->month_start;
                $oldend = $data->year_end.$data->month_end;

                $result1 = (int)$oldstart - (int)$start;
                $result2 = (int)$oldstart - (int)$end;
                $result3 = (int)$oldend - (int)$start;
                $result4 = (int)$oldend - (int)$end;
                if($result1 > 0 && $result2 > 0 && $result3 > 0 && $result4 > 0){}
                else if($result1 < 0 && $result2 < 0 && $result3 < 0 && $result4 < 0){}
                else{
                    alert()->warning('Opps','Bulan dan Tahun pembayaran anda bentrok dengan spp periode: '.$data->period);
                    return redirect()->back();
                }
            }
            $spp       = Spp::find($id);
            $spp->period            = $request->get('period');
            $spp->month_start       = $request->get('month_start');
            $spp->year_start        = $request->get('year_start');
            $spp->month_end         = $request->get('month_end');
            $spp->year_end          = $request->get('year_end');
            $spp->nominal           = $request->get('nominal');
            $spp->update();
            alert()->success('Sukses','Data sukses diupdate');
            return redirect()->route('spp-index');
        }else{
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy($id){
        try {
            $payment       = Payment::where('spp_id',$id)->count();
            if($payment > 0){
                alert()->warning('Maaf','Harap hapus data pembayaran untuk spp ini terlebih dahulu!');
                return redirect()->back();
            }
            $spp       = Spp::find($id);
            // dd($datasiswa->delete());
            if($spp->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
}
