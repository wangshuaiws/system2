<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Naux\Mail\SendCloudTemplate;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/middle';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
        $user = User::create([
            'name' => $data['name'],
            'sex' => $data['sex'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => str_random(40),
        ]);
        $this->sendVerifyEmailTo($user);
        return $user;
    }

    private function sendVerifyEmailTo($user)
    {
        $data = ['url' => route('email.verify',['token' => $user->confirmation_token]),
            'name' => $user->name
        ];
        $template = new SendCloudTemplate('zhihu', $data);

        Mail::raw($template, function ($message) use ($user) {
            $message->from('1473949341@qq.com', 'ws970');

            $message->to($user->email);
        });
    }

}
