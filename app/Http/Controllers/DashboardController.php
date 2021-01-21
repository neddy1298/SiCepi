<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('dashboard.app.dashboard');
    }

    public function pricing()
    {
        return view('dashboard.app.pricing.view');
    }
}
