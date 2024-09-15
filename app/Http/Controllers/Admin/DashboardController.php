<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admins.dashboard');
    }
    public function users()
    {
        return view('taikhoans.index');
    }
}
