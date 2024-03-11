<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{


    protected User $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function login(UserLoginRequest $request)
    {
        //
        $userid = $request->validated();
        print_r($request->validated()['id']);
        $this->user = User::find($request->validated()['id']);
        /**
         * add is set user- if not wrong user id  report
         */
        Auth::login($this->user,true);

        $this->middleware('auth');
        print_r(Auth::user());
        //auth()->login($user);
         //var_dump(Auth::attempt(['id'=>$this->user->id]));
        //return view('registration_success');
        if('Administrator'===$this->user->Role){
            return redirect()->intended('administrator');

        }elseif('Applicant'===$this->user->Role){

            return redirect()->intended('applicant');
        }else{

            abort(Response::HTTP_FORBIDDEN);
        }


        /*


        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }
        */
    }
}
