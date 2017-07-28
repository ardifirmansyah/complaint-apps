<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class PageController extends Controller
{
    //
    public function dashboardadmin(){
        return view('complaints.ad-home');
    }
    public function dashboardfl(){
        return view('complaints.fl-home');
    }
    public function statistic(){
        return view('complaints.ad-statistic');
    }
    public function complaint(){
        return view('complaints.ad-complaints');
    }
    public function newcomplaint(){
        return view('complaints.fl-new-complaint');
    }
    public function registerFreelancer(Request $request){
        $
    }
        protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
//            'type' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => 1,
        ]);
    }
}
