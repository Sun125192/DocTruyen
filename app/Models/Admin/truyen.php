<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    protected $table = 'truyen'; // Xác định tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'truyen_id'; // Xác định trường khóa chính của bảng

    public $timestamps = false; // Tắt timestamps

    protected $fillable = [
        'truyen_ma',
        'truyen_ten',
        'truyen_hinhdaidien',
        'truyen_loai',
        'truyen_theloai',
        'truyen_tacgia',
        'truyen_mota_ngan',
        'truyen_ngaydang',
    ];

    public function scopeLoai($query, $loai)
    {
        return $query->where('truyen_loai', $loai);
    }

    public function getAllTruyen()
    {
        return $this->all();
    }

    public function getTruyenById($id)
    {
        return $this->find($id);
    }
}
