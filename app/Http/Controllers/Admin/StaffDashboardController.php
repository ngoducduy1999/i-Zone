<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class StaffDashboardController extends Controller
{
    public function index()
    {
        return view('admins.dashboard');
    }
    public function user()
    {
        return view('admins.taikhoans.index');
    }
}
