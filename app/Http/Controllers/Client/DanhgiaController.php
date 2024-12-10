<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGiaSanPham;
use Illuminate\Http\Request;
use App\Models\ChiTietHoaDon;

class DanhgiaController extends Controller
{   public function checkReviewEligibility(Request $request,$san_pham_id)
    {
        // Xác thực nếu cần (nếu $san_pham_id luôn được truyền từ route thì không cần validate lại)
        $sanPhamId = $san_pham_id;
        $userId = $request->query('user_id') ?? auth()->id();
        // Thay giá trị 23 bằng logic lấy ID người dùng thực sự nếu cần
    
        // Tính toán số lần mua sản phẩm
        $soLanMua = ChiTietHoaDon::whereHas('bienTheSanPham', function ($query) use ($sanPhamId) {
                $query->where('san_pham_id', $sanPhamId);
            })
            ->whereHas('hoaDon', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->sum('so_luong');
    
        // Tính toán số lần đã đánh giá
        $soLanDanhGia = DanhGiaSanPham::where('san_pham_id', $sanPhamId)
            ->where('user_id', $userId)
            ->count();
    
        // Tính số lần đánh giá còn lại
        $remainingReviews = $soLanMua - $soLanDanhGia;
    
        // Trả về phản hồi dưới dạng JSON
        return response()->json([
            'san_pham_id' => $sanPhamId,
            'user_id' => $userId,
            'eligible' => $remainingReviews > 0,
            'remainingReviews' => max($remainingReviews, 0),
        ]);
    }
    

    public function getReviews($san_pham_id)
    {
        $reviews = DanhGiaSanPham::with('user:id,ten')
            ->where('san_pham_id', $san_pham_id)
            ->latest()
            ->get();

        return response()->json($reviews);
    }

    public function storeReview(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'san_pham_id' => 'required|exists:san_phams,id',
        'diem_so' => 'required|integer|between:1,5',
        'nhan_xet' => 'nullable|string|max:1000',
        'user_id' => 'required|exists:users,id'  // Ensure user_id is included and valid
    ]);

    // Retrieve validated values
    $userId = $validated['user_id'];
    $sanPhamId = $validated['san_pham_id'];

    // Check if the user has purchased the product before
    $soLanMua = ChiTietHoaDon::whereHas('bienTheSanPham', function ($query) use ($sanPhamId) {
            $query->where('san_pham_id', $sanPhamId);
        })
        ->whereHas('hoaDon', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->sum('so_luong');

    // Check if the user has already reviewed the product
    $soLanDanhGia = DanhGiaSanPham::where('san_pham_id', $sanPhamId)
        ->where('user_id', $userId)
        ->count();

    // If the user has already reviewed the product as many times as they have purchased it, return an error
    if ($soLanDanhGia >= $soLanMua) {
        return response()->json(['error' => 'Bạn đã sử dụng hết số lượt đánh giá.'], 403);
    }

    // Create the review
    $review = DanhGiaSanPham::create([
        'san_pham_id' => $sanPhamId,
        'user_id' => $userId,
        'diem_so' => $validated['diem_so'],
        'nhan_xet' => $validated['nhan_xet'],
    ]);

    // Return the created review as a response
    return response()->json($review, 201);
}
}