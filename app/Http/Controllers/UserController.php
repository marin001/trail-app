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

        $this->user = User::find($request->validated()['id']);
        /**
         * add isset (user)- if not wrong user id  report
         */
        Auth::login($this->user, true);
        auth()->login($this->user);

        if ('Administrator'===$this->user->Role) {
            return redirect()->intended('administrator');
        } elseif ('Applicant'===$this->user->Role) {
            return redirect()->intended('applicant');
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
}
