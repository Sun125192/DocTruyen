@extends('layouts.admin')

@section('content')
    <div class="container">
        <!-- Danh sách TRUYỆN TRANH START -->
        <div class="row">
            <div class="col">
                <h1 class="text-center">Quản lý Danh sách Hình ảnh Tập Truyện Tranh</h3>
                    <div class="story-info">
                        <div class="story-title">Truyện {{ $ten_truyen }}</div>
                        <div class="chapter-title">{{ $chuong_ten }}</div>
                    </div>
            </div>
        </div>
        @include('admin.Notification') <!-- Include the admin.Notification view -->
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hình Ảnh Truyện</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhSachHinhAnhTruyenTranh as $ha)
                            <tr>
                                <td class="img-container2">
                                    <img src="{{ asset('storage/uploads/' . $ha->chuong_hinhanh_tenhinh) }}"
                                        class=" " />
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `chuong_hinhanh_id` -->
                                        <a href="{{ route('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.update', ['chuong_hinhanh_id' => $ha->chuong_hinhanh_id, 'chuong_id' => $chuong_id, 'chuong_ten' => $chuong_ten]) }}"
                                            class="btn btn-primary">
                                            Sửa
                                        </a>
                                        <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `chuong_hinhanh_id` -->
                                        <form
                                            action="{{ route('admin.tap-truyen-tranh.danh-sach-hinh-anh-truyen.delete', ['chuong_hinhanh_id' => $ha->chuong_hinhanh_id, 'chuong_id' => $chuong_id, 'chuong_ten' => $chuong_ten, 'ten_truyen' => $ten_truyen]) }}"
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
        <!-- Danh sách TRUYỆN TRANH END -->
    </div>
@endsection
