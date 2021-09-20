<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\college;
use App\Models\customers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $area = area::all();
        $college = college::all();
        $customer = customers::all();
        return view('home',compact(['customer','users','area','college']));
    }
}
