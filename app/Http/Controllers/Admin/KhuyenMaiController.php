<?php

namespace App\Http\Controllers\admin;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class KhuyenMaiController extends Controller
{
    public function index(Request $request)
{
    $query = KhuyenMai::query();

    // Lọc theo ngày bắt đầu
    if ($request->has('ngay_bat_dau') && $request->input('ngay_bat_dau')) {
        $query->where('ngay_bat_dau', '>=', $request->input('ngay_bat_dau'));
    }

    // Lọc theo ngày kết thúc
    if ($request->has('ngay_ket_thuc') && $request->input('ngay_ket_thuc')) {
        $query->where('ngay_ket_thuc', '<=', $request->input('ngay_ket_thuc'));
    }

    $KhuyenMais = $query->get();

    return view('admins.khuyen_mais.index', compact('KhuyenMais'));
}
    // Hiển thị form tạo khuyến mãi
    public function create()
    {
        return view('admins.khuyen_mais.create');
    }
     
    public function store(Request $request)
{
    // Kiểm tra dữ liệu đầu vào
    $request->validate([
        'ma_khuyen_mai' => 'required|string|unique:khuyen_mais,ma_khuyen_mai', // Mã khuyến mãi là bắt buộc, phải là chuỗi, và duy nhất trong bảng khuyen_mais
        'phan_tram_khuyen_mai' => 'required|integer|min:1|max:99', // Phần trăm khuyến mãi từ 1 đến 99
        'giam_toi_da'=>'required',
        'ngay_bat_dau' => 'required|date', // Ngày bắt đầu là bắt buộc và phải là kiểu ngày
        'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau', // Ngày kết thúc phải sau hoặc bằng ngày bắt đầu
    ], [
        'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
        'ma_khuyen_mai.unique' => 'Mã khuyến mãi đã tồn tại. Vui lòng nhập mã khác.',
        'phan_tram_khuyen_mai.required' => 'Phần trăm khuyến mãi không được để trống.',
        'phan_tram_khuyen_mai.integer' => 'Phần trăm khuyến mãi phải là một số nguyên.',
        'phan_tram_khuyen_mai.min' => 'Phần trăm khuyến mãi phải lớn hơn 0.',
        'phan_tram_khuyen_mai.max' => 'Phần trăm khuyến mãi phải nhỏ hơn 100.',
        'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống.',
        'giam_toi_da.required' => 'Giảm tối đa không được để trống.',
        'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống.',
        'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.',
    ]);

    $data = [
        'ma_khuyen_mai' => $request->ma_khuyen_mai,
        'phan_tram_khuyen_mai' => $request->phan_tram_khuyen_mai,
        'giam_toi_da'=>$request->giam_toi_da,
        'ngay_bat_dau' => $request->ngay_bat_dau,
        'ngay_ket_thuc' => $request->ngay_ket_thuc,
        'trang_thai' => 1, 
    ];
    
    KhuyenMai::create($data);
    return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được tạo thành công.');
}

public function edit($id)
    {
        $KhuyenMai = KhuyenMai::find($id);
        if (!$KhuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mại không tồn tại');
        }
        return view('admins.khuyen_mais.update', compact('KhuyenMai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_khuyen_mai' => 'required|string|unique:khuyen_mais,ma_khuyen_mai,' . $id, // Ensure unique code, excluding current record
            'phan_tram_khuyen_mai' => 'required|integer|min:1|max:99',
            'giam_toi_da' => 'required|nullable|numeric|min:0',
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date|after_or_equal:ngay_bat_dau',
        ], [
            'ma_khuyen_mai.required' => 'Mã khuyến mãi không được để trống.',
            'ma_khuyen_mai.unique' => 'Mã khuyến mãi đã tồn tại. Vui lòng nhập mã khác.',
            'phan_tram_khuyen_mai.required' => 'Phần trăm khuyến mãi không được để trống.',
            'phan_tram_khuyen_mai.integer' => 'Phần trăm khuyến mãi phải là một số nguyên.',
            'phan_tram_khuyen_mai.min' => 'Phần trăm khuyến mãi phải lớn hơn 0.',
            'phan_tram_khuyen_mai.max' => 'Phần trăm khuyến mãi phải nhỏ hơn 100.',
            'giam_toi_da.numeric' => 'Giảm tối đa phải là một số.',
            'giam_toi_da.required' => 'Mã khuyến mãi không được để trống.',
            'ngay_bat_dau.required' => 'Ngày bắt đầu không được để trống.',
            'ngay_ket_thuc.required' => 'Ngày kết thúc không được để trống.',
            'ngay_ket_thuc.after_or_equal' => 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.',
        ]);
        
        // Find the promotion record by ID
        $khuyenMai = KhuyenMai::find($id);
        
        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }
        
