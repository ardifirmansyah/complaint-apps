<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
