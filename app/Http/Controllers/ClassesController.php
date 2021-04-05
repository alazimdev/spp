<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classes;

use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class ClassesController extends Controller
{
    public function index()
    {
        return view('classes.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $classes  = Classes::all();
            return DataTables::of($classes)
                ->addColumn('created_at', function($classes){
                    return $classes->created_at->format('j M, Y h:ia');
                })->addColumn('updated_at', function($classes){
                    return $classes->updated_at->format('j M, Y h:ia');
                })->addColumn('action', function($classes){
                    return '<a href="/kelas/'.$classes->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a> <a data-admin="/kelas/'.$classes->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'departement' => 'required|string',
        ]);
        try {
            
            $classes                   = new Classes();
            $classes->name             = $request->get('name');
            $classes->departement      = $request->get('departement');

            $classes->save();
            alert()->success('Sukses','Data sukses disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function edit($id){
        if(Classes::find($id) != null){
            $classes       = Classes::find($id);
            return view('classes.edit', compact('classes'));
        }else{
            return abort('404');
        }
    }
    public function update(Request $request, $id){
        if(Classes::find($id) != null){
            $classes                    = Classes::find($id);
            $classes->name              = $request->get('name');
            $classes->departement              = $request->get('departement');
            $classes->update();
            alert()->success('Sukses','Data sukses diupdate');
            return redirect()->route('kelas-index');
        }else{
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy($id){
        try {
            $classes       = Classes::find($id);
            // dd($datasiswa->delete());
            if($classes->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
}
