@extends('layouts.admin')

<link href="{{ asset('css/ckeditor.css') }}" rel="stylesheet" type="text/css">
@section('content')
    

    <div class="container">
        <!-- Form TRUYỆN TRANH START -->
        <div class="row">
            <div class="col">
                <h3 class="text-truyen-tranh">Thêm mới Chương Tiểu Thuyết</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Form cho phép người dùng upload file lên Server bắt buộc phải có thuộc tính enctype="multipart/form-data" -->
                <form method="post" action="{{ route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="truyen_id">Tiểu Thuyết</label>
                            <select name="truyen_id" id="truyen_id" class="form-control">
                                <option value="">Vui lòng chọn Tiểu Thuyết</option>
                                @foreach ($dataTieuThuyet as $chuong)
                                    <option value="{{ $chuong->truyen_id }}">{{ $chuong->truyen_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <label for="chuong_so">Tập số</label>
                            <input type="number" class="form-control" id="chuong_so" name="chuong_so" placeholder="Tập số"
                                value="">
                        </div>
                        <div class="form-group col-9">
                            <label for="chuong_ten">Tên tập truyện tranh</label>
                            <input type="text" class="form-control" id="chuong_ten" name="chuong_ten"
                                placeholder="Tên tập truyện tranh" value="">
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="chuong_noidung">Nội dung chương</label>
                                <textarea class="ck-content" name="chuong_noidung" id="chuong_noidung"></textarea>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.create') }}"
                        class="btn btn-secondary">Quay về</a>
                    <button class="btn btn-primary" name="btnLuu">Lưu dữ liệu</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên truyện</th>
                            <th>Tập số</th>
                            <th>Tên tập</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDanhSachChuongTieuThuyet as $chuong)
                            <tr>
                                <td>{{ $chuong->truyen_ten }}</td>
                                <td>{{ $chuong->chuong_so }}</td>
                                <td>{{ $chuong->chuong_ten }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
@endsection
