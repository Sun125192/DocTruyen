<?php

namespace App\Http\Controllers;

use App\Models\admin\Chuong;
use App\Models\admin\Chuong_Hinhanh;
use App\Models\admin\Truyen;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function showNoiDungTieuThuyet($truyen_id, $chuong_so, $tong_so_chuong)
    {
        $dataTruyenRow = Truyen::findOrFail($truyen_id);
        $dataChuongRow = Chuong::where('truyen_id', $truyen_id)->where('chuong_so', $chuong_so)->first();

        return view('tieu-thuyet.content', compact('dataChuongRow', 'dataTruyenRow', 'tong_so_chuong'));
    }

    public function showNoiDungTruyenTranh($truyen_id, $chuong_so, $tong_so_chuong)
    {
        $dataTruyenRow = Truyen::findOrFail($truyen_id);
        $dataChuongRow = Chuong::where('truyen_id', $truyen_id)
            ->where('chuong_so', $chuong_so)
            ->first();

        if ($dataChuongRow) {
            $chuong_id = $dataChuongRow->chuong_id;
            $dataChuongHinhAnhRow = Chuong_Hinhanh::where('chuong_id', $chuong_id)->get();
        } else {
            $dataChuongHinhAnhRow = collect(); // Trường hợp không tìm thấy chương, trả về collection rỗng
        }

        return view('truyen-tranh.content', compact('dataTruyenRow', 'dataChuongRow', 'dataChuongHinhAnhRow', 'tong_so_chuong'));
    }
}