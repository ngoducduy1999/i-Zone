<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\lien_hes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LienHeController extends Controller
{
    public function index(){
        $danhMucs = DanhMuc::all();
        return view('clients.lienhe',compact('danhMucs'));

    }
    public function store(Request $request)
    {
         // Kiểm tra nếu người dùng đã đăng nhập
         if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để gửi form liên hệ');
        }

        // Lấy dữ liệu từ form
        $ten_nguoi_gui = $request->input('ten_nguoi_gui');
        $tin_nhan = $request->input('tin_nhan');
        $userId = Auth::user()->id;  // Lấy user_id từ người dùng đã đăng nhập

        // Lưu thông tin vào cơ sở dữ liệu
        lien_hes::create([
            'user_id' => $userId,
            'ten_nguoi_gui' => $ten_nguoi_gui,
            'tin_nhan' => $tin_nhan,
        ]);

        // Quay lại trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi');
    
    }

}
