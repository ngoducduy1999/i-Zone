<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class YeuThichController extends Controller
{
    public function index(){

        return view('clients.yeuthich');

    }


    public function addToLove(Request $request, string $id)
    {
        $product = SanPham::findOrFail($id);
        $userId = $request->user()->id; // Bạn có thể thay bằng $request->user()->id khi có đăng nhập
        Log::info('add to love: ', ['user_id' => $userId, 'product_id' => $id]);
        if ($product->users()->where('user_id', $userId)->exists()) {
            $product->users()->detach($userId);
            return Auth::user()->sanPhamYeuThichs()->count();
        } else {
            $product->users()->attach($userId);
            return Auth::user()->sanPhamYeuThichs()->count();
        }
    }
}
