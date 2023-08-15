<?php

namespace App\Http\Controllers;

use App\Models\admin\Chuong;
use App\Models\admin\Truyen;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function showTruyenTranh($truyen_id)
    {
        $dataTruyenRow  = Truyen::findOrFail($truyen_id);
        $dataChuong  = Chuong::where('truyen_id', $truyen_id)->get();

        return view('truyen-tranh.detail', compact('dataTruyenRow', 'dataChuong'))
        ->with('dataTruyenRowTruyenTranh', $dataTruyenRow)
        ->with('dataChuongTruyenTranh', $dataChuong);
    }
    public function showCateTruyenTranh()
    {
        $dataDanhSachTruyenTranh = Truyen::loai(2)->get();

        return view('truyen-tranh.categoriesTruyenTranh', compact('dataDanhSachTruyenTranh'));
    }

    public function showTieuThuyet($truyen_id)
    {
        $dataTruyenRow  = Truyen::findOrFail($truyen_id);
        $dataChuong  = Chuong::where('truyen_id', $truyen_id)->get();

        return view('tieu-thuyet.detail', compact('dataTruyenRow', 'dataChuong'))
           ->with('dataTruyenRowTieuThuyet', $dataTruyenRow)
           ->with('dataChuongTieuThuyet', $dataChuong);
    }

    public function showCateTieuThuyet()
    {
        $dataDanhSachTieuThuyet = Truyen::loai(1)->get();

        return view('tieu-thuyet.categoriesTieuThuyet', compact('dataDanhSachTieuThuyet'));
    }
}