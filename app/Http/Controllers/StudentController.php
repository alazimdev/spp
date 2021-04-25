<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
//use App\Guards\AdminStatefulGuard;
use App\Http\Responses\LoginResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
// use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Exception;

use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Payment;

use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class StudentController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function loginForm()
    {
        return view('auth.student_login', ['guard' => 'student']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            RedirectIfTwoFactorAuthenticatable::class,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {

        $this->guard->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }

    public function index()
    {
        $classes  = Classes::get();
        return view('students.index', compact('classes'));
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $student  = Student::all();
            return DataTables::of($student)
                ->addColumn('entered', function($student){
                    return $student->month_entered.' '.$student->year_entered;
                })->addColumn('end', function($student){
                    return $student->month_end.' '.$student->year_end;
                })->addColumn('created_at', function($student){
                    return $student->created_at->format('j M, Y h:ia');
                })->addColumn('updated_at', function($student){
                    return $student->updated_at->format('j M, Y h:ia');
                })->addColumn('action', function($student){
                    return '<a href="/siswa/'.$student->id.'/edit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a> <a data-admin="/siswa/'.$student->id.'/hapus" href="#" class="btn btn-danger admin-remove" onclick="adminDelete()"><i class="fa fa-trash"></i></a>';
                })
                ->make(true);
        }
    }
    public function read($nisn){
        if(Student::where('nisn', $nisn)->first() != null){
            $student       = Student::where('nisn', $nisn)->first();
            $classes  = Classes::get();
            return view('students.read', compact('student', 'classes'));
        }else{
            return abort('404');
        }
    }
    
    public function store_data(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:students,email',
        ]);
        try {
            if($request->get('year_end') != null && $request->get('month_end') != null){
                $entered = $request->get('year_entered').$request->get('month_entered');
                $end = $request->get('year_end').$request->get('month_end');
                if((int)$entered > (int)$end){
                    alert()->warning('Maaf','Bulan dan Tahun masuk tidak bisa lebih dari Bulan dan Tahun tamat atau keluar');
                    return redirect()->back();
                }
            }

            $student                    = new Student();
            $student->name              = $request->get('name');
            $student->password          = Hash::make($request->get('password'));
            $student->email             = $request->get('email');
            $student->phone_number      = $request->get('phone_number');
            $student->nisn              = $request->get('nisn');
            $student->nis               = $request->get('nis');
            $student->full_name         = $request->get('full_name');
            $student->gender            = $request->get('gender');
            $student->date_of_birth     = date("Y-m-d",strtotime($request->date_of_birth));
            $student->junior_high_school     = $request->get('junior_high_school');
            $student->month_entered     = $request->get('month_entered');
            $student->year_entered      = $request->get('year_entered');
            $student->month_end         = $request->get('month_end');
            $student->year_end          = $request->get('year_end');
            $student->class_id          = $request->get('class_id');

            $student->save();
            alert()->success('Sukses','Data sukses disimpan');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function edit($id){
        if(Student::find($id) != null){
            $pay = null;
            $payment       = Payment::where('student_id',$id)->count();
            if($payment > 0){
                $pay = 'disabled';
            }
            $student       = Student::find($id);
            $classes  = Classes::get();
            return view('students.edit', compact('student', 'classes', 'pay'));
        }else{
            return abort('404');
        }
    }
    public function update(Request $request, $id){
        try {
            if($request->get('year_end') != null && $request->get('month_end') != null){
                $entered = $request->get('year_entered').$request->get('month_entered');
                $end = $request->get('year_end').$request->get('month_end');
                if((int)$entered > (int)$end){
                    alert()->warning('Maaf','Bulan dan Tahun masuk tidak bisa lebih dari Bulan dan Tahun tamat atau keluar');
                    return redirect()->back();
                }
            }
            $student       = Student::find($id);
            $student->name             = $request->get('name');
            if ($request->get('password') != null){
                $student->password         =  Hash::make($request->get('password'));
            }
            $student->email             = $request->get('email');
            $student->phone_number      = $request->get('phone_number');
            $student->nisn              = $request->get('nisn');
            $student->nis               = $request->get('nis');
            $student->full_name         = $request->get('full_name');
            $student->gender            = $request->get('gender');
            $student->date_of_birth     = date("Y-m-d",strtotime($request->date_of_birth));
            $student->junior_high_school     = $request->get('junior_high_school');
            $student->month_entered     = $request->get('month_entered');
            $student->year_entered      = $request->get('year_entered');
            $student->month_end         = $request->get('month_end');
            $student->year_end          = $request->get('year_end');
            $student->class_id          = $request->get('class_id');
            $student->update();
            alert()->success('Sukses','Data sukses diupdate');
            return redirect()->route('siswa-index');
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi masalah dalam penginputan data, harap periksa ulang');
            return redirect()->back();
        }
    }
    public function destroy_data($id){
        try {
            $payment       = Payment::where('student_id',$id)->count();
            if($payment > 0){
                alert()->warning('Maaf','Harap hapus data pembayaran untuk siswa ini terlebih dahulu!');
                return redirect()->back();
            }
            $student       = Student::find($id);
            if($student->delete()){
                alert()->success('Sukses','Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (Exception $e){
            alert()->warning('Maaf','Data gagal dihapus');
            return redirect()->back();
        }
    }


    
    public function index_siswa()
    {
        try{
            $student = Student::find(Auth::guard('student')->user()->id);
            $payment = Payment::leftJoin('spps', 'payments.spp_id','=','spps.id')->where('student_id',$student->id)->orderBy('date','DESC')->get();
            return view('pages.full', compact('student','payment'));
        }catch(Exception $e){
            return redirect()->route('page-siswa-login');
        }
    }
    public function data_siswa(Request $request)
    {
        try {
            $student = Student::where('email',$request->email)->get();
            if($student->count() > 0){
                foreach($student as $data){
                    if (Hash::check($request->password, $data->password)) {
                        return redirect()->route('page-siswa-transaksi',$data->id);
                    }
                }
            }
            alert()->warning('Maaf','Email atau Password yang anda masukkan salah');
            return redirect()->back();
        } catch (Exception $e){
            alert()->warning('Maaf','Terjadi kesalahan pada server');
            return redirect()->back();
        }
    }
    public function transaksi_siswa(Request $request, $id)
    {
        try {
            $student = Student::find($id);
            $payment = Payment::leftJoin('spps', 'payments.spp_id','=','spps.id')->where('student_id',$id)->orderBy('date','DESC')->get();
            return view('pages.full', compact('student','payment'));
        } catch (Exception $e){
            return abort(404);
        }
    }
}
