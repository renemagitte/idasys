<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!($user = Auth::attempt(['email' => $request->email, 'password' => $request->password])) ) {
            return response()->json([
            'errors' => [
                'email' => ['Fel användarnamn eller lösenord.'],
            ],
            ], 422);
        }


        // test if user is allready logged in?:
        // elseif(Auth::guard()){
        //     return 'Användare redan inloggad';
        // }

        else {
            $checkUser = Auth::User();

            if($checkUser->role == 1) {
                return response()->json("rol1 1");
            }else{
                return response()->json("no role");
            }
        }
    }
}
