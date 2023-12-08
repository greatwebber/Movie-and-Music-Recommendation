<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Redirect;
use Auth;
use Image;

class UserController extends Controller
{
    public function index()
    {
        return view('user_account');
    }

  
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $name = $request->input('name');
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $country = $request->input('country');
        $state = $request->input('state');
        $email = $request->input('email');

        $user = User::where('id', $id)->first();
        $user->name = $name;
        $user->first_name = $fname;
        $user->last_name = $lname;
        $user->country = $country;
        $user->state = $state;
        $user->email = $email;

        $user->save();

        return redirect('/user_account');

    }


}
