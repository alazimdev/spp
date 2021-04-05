<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $user  = User::all();
            return DataTables::of($user)
                ->addColumn('is_superuser', function($user){
                    if ($user->is_superuser == True){
                        return 'Admin';
                    }else{
                        return 'Petugas';
                    }
                })->addColumn('created_at', function($user){
                    return $user->created_at->format('j M, Y h:ia');
                })->addColumn('updated_at', function($user){
                    return $user->updated_at->format('j M, Y h:ia');
                })->addColumn('action', function($user){
                    return '<a href="/pengguna/'.$user->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a> <a data-admin="/pengguna/'.$user->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'is_superuser' => 'required',
        ]);
        try {
            
            $user                   = new User();
            $user->name             = $request->get('name');
            $user->password         = $request->get('password');
            $user->email            = $request->get('email');
            $user->is_superuser     = $request->get('is_superuser');

            $user->save();
            alert()->success('Sukses','Data sukses disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function edit($id){
        if(User::find($id) != null){
            $user       = User::find($id);
            return view('users.edit', compact('user'));
        }else{
            return abort('404');
        }
    }
    public function update(Request $request, $id){
        if(User::find($id) != null){
            $user       = User::find($id);
            $user->name             = $request->get('name');
            if ($request->get('password') != null){
                $user->password         = $request->get('password');
            }
            $user->email            = $request->get('email');
            $user->update();
            alert()->success('Sukses','Data sukses diupdate');
            return redirect()->route('pengguna-index');
        }else{
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy($id){
        try {
            $user       = User::find($id);
            // dd($datasiswa->delete());
            if($user->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }
}
