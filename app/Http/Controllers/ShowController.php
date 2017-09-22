<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class ShowController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(){
        return view("show/index");
    }
}
