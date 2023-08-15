@extends('layouts.admin')


@section('content')
    <div class="container mt-2">
        <h1 class="text-center">Quản lý Danh sách Tập Truyện Tranh</h1>
        <div class="container">
            <!-- Danh sách TRUYỆN TRANH START -->
            <div class="row">
                <div class="col">
                    <h3 class="text-truyen-tranh">Danh sách Tập Truyện Tranh</h3>
                </div>
            </div>
            @include('admin.Notification') <!-- Include the admin.Notification view -->
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tập số</th>
                                <th>Tên tập</th>
                                <th>Tên truyện</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataDanhSachTapTruyenTranh as $tap)
                                <tr>
                                    <td>{{ $tap->chuong_id }}</td>
                                    <td>{{ $tap->chuong_so }}</td>
                                    <td>{{ $tap->chuong_ten }}</td>
                                    <td>{{ $tap->truyen_ten }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.update', ['chuong_id' => $tap->chuong_id]) }}"
                                                class="btn btn-primary">Sửa</a>
                                            <form
                                                action="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.delete', ['chuong_id' => $tap->chuong_id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Xóa
                                                </button>
                                            </form>
                                            <!-- Nút Xem danh sách hình ảnh cho tập Truyện dựa vào khóa chính `chuong_id` -->
                                            <a href="{{ route('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen', ['chuong_id' => $tap['chuong_id'], 'chuong_ten' => $tap['chuong_ten'], 'ten_truyen' => $tap['truyen_ten']]) }}"
                                                class="btn btn-success">Danh sách hình ảnh</a>

                                            <!-- Nút Thêm hình ảnh cho tập Truyện dựa vào khóa chính `chuong_id` -->
                                            <a href="{{ route('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.create', ['chuong_id' => $tap['chuong_id'], 'chuong_ten' => $tap['chuong_ten']]) }}" class="btn btn-info">Thêm hình ảnh</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
