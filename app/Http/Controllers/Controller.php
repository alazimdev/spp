<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Payment;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        if(Auth::User()->is_superuser == false){
            return redirect()->route('pembayaran-index');
        }
        $users = User::count();
        $students = Student::count();
        $payments = Payment::count();
        $total = Payment::sum('amount');
        return view('index', compact('users','students','payments','total'));
    }
}
