<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm()
    {
      $obj1 = DB::table('categories')->select(
            'categories.*'
            )
            ->get();

            foreach($obj1 as $u){
              $options = DB::table('products')
                ->where('pro_category', $u->id)
                ->limit(2)
                ->get();
              $u->options = $options;
            }
        $data['cat1'] = $obj1;

        return view('auth.login', $data);
    }

    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($request->user()->is_admin == 1) {
          return redirect('admin/dashboard');
            //dd($request->user()->is_admin);
        }

        if(Session::has('status_user') == 1){
            return redirect(url('shipping'));
          }else{
            return $this->authenticated($request, $this->guard()->user())
                      ?: redirect()->intended($this->redirectPath());
          }


      /*  return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath()); */
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
