<?php

namespace App\Http\Controllers;


use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\admin\Chuong;
use App\Models\admin\Chuong_Hinhanh;
use App\Models\admin\Truyen;

class HomeController extends Controller
{
    public function index()
    {
        $dataDanhSachTruyen  = Truyen::all(); // Lấy tất cả các bản ghi từ bảng "truyen"
        $dataDanhSachTieuThuyet = $dataDanhSachTruyen->where('truyen_loai', 1);
        $dataDanhSachTruyenTranh = $dataDanhSachTruyen->where('truyen_loai', 2);

        return view('Home', compact('dataDanhSachTruyen', 'dataDanhSachTieuThuyet', 'dataDanhSachTruyenTranh'));
    }

    public function breadcrumb()
    {
        $dataDanhSachTruyen = Truyen::all();
        $dataDanhSachTieuThuyet = $dataDanhSachTruyen->where('truyen_loai', 1);
        $dataDanhSachTruyenTranh = $dataDanhSachTruyen->where('truyen_loai', 2);

        return view('breadcrumb', compact('dataDanhSachTruyen', 'dataDanhSachTieuThuyet', 'dataDanhSachTruyenTranh'));
    }
}