        // Update promotion data
        $khuyenMai->update([
            'ma_khuyen_mai' => $request->ma_khuyen_mai,
            'phan_tram_khuyen_mai' => $request->phan_tram_khuyen_mai,
            'giam_toi_da' => $request->giam_toi_da,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
        ]);
        
        // Automatically update status if promotion has ended
        $now = Carbon::now();
        if ($khuyenMai->ngay_ket_thuc < $now) {
            $khuyenMai->update(['trang_thai' => false]);
        } else {
            $khuyenMai->update(['trang_thai' => true]);
        }
        
        return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được cập nhật thành công.');
      }
    
    public function destroy($id)
    {
        // Tìm kiếm bản ghi Khuyến Mãi theo ID
        $khuyenMai = KhuyenMai::find($id);
    
        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }
    
        // Xóa bản ghi
        $khuyenMai->delete();
    
        return redirect()->route('admin.khuyen_mais.index')->with('success', 'Khuyến mãi đã được xóa thành công.');
    }
    
    public function onOffKhuyenMai($id)
    {
        // Tìm kiếm bản ghi Khuyến Mãi theo ID
        $khuyenMai = KhuyenMai::find($id);

        if (!$khuyenMai) {
            return redirect()->route('admin.khuyen_mais.index')->with('error', 'Khuyến mãi không tồn tại.');
        }

        // So sánh ngày hiện tại với ngày kết thúc của khuyến mãi
        $now = Carbon::now();

        if ($khuyenMai->ngay_ket_thuc < $now) {
            // Nếu ngày hiện tại đã qua ngày kết thúc
            return redirect()->back()->with('error', 'Khuyến mãi đã hết thời gian, không thể thay đổi trạng thái.');
        }

        // Cập nhật trạng thái khuyến mãi nếu còn thời gian
        if ($khuyenMai->trang_thai) {
            // Nếu trạng thái hiện tại là đang hoạt động, chuyển sang ngừng hoạt động
            $khuyenMai->trang_thai = false;
            $khuyenMai->save();
            return redirect()->back()->with('success', 'Ngừng hoạt động khuyến mãi.');
        } else {
            // Nếu trạng thái hiện tại là ngừng hoạt động, chuyển sang hoạt động
            $khuyenMai->trang_thai = true;
            $khuyenMai->save();
            return redirect()->back()->with('success', 'Khuyến mãi đã được kích hoạt.');
        }
    }
    public function updateExpiredKhuyenMai()
    {
        $now = Carbon::now();

        // Cập nhật trạng thái khuyến mãi đã hết hạn
        $updatedCount = KhuyenMai::where('ngay_ket_thuc', '<', $now)
            ->where('trang_thai', true) // Chỉ cập nhật nếu trạng thái hiện tại là đang hoạt động
            ->update(['trang_thai' => false]);

        // Trả về thông báo hoặc view nếu cần
        return redirect()->back()->with('success', "Đã cập nhật trạng thái của $updatedCount khuyến mãi.");
    }
}
