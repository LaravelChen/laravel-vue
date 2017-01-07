<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersLoginRequest;
use App\Http\Requests\UsersRegisterRequest;
use App\Repository\UsersRepository;
use \Auth;

class UsersController extends Controller
{
    protected $user;

    /**
     * UsersController constructor.
     * @param UsersRepository $user
     */
    public function __construct(UsersRepository $user)
    {
        $this->user=$user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        return view('user.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(){
        return view('user.register');
    }

    /**
     * @param UsersRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UsersRegisterRequest $request)
    {
        $this->user->store(array_merge($request->all(),['avatar'=>'picture/default.png']));
        return redirect('/login');
    }

    /**
     * @param UsersLoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signin(UsersLoginRequest $request)
    {
        if(\Auth::attempt([
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
        ])){
            return redirect('/');
        }
        return redirect('login')->withInput();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginout()
    {
        Auth::logout();
        return back();
    }

    /**
     * @return array
     */
    public function profile()
    {
        if(Auth::check()){
            $result= $this->user->ById(Auth::id());
            $result->login=true;
            return $result;
        }else{
            return ['login'=>false];
        }
    }
}


