<?php

namespace App\Http\Controllers\admin\tieu_thuyet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Truyen;
use App\Models\admin\Chuong;
use App\Models\admin\chuong_hinhanh;

class TieuthuyetController extends Controller
{
    public function danhSachTieuThuyet()
    {
        $dataDanhSachTieuThuyet = Truyen::loai(1)->get();
        return view('admin.tieu-thuyet.danh-sach-tieu-thuyet', compact('dataDanhSachTieuThuyet'));
    }

    public function tieuThuyetCreate()
    {
        return view('admin.tieu-thuyet.them-tieu-thuyet');
    }

    // Hiển thị form thêm mới truyện
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'truyen_ma' => 'required|min:3|max:50',
                'truyen_ten' => 'required|min:3|max:50',
                'truyen_theloai' => 'required|min:3|max:50',
                'truyen_tacgia' => 'required|min:3|max:50',
                'truyen_mota_ngan' => 'required|min:3|max:65000',
                'truyen_hinhdaidien' => 'image|mimes:jpg,jpeg,png,gif|max:10000', // Adjust max file size as needed
            ]);

            $truyen_hinhdaidien = $request->file('truyen_hinhdaidien');
            $tentaptin = date('YmdHis') . '_' . $truyen_hinhdaidien->getClientOriginalName();
            $upload_dir = public_path('storage/uploads/tieu-thuyet/');
            $truyen_hinhdaidien->move($upload_dir, $tentaptin);

            Truyen::create([
                'truyen_ma' => $validatedData['truyen_ma'],
                'truyen_ten' => $validatedData['truyen_ten'],
                'truyen_hinhdaidien' => $tentaptin,
                'truyen_loai' => 1, // #2-Truyện tranh
                'truyen_theloai' => $validatedData['truyen_theloai'],
                'truyen_tacgia' => $validatedData['truyen_tacgia'],
                'truyen_mota_ngan' => $validatedData['truyen_mota_ngan'],
                'truyen_ngaydang' => now(),
            ]);


            // Sau khi lưu dữ liệu thành công, chuyển hướng về trang danh sách truyện tranh
            return redirect()->route('admin.tieu-thuyet.danh-sach-tieu-thuyet')->with('success', 'Thêm mới tiểu thuyết thành công.');
        }

        // Nếu không có yêu cầu POST từ form, hiển thị trang thêm mới truyện tranh
        return view('admin.tieu-thuyet.them-tieu-thuyet');
    }

    public function tieuThuyetUpdate($truyen_id)
    {
        // Giả sử bạn có một dòng mã nào đó để lấy thông tin của truyện từ cơ sở dữ liệu, ví dụ:
        $truyen = Truyen::find($truyen_id);

        return view('admin.tieu-thuyet.cap-nhat-tieu-thuyet', ['truyen' => $truyen]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'truyen_ma' => 'required|min:3|max:50',
                'truyen_ten' => 'required|min:3|max:50',
                'truyen_theloai' => 'required|min:3|max:50',
                'truyen_tacgia' => 'required|min:3|max:50',
                'truyen_mota_ngan' => 'required|min:3|max:65000',
                'truyen_hinhdaidien' => 'image|mimes:jpg,jpeg,png,gif|max:10000', // Adjust max file size as needed
            ]);

            $truyen = Truyen::find($request->truyen_id);

            $tentaptin = $truyen->truyen_hinhdaidien;
            if (isset($_FILES['truyen_hinhdaidien']) && $_FILES['truyen_hinhdaidien']['error'] == 0) {
                $upload_dir = public_path('storage/uploads/tieu-thuyet/'); // Thay đổi đường dẫn lưu hình
                $old_file = $upload_dir . $truyen->truyen_hinhdaidien;

                if (file_exists($old_file)) {
                    unlink($old_file);
                }

                $tentaptin = date('YmdHis') . '_' . $_FILES['truyen_hinhdaidien']['name'];
                move_uploaded_file($_FILES['truyen_hinhdaidien']['tmp_name'], $upload_dir . $tentaptin);
            }


            $truyen->truyen_ma = $validatedData['truyen_ma'];
            $truyen->truyen_ten = $validatedData['truyen_ten'];
            $truyen->truyen_hinhdaidien = $tentaptin;
            $truyen->truyen_loai = 1; // #2-Truyện tranh
            $truyen->truyen_theloai = $validatedData['truyen_theloai'];
            $truyen->truyen_tacgia = $validatedData['truyen_tacgia'];
            $truyen->truyen_mota_ngan = $validatedData['truyen_mota_ngan'];
            $truyen->truyen_ngaydang = now();

            $truyen->save();

            return redirect()->route('admin.tieu-thuyet.danh-sach-tieu-thuyet')->with('success', 'Cập nhật tiểu thuyết thành công.');
        }

        // Nếu không có yêu cầu POST từ form, hiển thị trang thêm mới truyện tranh
        return view('admin.tieu-thuyet.them-tieu-thuyet');
    }

    public function delete($truyen_id)
    {
        $truyen = Truyen::find($truyen_id);

        if (!$truyen) {
            // Xử lý nếu không tìm thấy bản ghi
            return redirect()->route('admin.tieu-thuyet.danh-sach-tieu-thuyet')->with('error', 'Không tìm thấy truyện.');
        }

        // Tìm tất cả các chương của truyện
        $chuongs = Chuong::where('truyen_id', $truyen_id)->get();

        if ($chuongs->isEmpty()) {
            // Xóa hình đại diện của truyện
            $oldFilePath = public_path('storage/uploads/tieu-thuyet/') . $truyen->truyen_hinhdaidien;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Xóa dữ liệu truyện
            $truyen->delete();

            return redirect()->route('admin.tieu-thuyet.danh-sach-tieu-thuyet')->with('success', 'Xóa truyện thành công.');
        } else {
            // Xóa hình ảnh và dữ liệu liên quan của từng chương
            foreach ($chuongs as $chuong) {
                $hinhanhs = chuong_hinhanh::where('chuong_id', $chuong->chuong_id)->get();

                foreach ($hinhanhs as $hinhanh) {
                    // Xóa hình ảnh của chương
                    $oldFilePath = public_path('storage/uploads/tieu-thuyet/') . $hinhanh->chuong_hinhanh_tenhinh;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }

                    // Xóa dữ liệu hình ảnh của chương
                    $hinhanh->delete();
                }

                // Xóa dữ liệu chương
                $chuong->delete();
            }

            // Xóa hình đại diện của truyện
            $oldFilePath = public_path('storage/uploads/tieu-thuyet/') . $truyen->truyen_hinhdaidien;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Xóa dữ liệu truyện
            $truyen->delete();

            return redirect()->route('admin.tieu-thuyet.danh-sach-tieu-thuyet')->with('success', 'Xóa truyện và dữ liệu liên quan thành công.');
        }
    }
}
