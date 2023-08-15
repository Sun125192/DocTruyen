@extends('layouts.admin')

<link href="{{ asset('css/ckeditor.css') }}" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <!-- Form TRUYỆN TRANH START -->
    <div class="row">
        <div class="col">
            <h3 class="text-truyen-tranh">Sửa Tập Truyện Tranh</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Form cho phép người dùng upload file lên Server bắt buộc phải có thuộc tính enctype="multipart/form-data" -->
            <form name="frmCapNhat" id="frmCapNhat" method="post" action="{{ route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.update', [$chuongTieuThuyet->chuong_id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="truyen_id">Tiểu Thuyết</label>
                        <select name="truyen_id" id="truyen_id" class="form-control">
                            <option value="">Vui lòng chọn Tiểu Thuyết</option>
                            @foreach ($dataChuongTieuThuyet as $chuong)
                                @if ($chuong->truyen_id == $chuong->truyen_id)
                                    <option value="{{ $chuong->truyen_id }}" selected>{{ $chuong->truyen_ten }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="chuong_so">Số tập</label>
                        <input class="form-control" id="chuong_so" name="chuong_so" placeholder="Số tập" value="{{ $chuongTieuThuyet->chuong_so }}">
                    </div>
                    <div class="form-group col-9">
                        <label for="chuong_ten">Tên tập truyện tranh</label>
                        <input type="text" class="form-control" id="chuong_ten" name="chuong_ten" placeholder="Tên tập truyện tranh" value="{{ $chuongTieuThuyet->chuong_ten }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="chuong_noidung">Nội dung chương</label>
                        <textarea class="ck-content" name="chuong_noidung" id="chuong_noidung">{!! $chuongTieuThuyet->chuong_noidung !!}</textarea>
                    </div>
                </div>
                <a href="{{ route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet') }}" class="btn btn-secondary">Quay về</a>
                <button class="btn btn-primary" name="btnLuu">Lưu dữ liệu</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/ckeditor.js') }}"></script>
@endsection
