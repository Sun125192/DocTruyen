@extends('layouts.admin')


@section('content')
    <div class="container">
        <!-- Form TRUYỆN TRANH START -->
        <div class="row">
            <div class="col">
                <h3 class="text-truyen-tranh">Thêm mới Tập Truyện Tranh</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Form cho phép người dùng upload file lên Server bắt buộc phải có thuộc tính enctype="multipart/form-data" -->
                <form method="post" action="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.create') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="truyen_id">Truyện</label>
                            <select name="truyen_id" id="truyen_id" class="form-control">
                                <option value="">Vui lòng chọn Truyện</option>
                                @foreach ($dataTruyen as $truyen)
                                    <option value="{{ $truyen->truyen_id }}">{{ $truyen->truyen_ten }}</option>
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
                        @foreach ($dataDanhSachTapTruyenTranh as $tap)
                            <tr>
                                <td>{{ $tap->truyen_ten }}</td>
                                <td>{{ $tap->chuong_so }}</td>
                                <td>{{ $tap->chuong_ten }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
