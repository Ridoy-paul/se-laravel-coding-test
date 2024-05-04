<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
       
    }

    public function dashboard()
    {
        try {
            return view('admin.pages.dashboard.home');
        } 
        catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
