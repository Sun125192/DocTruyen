@extends('layouts.admin')


@section('content')
    <div class="container mt-2">

        <h1 class="text-center">Quản lý Danh sách Truyện tranh</h1>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-truyen-tranh">Danh sách Truyện Tranh</h3>
                </div>
            </div>

            @include('admin.Notification') <!-- Include the admin.Notification view -->

            <div class="row">
                <div class="col">
                    <!-- Đường link chuyển sang trang Thêm mới -->
                    {{-- <a href="{{ route('admin.truyen-tranh.danh-sach-truyen-tranh.create') }}"
                            class="btn btn-primary mb-2">Thêm mới</a> --}}

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Hình đại diện</th>
                                <th>Thể loại</th>
                                <th>Tác giả</th>
                                <th>Mô tả ngắn</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataDanhSachTruyenTranh as $truyentranh)
                                <tr>
                                    <td>{{ $truyentranh->truyen_id }}</td>
                                    <td>{{ $truyentranh->truyen_ma }}</td>
                                    <td>{{ $truyentranh->truyen_ten }}</td>
                                    <td>
                                        <div class="img-container">
                                            <img src="/storage/uploads/truyen-tranh/{{ $truyentranh->truyen_hinhdaidien }}"
                                                class="img-fluid img-lll img-thumbnail" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $truyentranh->truyen_theloai }}</td>
                                    <td>{{ $truyentranh->truyen_tacgia }}</td>
                                    <td>{{ $truyentranh->truyen_mota_ngan }}</td>
                                    <td>{{ $truyentranh->truyen_ngaydang }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `truyen_id` -->
                                            <a href="{{ route('admin.truyen-tranh.danh-sach-truyen-tranh.update', ['truyen_id' => $truyentranh->truyen_id]) }}"
                                                class="btn btn-primary">
                                                Sửa
                                            </a>
                                            <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `truyen_id` -->
                                            <form
                                                action="{{ route('admin.truyen-tranh.danh-sach-truyen-tranh.delete', ['truyen_id' => $truyentranh->truyen_id]) }}"
                                                method="POST" class="d-inline-block">
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
