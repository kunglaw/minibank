<?php 

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
// berisi set view register dan login bawaan laravel 
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	
	// ini otomatis sudah ada , untuk function load view register dan login
    //use AuthenticatesAndRegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guest, ['except' => 'logout']);
		$this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	function postRegister(Request $request)
	{
		//print_r($request->all());
		/* Array ( [_token] => N2FtsnG2gN3Fn1SE6iFVxJqPH0n8mzpuZTxVdoeh [name] => [email] => [password] => [password_confirmation] => ) */
		
		$data = array(
			"name"=>$request->input("name"),
			"email"=>$request->input("email"),
			"password"=>$request->input("password"),
			"password_confirmation"=>$request->input("password_confirmation") 
		);
		
		//print_r($_POST);
		$valid = $this->validator($data);
		
		if($valid->passes())
		{
			$this->create($data);
		}
		else
		{
			return redirect("auth/register") ->withErrors($valid)
                        ->withInput();
		}
		//$this->create($data);
	}
	// ini function hrus dibuat kalau mau memakai halaman lain
    function getRegister(Request $request)
	{
		return view("auth/register");
		//echo "waaaa";	
	} 
	
	function getLogin(Request $request)
	{
		// form
		return view("auth/login");
	}
	
	function postLogin(Request $request)
	{
		// login process
		$email = $request->input("email");
		$password = $request->input("password");
		
		//$str = "SELECT * FROM ";
		/*$user = array(
			
			"email"=>$email
		);*/
		Session::put("email",$email);
		//print_r(Auth::check());
		//Auth::login(['email' => $email]);
		
		//return redirect("dashboard");
	}
	
	function status_login()
	{
		/* if(Auth::check())
		{
			echo "session active";	
		}
		else
		{
			echo "session deactivated";	
		} */
		
		print_r(Session::all());
		
	}
	
	function getLogout()
	{
		//Auth::logou	if(Auth
		
	}
}
