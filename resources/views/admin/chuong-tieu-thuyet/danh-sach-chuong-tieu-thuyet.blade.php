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
                                <th>Chương số</th>
                                <th>Tên chương</th>
                                <th>Nội dung chsương</th>
                                <th>Tên truyện</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataDanhSachChuongTieuThuyet as $chuong)
                                <tr>
                                    <td>{{ $chuong->chuong_id }}</td>
                                    <td>{{ $chuong->chuong_so }}</td>
                                    <td>{{ $chuong->chuong_ten }}</td>
                                    <td>
                                        <div class="paragraph-container">
                                            {!! $chuong->chuong_noidung !!}
                                        </div>
                                        <label class="read-more-button">xem thêm...</label>
                                    </td>
                                    <td>{{ $chuong->truyen_ten }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.update', ['chuong_id' => $chuong->chuong_id]) }}"
                                                class="btn btn-primary">Sửa</a>
                                            <form
                                                action="{{ route('admin.chuong-tieu-thuyet.danh-sach-chuong-tieu-thuyet.delete', ['chuong_id' => $chuong->chuong_id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Xóa
                                                </button>
                                            </form>
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
