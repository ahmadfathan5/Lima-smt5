<?php
namespace App\Http\Controllers\AuthAPI;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginAPIController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'user';
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login-custom');
    }
    public function guard()
    {
        return auth()->guard('user');
    }
    public function showRegisterPage()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'nidn' => $request->nidn,
            'tlahir' => $request->tlahir,
            'tgllahir' => $request->tgllahir,
            'semester' => $request->semester,
            'role' => $request->role,
            'nohp' => $request->nohp,
            'gender' => $request->gender,
            'kelompok' => $request->kelompok,
            //'foto' => $request->foto,
            'prodi_id' => $request->prodi_id,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success','Registration Success');
    }
    public function login(Request $request)
    {
        if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return "Sukses";
        }
        return "Gagal";
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
