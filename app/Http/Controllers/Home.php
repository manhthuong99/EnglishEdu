<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Home extends Controller
{
    const ENABLE = 1;

    public function index()
    {
        return view('frontend.home');
    }
}
