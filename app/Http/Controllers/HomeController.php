<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function admin_login()
    {
        if (Auth::user()->email != 'admin@admin.com') {
            return redirect('/home');
        } else {
            return view('admin');
        }
    }

    // CRUD Products
    public function create_product()
    {
        return view('create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->email == 'admin@admin.com') {
            return redirect('/admin');
        } else {
            return view('home');
        }
    }
}
