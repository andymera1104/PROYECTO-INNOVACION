<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
         function index()
            {
            return view('login/login');
             }
        
        function checklogin(Request $request)
            {
             $this->validate($request, [
              'email'   => 'required|email',
              'password'  => 'required|alphaNum|min:3'
             ]);

             $user_data = array(
              'email'  => $request->get('email'),
              'password' => $request->get('password')
             );

            if(Auth::attempt($user_data))
                {
            return redirect('inicio');
                 }
            else
             {
              return back()->with('error', 'DATOS INCORRECTOS');
             }

            }

        function successlogin()
            {
             return view('login/successlogin');
            }

        function logout()
            {
             Auth::logout();
             return redirect('main');
            }
}



