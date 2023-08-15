<?php

namespace App\Http\Controllers\admin\tieu_thuyet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Chuong;
use App\Models\admin\truyen;
use App\Models\admin\chuong_hinhanh;

class ChuongtieuthuyetController extends Controller
{
    public function danhSachChuongTieuThuyet()
    {
        $dataDanhSachChuongTieuThuyet = Chuong::danhSachChuongTieuThuyet();

        return view('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet', compact('dataDanhSachChuongTieuThuyet'));
    }
    public function chuongTieuThuyetCreate()
    {
        // Gọi dữ liệu từ model Truyen
        $dataTieuThuyet = Truyen::loai(1)->get(['truyen_id', 'truyen_ten']);

        $dataDanhSachChuongTieuThuyet = Chuong::danhSachChuongTieuThuyet();

        return view('admin.chuong-tieu-thuyet.them-chuong-tieu-thuyet', [
            'dataTieuThuyet' => $dataTieuThuyet,
            'dataDanhSachChuongTieuThuyet' => $dataDanhSachChuongTieuThuyet,
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'truyen_id' => 'required',
                'chuong_so' => 'required',
                'chuong_ten' => 'required|min:3|max:50',
                'chuong_noidung' => 'required',
            ]);

            $chuong = new Chuong();
            $chuong->truyen_id = $validatedData['truyen_id'];
            $chuong->chuong_so = $validatedData['chuong_so'];
            $chuong->chuong_ten = $validatedData['chuong_ten'];
            $chuong->chuong_noidung = $validatedData['chuong_noidung'];
            $chuong->save();

            // Sau khi lưu dữ liệu thành công, chuyển hướng về trang danh sách tập truyện tranh
            return redirect()->route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet')->with('success', 'Thêm mới tập truyện tranh thành công.');
        }

        // Nếu không có yêu cầu POST từ form, hiển thị trang thêm mới tập truyện tranh
        return view('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet');
    }

    public function chuongTieuThuyetUpdate($chuong_id)
    {
        $chuongTieuThuyet = chuong::find($chuong_id);

        $dataChuongTieuThuyet = Truyen::where('truyen_loai', 1)->get(['truyen_id', 'truyen_ten']);

        return view('admin.chuong-tieu-thuyet.cap-nhat-chuong-tieu-thuyet', [
            'chuongTieuThuyet' => $chuongTieuThuyet,
            'dataChuongTieuThuyet' => $dataChuongTieuThuyet
        ]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'chuong_so' => 'required',
                'chuong_ten' => 'required|min:3|max:500',
                'chuong_noidung' => 'required',
            ]);

            $chuong = Chuong::find($request->chuong_id);


            $chuong->chuong_so = $validatedData['chuong_so'];
            $chuong->chuong_ten = $validatedData['chuong_ten'];
            $chuong->chuong_noidung = $validatedData['chuong_noidung'];
            $chuong->save();

            return redirect()->route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet')->with('success', 'Cập nhật tập truyện tranh thành công.');
        }

        return view('admin.chuong-tieu-thuyet.them-chuong-tieu-thuyet');
    }

    public function delete($chuong_id)
    {
        $chuong = Chuong::find($chuong_id);

        if (!$chuong) {
            // Xử lý nếu không tìm thấy bản ghi
            return redirect()->route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet')->with('error', 'Không tìm thấy tập truyện.');
        }

        // Tìm tất cả các hình ảnh của chương
        $hinhanhs = chuong_hinhanh::where('chuong_id', $chuong_id)->get();

        if ($hinhanhs->isEmpty()) {
            // Xóa dữ liệu truyện
            $chuong->delete();

            return redirect()->route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet')->with('success', 'Xóa truyện thành công.');
        } else {
            // Xóa hình ảnh và dữ liệu liên quan của từng chương
            foreach ($hinhanhs as $hinhanh) {
                // Xóa hình ảnh của chương
                $oldFilePath = public_path('storage/uploads/chuong-tieu-thuyet/') . $hinhanh->chuong_hinhanh_tenhinh;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }

                // Xóa dữ liệu hình ảnh của chương
                $hinhanh->delete();
            }

            // Xóa dữ liệu chương
            $chuong->delete();

            return redirect()->route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet')->with('success', 'Xóa tập truyện và dữ liệu liên quan thành công.');
        }
    }
}
