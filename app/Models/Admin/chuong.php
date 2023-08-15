<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    use HasFactory;

    protected $table = 'chuong'; // Xác định tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'chuong_id'; // Xác định trường khóa chính của bảng

    public $timestamps = false; // Tắt timestamps

    protected $fillable = [
        'chuong_so',
        'chuong_ten',
        'chuong_noidung',
        'truyen_id',
    ];

    // Định nghĩa một phương thức để lấy danh sách tất cả chương
    public function getAllChuong()
    {
        return $this->all();
    }

    // Định nghĩa một phương thức để lấy chương theo ID
    public function getChuongById($id)
    {
        return $this->find($id);
    }

    // Định nghĩa một phương thức để lấy danh sách chương của một truyện
    public function getChuongByTruyenId($truyenId)
    {
        return $this->where('truyen_id', $truyenId)->get();
    }

    public static function danhSachChuongTieuThuyet()
{
    return static::join('truyen', 'chuong.truyen_id', '=', 'truyen.truyen_id')
        ->where('truyen.truyen_loai', 1)
        ->orderBy('truyen.truyen_ten')
        ->orderBy('chuong.chuong_so')
        ->select('chuong.*', 'truyen.truyen_ten')
        ->get();
}
}