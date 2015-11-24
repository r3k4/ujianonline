<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use App\Models\Ref\UserLevel;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Validator, Auth;

class AuthController extends Controller
{

    protected $user_level;
    protected $fungsi;
    protected $mst_user;
    protected $mst_data_user;
    private $base_view = 'konten.frontend.auth.'; 
    protected $redirectPath = '/backend';  


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct( UserLevel $user_level, 
                                 Fungsi $fungsi, 
                                 User $mst_user,
                                 DataUser $mst_data_user
                                )
    {
        $this->mst_data_user = $mst_data_user;
        $this->mst_user     = $mst_user;
        $this->fungsi       = $fungsi;
        $this->user_level   = $user_level;
        $this->middleware('guest', ['except' => 'getLogout']);
        view()->share('base_view', $this->base_view);
    }


    public function getLogin(Request $request)
    {
        $login_home = true;
        $vars = compact('login_home');
        return view($this->base_view.'login.index', $vars);
    }



    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);
        $credentials = array_add($credentials, 'aktif', 1);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }


    public function getLoginFacebook()
    {
        $provider = \Socialite::with('facebook');
        if (\Input::has('code'))
        {
            $user = $provider->user();
            $check_email = $this->mst_user->where('email', '=', $user->email)->first();
            if(count($check_email)>0){
                //jika email ada di db, forced to login
                \Auth::loginUsingId($check_email->id);
                \Log::info('login using id');
                return redirect()->intended($this->redirectPath());
            }else{
                \Log::info('gagal login, user tdk ditemukan');
                    return redirect()
                                ->back()
                                ->withErrors([
                                    'email' => 'User tidak ditemukan.',
                                ]);
            }
        } else {
             \Log::info('gagal login');
            return $provider->redirect();
        }        
    }



    public function getRegister()
    {
        $jenis_kelamin = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
        $register_home = true;
        $ref_user_level = $this->user_level->where('id', '!=', 1)->get();
        $level = $this->fungsi->get_dropdown($ref_user_level, 'level');
        $vars = compact('register_home', 'level', 'jenis_kelamin');
        return view($this->base_view.'register.index', $vars);
    }


    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->create($request->all());
        return 'ok';
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
            'nama'              => 'required|max:255',
            'email'             => 'required|email|max:255|unique:mst_user',
            'password'          => 'required|confirmed|min:6',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tgl_lahir'         => 'required',
            'ref_user_level_id' => 'required',
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
        $data_insert_user = [
            'nama'              => $data['nama'],
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'ref_user_level_id' => $data['ref_user_level_id']
        ];
        $insert_user = $this->mst_user->create($data_insert_user);

        $b_user = [
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tgl_lahir'     => $data['tgl_lahir'],
            'tempat_lahir'  => $data['tempat_lahir'],
            'mst_user_id'   => $insert_user->id
        ];
        $insert_data_user = $this->mst_data_user->create($b_user);

        return 'ok';
    }
}
