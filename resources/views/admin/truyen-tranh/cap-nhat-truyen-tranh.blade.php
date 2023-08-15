@extends('layouts.admin')


@section('content')
    <div class="container mt-2">
        <h1 class="text-center">Quản lý Cập nhật Truyện tranh</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-truyen-tranh">Cập nhật Truyện Tranh</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form name="frmCapNhat" id="frmCapNhat" method="post"
                    action="{{ route('admin.truyen-tranh.danh-sach-truyen-tranh.update',[$truyen->truyen_id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="truyen_ma">Mã truyện tranh</label>
                            <input type="text" class="form-control" id="truyen_ma" name="truyen_ma"
                                placeholder="Mã truyện tranh" value="{{ $truyen->truyen_ma }}">
                            @error('truyen_ma')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="truyen_ten">Tên truyện tranh</label>
                            <input type="text" class="form-control" id="truyen_ten" name="truyen_ten"
                                placeholder="Tên truyện tranh" value="{{ $truyen->truyen_ten }}">
                            @error('truyen_ten')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="truyen_loai">Loại truyện tranh</label>
                            <input type="text" class="form-control" id="truyen_loai" name="truyen_loai"
                                placeholder="Loại truyện tranh" value="#2-Truyện tranh" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="truyen_theloai">Thể loại truyện tranh</label>
                            <input type="text" class="form-control" id="truyen_theloai" name="truyen_theloai"
                                placeholder="Thể loại truyện tranh" value="{{ $truyen->truyen_theloai }}">
                            @error('truyen_theloai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="truyen_tacgia">Tác giả truyện tranh</label>
                            <input type="text" class="form-control" id="truyen_tacgia" name="truyen_tacgia"
                                placeholder="Tác giả truyện tranh" value="{{ $truyen->truyen_tacgia }}">
                            @error('truyen_tacgia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="truyen_hinhdaidien">Hình đại diện</label>
                            <input type="file" class="form-control" id="truyen_hinhdaidien" name="truyen_hinhdaidien"
                                accept=".jpg, .jpeg, .png, .gif">
                            @error('truyen_hinhdaidien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="preview-img-container text-center mt-2">
                                <img src="{{ asset('storage/uploads/truyen-tranh/' . $truyen->truyen_hinhdaidien) }}"
                                    id="preview-img" width="200px" />
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="truyen_mota_ngan">Mô tả ngắn</label>
                            <textarea class="form-control" id="truyen_mota_ngan" name="truyen_mota_ngan" placeholder="Mô tả ngắn về truyện tranh"
                                rows="10">{{ $truyen->truyen_mota_ngan }}</textarea>
                            @error('truyen_mota_ngan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ route('admin.truyen-tranh.danh-sach-truyen-tranh') }}" class="btn btn-secondary">Quay
                        về</a>
                    <button class="btn btn-primary" type="submit" name="btnLuu">Lưu dữ liệu</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/reviewimg.js') }}"></script>
    <script src="{{ asset('js/bootstrap5.js') }}"></script>
@endsection
