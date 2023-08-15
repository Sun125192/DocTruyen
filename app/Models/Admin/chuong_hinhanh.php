<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuong_hinhanh extends Model
{
    use HasFactory;

    protected $table = 'chuong_hinhanh'; // Xác định tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'chuong_hinhanh_id'; // Xác định trường khóa chính của bảng

    public $timestamps = false; // Tắt timestamps
    
    protected $fillable = [
        'chuong_id',
        'chuong_hinhanh_tenhinh',
    ];

    // Định nghĩa một phương thức để lấy danh sách tất cả hình ảnh của chương
    public function getAllHinhanhByChuongId($chuongId)
    {
        return $this->where('chuong_id', $chuongId)->get();
    }

    // Định nghĩa một phương thức để lấy hình ảnh của chương theo ID
    public function getHinhanhById($id)
    {
        return $this->find($id);
    }
}
