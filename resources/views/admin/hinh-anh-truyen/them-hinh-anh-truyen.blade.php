@extends('layouts.admin')


@section('content')
    <div class="container">
        <!-- Form TRUYỆN TRANH START -->
        <div class="row">
            <div class="col">
                <h3 class="text-truyen-tranh">Thêm mới Hình ảnh Tập Truyện Tranh</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form name="frmThemMoi" id="frmThemMoi" method="post" action="{{ route('upload.images') }}"
                    enctype="multipart/form-data" class="dropzone">
                    @csrf <!-- Thêm CSRF token -->
                    <input type="hidden" name="chuong_id" id="chuong_id" value="{{ $tap['chuong_id'] }}" />
                    <div class="form-group">
                        <label for="">Tên tập truyện</label>
                        <input type="text" name="chuong_ten" id="chuong_ten" value="{{ $tap['chuong_ten'] }}"
                            class="form-control" disabled />
                    </div>
                </form>
                <a href="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh') }}" class="btn btn-secondary">
                    Quay về Danh sách Tập truyện tranh
                </a>
            </div>
        </div>
        <!-- End block content -->
    </div>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.frmThemMoi = {
            paramName: "chuong_hinhanh_tenhinh", // Sử dụng "file" tương ứng với trường khi gửi yêu cầu tải lên
            maxFilesize: 2, // MB
            acceptedFiles: ".jpeg,.jpg,.png", // Định dạng tệp cho phép
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        };
    </script>
@endsection('content')
