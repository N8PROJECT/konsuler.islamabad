<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function guest_home() {
        return view('home');
    }

    public function user_home() {
        return view('home');
    }

    // NOC
    public function newstudent() {
        return view('user.noc.new-student.newstudent');
    }
    
    public function ibbc() {
        return view('user.noc.ibbc.ibbc');
    }

    public function hec() {
        return view('user.noc.hec.hec');
    }

    public function renewalvisa() {
        return view('user.noc.renewal-visa.renewal-visa');
    }
    public function student() {
        return view('user.noc.renewal-visa.student');
    }
    public function spouse() {
        return view('user.noc.renewal-visa.spouse');
    }
    public function child() {
        return view('user.noc.renewal-visa.child');
    }

    public function trip() {
        return view('user.noc.trip.trip');
    }
}
