<?php

namespace App\Http\Controllers\admin\truyen_tranh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Chuong;
use App\Models\admin\truyen;
use App\Models\admin\chuong_hinhanh;

class TapTruyenController extends Controller
{
    public function danhSachTapTruyenTranh()
    {
        $dataDanhSachTapTruyenTranh = Chuong::join('truyen', 'chuong.truyen_id', '=', 'truyen.truyen_id')
            ->where('truyen.truyen_loai', 2)
            ->orderBy('truyen.truyen_ten')
            ->orderBy('chuong.chuong_so')
            ->select('chuong.*', 'truyen.truyen_ten')
            ->get();

        return view('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh', compact('dataDanhSachTapTruyenTranh'));
    }
    public function tapTruyenTranhCreate()
    {
        // Gọi dữ liệu từ model Truyen
        $dataTruyen = Truyen::where('truyen_loai', 2)->get(['truyen_id', 'truyen_ten']);

        $dataDanhSachTapTruyenTranh = Chuong::join('truyen', 'chuong.truyen_id', '=', 'truyen.truyen_id')
            ->where('truyen.truyen_loai', 2)
            ->orderBy('truyen.truyen_ten')
            ->orderBy('chuong.chuong_so')
            ->select('chuong.*', 'truyen.truyen_ten')
            ->get();

        return view('admin.tap-truyen-tranh.them-tap-truyen-tranh', [
            'dataTruyen' => $dataTruyen,
            'dataDanhSachTapTruyenTranh' => $dataDanhSachTapTruyenTranh
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'truyen_id' => 'required',
                'chuong_so' => 'required',
                'chuong_ten' => 'required|min:3|max:50',
            ]);

            chuong::create([
                'truyen_id' => $validatedData['truyen_id'],
                'chuong_so' => $validatedData['chuong_so'],
                'chuong_ten' => $validatedData['chuong_ten'],
                'chuong_noidung' => '',
            ]);

            // Sau khi lưu dữ liệu thành công, chuyển hướng về trang danh sách tập truyện tranh
            return redirect()->route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh')->with('success', 'Thêm mới tập truyện tranh thành công.');
        }

        // Nếu không có yêu cầu POST từ form, hiển thị trang thêm mới tập truyện tranh
        return view('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh');
    }

    public function tapTruyenTranhUpdate($chuong_id)
    {
        $chuong = chuong::find($chuong_id);

        $dataTruyen = Truyen::loai(2)->get(['truyen_id', 'truyen_ten']);

        return view('admin.tap-truyen-tranh.cap-nhat-tap-truyen-tranh', [
            'chuong' => $chuong,
            'dataTruyen' => $dataTruyen
        ]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'chuong_so' => 'required',
                'chuong_ten' => 'required|min:3|max:500',
            ]);

            $chuong = Chuong::find($request->chuong_id);


            $chuong->chuong_so = $validatedData['chuong_so'];
            $chuong->chuong_ten = $validatedData['chuong_ten'];

            $chuong->save();

            return redirect()->route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh')->with('success', 'Cập nhật tập truyện tranh thành công.');
        }

        return view('admin.tap-truyen-tranh.them-tap-truyen-tranh');
    }

    public function delete($chuong_id)
    {
        $chuong = Chuong::find($chuong_id);

        if (!$chuong) {
            // Xử lý nếu không tìm thấy bản ghi
            return redirect()->route('admin.truyen-tranh.danh-sach-truyen-tranh')->with('error', 'Không tìm thấy tập truyện.');
        }

        // Tìm tất cả các hình ảnh của chương
        $hinhanhs = chuong_hinhanh::where('chuong_id', $chuong_id)->get();

        if ($hinhanhs->isEmpty()) {
            // Xóa dữ liệu truyện
            $chuong->delete();

            return redirect()->route('admin.truyen-tranh.danh-sach-truyen-tranh')->with('success', 'Xóa truyện thành công.');
        } else {
            // Xóa hình ảnh và dữ liệu liên quan của từng chương
            foreach ($hinhanhs as $hinhanh) {
                // Xóa hình ảnh của chương
                $oldFilePath = public_path('storage/uploads/truyen-tranh/') . $hinhanh->chuong_hinhanh_tenhinh;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Xóa dữ liệu hình ảnh của chương
                $hinhanh->delete();
            }

            // Xóa dữ liệu chương
            $chuong->delete();

            return redirect()->route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh')->with('success', 'Xóa tập truyện và dữ liệu liên quan thành công.');
        }
    }
}
