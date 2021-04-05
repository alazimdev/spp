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
        alert()->success('Sukses','Data sukses disimpan');
        return view('users.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $user  = User::all();
            return DataTables::of($user)
                ->addColumn('action', function($user){
                    return '<a href="/pengguna/'.$user->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a> <a data-admin="/pengguna/'.$user->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
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

            if($user->save()){
                alert()->success('Sukses','Data sukses disimpan');
                return redirect()->back();
            }
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
}
