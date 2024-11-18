<?php

namespace App\Http\Controllers\Admin;

use App\Models\lien_hes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PhanHoiMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AdminLienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lienhes = lien_hes::with('user')->get();
        return view('admins.lienhes.index', compact('lienhes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

          // Validate dữ liệu đầu vào
    

        // Lưu thông tin liên hệ vào cơ sở dữ liệu
        lien_hes::create([
            'ten_nguoi_gui' => $request->name,
           'user_id'=>$request->user()->email,
            'tin_nhan' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Tin nhắn đã được gửi!');
    }





   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
