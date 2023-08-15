@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-truyen-tranh">Sửa Hình ảnh Tập Truyện Tranh</h3>
        </div>
    </div>
    <form name="frmSua" id="frmSua" method="post" action="{{ route('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.update', ['chuong_hinhanh_id' => $chuong_hinhanh_id, 'chuong_ten' => $chuong_ten]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col text-center">
                <label for="" class="top-label">Hình cũ</label>
                <img src="{{ asset('storage/uploads/' . $hinhanhRow->chuong_hinhanh_tenhinh) }}" class="img-fluid thumbnail-img" />
            
            </div>
            <div class="col">
                <div class="preview-img-container text-center mt-2">
                    <div id="preview-img-container" style="max-width: 500px; max-height: 500px; overflow: hidden;">
                        <img src="{{ asset('storage/icon/default-image_600.png') }}" id="preview-img" class="thumbnail-img" />
                    </div>
                </div>
                <input type="file" class="form-control" id="chuong_hinhanh_tenhinh" name="chuong_hinhanh_tenhinh" accept=".jpg, .jpeg, .png, .gif">
            </div>
        </div>
        <div class="text-right mt-3">
            <button name="btnLuu" id="btnLuu" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
<script src="{{ asset('js/reviewimg2.js') }}"></script>
<script src="{{ asset('js/bootstrap5.js') }}"></script>
@endsection