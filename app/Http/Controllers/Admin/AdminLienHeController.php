<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\lien_hes;
use App\Mail\PhanHoiMail;
use Illuminate\Http\Request;
use App\Mail\CustomerReplyMail;
use App\Http\Controllers\Controller;
use App\Models\Adminphanhoi;
use Illuminate\Support\Facades\Mail;

class AdminLienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lienhes = lien_hes::withTrashed('user',lien_hes::STATUS_PENDING)->get();
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

    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);
    
        // Lưu phản hồi của quản trị viên vào database
        $reply = Adminphanhoi::create([
            'lien_hes_id' => $id,
            'reply' => $request->reply,
        ]);
    
        // Lấy email của khách hàng
        $lienhes = lien_hes::findOrFail($id);
    
        // Gửi email
        Mail::to($lienhes->user->email)->send(new CustomerReplyMail($reply->reply));
    
        return redirect()->route('admin.lienhes.index')->with('success', 'Phản hồi đã được gửi thành công!');
    }


    public function showReplyForm($id)
    {
        $lienhes = lien_hes::findOrFail($id); // Tìm phản hồi theo ID
    
        return view('admins.lienhes.phanhoi', compact('lienhes'));
    }

    public function capNhatTrangThai($id, $trang_thai_phan_hoi)
{
    $lienhes = lien_hes::findOrFail($id);
    $lienhes->trang_thai_phan_hoi = $trang_thai_phan_hoi;
    $lienhes->save();

    return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
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
