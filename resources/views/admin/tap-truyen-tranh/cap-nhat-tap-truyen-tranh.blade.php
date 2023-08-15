@extends('layouts.admin')


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
            <form name="frmCapNhat" id="frmCapNhat" method="post" action="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh.update', [$chuong->chuong_id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="truyen_id">Truyện</label>
                        <select name="truyen_id" id="truyen_id" class="form-control">
                            <option value="">Vui lòng chọn Truyện</option>
                            @foreach ($dataTruyen as $truyen)
                                @if ($truyen->truyen_id == $chuong->truyen_id)
                                    <option value="{{ $truyen->truyen_id }}" selected>{{ $truyen->truyen_ten }}</option>
                                @else
                                    <option value="{{ $truyen->truyen_id }}">{{ $truyen->truyen_ten }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="chuong_so">Số tập</label>
                        <input type="number" class="form-control" id="chuong_so" name="chuong_so" placeholder="Số tập" value="{{ $chuong->chuong_so }}">
                    </div>
                    <div class="form-group col-9">
                        <label for="chuong_ten">Tên tập truyện tranh</label>
                        <input type="text" class="form-control" id="chuong_ten" name="chuong_ten" placeholder="Tên tập truyện tranh" value="{{ $chuong->chuong_ten }}">
                    </div>
                </div>
                <a href="{{ route('admin.tap-truyen-tranh.danh-sach-tap-truyen-tranh') }}" class="btn btn-secondary">Quay về</a>
                <button class="btn btn-primary" name="btnLuu">Lưu dữ liệu</button>
            </form>
        </div>
    </div>
</div>
@endsection
