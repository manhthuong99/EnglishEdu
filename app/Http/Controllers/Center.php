<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Center extends Controller
{
    const ENABLE = 1;

    public function show($centerId)
    {
        return view('frontend.center.view');
    }
}
