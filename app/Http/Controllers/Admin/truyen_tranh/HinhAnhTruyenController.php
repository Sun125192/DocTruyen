<?php

namespace App\Http\Controllers\admin\truyen_tranh;

use App\Http\Controllers\Controller;
use App\Models\admin\Chuong;
use app\Models\admin\Truyen;
use App\Models\admin\chuong_hinhanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HinhAnhTruyenController extends Controller
{
    public function danhSachHinhAnhTruyen($chuong_id, $chuong_ten, $ten_truyen)
    {
        // Truy vấn database để lấy danh sách hình ảnh
        $danhSachHinhAnhTruyenTranh = chuong_hinhanh::where('chuong_id', $chuong_id)
            ->orderBy('chuong_hinhanh_id', 'asc')
            ->get();

        return view('admin.hinh-anh-truyen.danh-sach-hinh-anh-truyen', [
            'danhSachHinhAnhTruyenTranh' => $danhSachHinhAnhTruyenTranh,
            'chuong_id' => $chuong_id,
            'chuong_ten' => $chuong_ten,
            'ten_truyen' => $ten_truyen,
        ]);
    }

    public function HinhAnhTruyenCreate($chuong_id, $chuong_ten)
    {
        $tap = [
            'chuong_id' => $chuong_id,
            'chuong_ten' => $chuong_ten,
        ];

        return view('admin.hinh-anh-truyen.them-hinh-anh-truyen', compact('tap'));
    }

    public function uploadimg(Request $request)
    {
        try {
            $chuong_id = $request->input('chuong_id');
            $file = $request->file('chuong_hinhanh_tenhinh');

            // Thay đổi thư mục lưu trữ nếu cần
            $upload_dir = public_path('storage/uploads/truyen-tranh/');

            // Đổi tên file nếu cần
            $tentaptin = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->move($upload_dir, $tentaptin);

            // Thêm dữ liệu vào cơ sở dữ liệu bằng mô hình chuong_hinhanh
            chuong_hinhanh::create([
                'chuong_id' => $chuong_id,
                'chuong_hinhanh_tenhinh' => 'truyen-tranh/' . $tentaptin,
            ]);

            return response()->json(['message' => 'File uploaded and record inserted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function HinhAnhTruyenUpdate($chuong_hinhanh_id, $chuong_ten)
    {
        $hinhanhRow = chuong_hinhanh::find($chuong_hinhanh_id);
        return view('admin.hinh-anh-truyen.cap-nhat-hinh-anh-truyen', compact('hinhanhRow', 'chuong_hinhanh_id', 'chuong_ten'));
    }

    public function update(Request $request, $chuong_hinhanh_id, $chuong_ten)
    {
        $hinhanhRow = chuong_hinhanh::find($chuong_hinhanh_id);

        if ($request->hasFile('chuong_hinhanh_tenhinh')) {
            $file = $request->file('chuong_hinhanh_tenhinh');
            $upload_dir = public_path('storage/uploads/truyen-tranh/');

            if (file_exists($upload_dir . $hinhanhRow->chuong_hinhanh_tenhinh)) {
                unlink($upload_dir . $hinhanhRow->chuong_hinhanh_tenhinh);
            }

            $tentaptin = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->move($upload_dir, $tentaptin);

            $hinhanhRow->chuong_hinhanh_tenhinh = 'truyen-tranh/' . $tentaptin;
        }

        $hinhanhRow->save();

        return redirect()->route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh', [
            'chuong_id' => $chuong_hinhanh_id,
            'chuong_ten' => $chuong_ten,
        ])->with('success', 'Cập nhật hình ảnh thành công.');
    }

    public function delete($chuong_hinhanh_id, $chuong_id, $chuong_ten, $ten_truyen)
    {
        // Tìm dữ liệu chương hình ảnh cần xóa
        $hinhanhRow = chuong_hinhanh::find($chuong_hinhanh_id);

        if (!$hinhanhRow) {
            return redirect()->back()->with('error', 'Không tìm thấy dữ liệu.');
        }

        // Xóa file hình ảnh cũ
        $oldFilePath = public_path('storage/uploads/') . $hinhanhRow->chuong_hinhanh_tenhinh;
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }

        // Xóa dữ liệu chương hình ảnh
        $hinhanhRow->delete();

        return redirect()->route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh', [
            'chuong_id' => $chuong_id,
            'chuong_ten' => $chuong_ten,
            'ten_truyen' => $ten_truyen,
        ])->with('success', 'Xóa hình ảnh thành công.');
    }
}
