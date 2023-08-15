@extends('layouts.app')

@section('content')

        <!-- THÔNG TIN CHƯƠNG/TẬP START -->
        <div class="row mb-2">
            <div class="col text-center">
                <h3 class="text-primary fw-bold text-uppercase">{{ $dataTruyenRow['truyen_ten'] }} </h3>
                <h4>Chương {{ $dataChuongRow['chuong_so'] }} - {{ $dataChuongRow['chuong_ten'] }}</h4>
                @php
                    // Tính toán Chương trước Số = chương hiện tại +/- 1
                    $chuongTruocSo = $dataChuongRow['chuong_so'] - 1;
                    $chuongSauSo = $dataChuongRow['chuong_so'] + 1;
                    
                    // Set trạng thái Disabled nếu Số Chương/Tập tính toán không hợp lý
                    $trangThaiChuongTruoc = $chuongTruocSo <= 0 ? 'disabled' : '';
                    $trangThaiChuongSau = $chuongSauSo > $tong_so_chuong ? 'disabled' : '';
                @endphp
                <a href="{{ url('truyen-tranh', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongTruocSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                    class="btn btn-primary <?= $trangThaiChuongTruoc ?>">Chương trước</a>

                <a href="{{ url('truyen-tranh', $dataTruyenRow['truyen_id']) }}" class="btn btn-outline-success">Quay về Danh
                    sách</a>

                <a href="{{ url('truyen-tranh', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongSauSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                    class="btn btn-primary <?= $trangThaiChuongSau ?>">Chương sau</a>
            </div>
        </div>
        <!-- THÔNG TIN CHƯƠNG/TẬP END -->


        <!-- THÔNG TIN NỘI DUNG CHƯƠNG/TẬP START -->
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="text-justify" style="font-size: 16px;">
                    @foreach ($dataChuongHinhAnhRow as $hinhanh)
                        <img src="{{ asset('storage/uploads/' . $hinhanh['chuong_hinhanh_tenhinh']) }}"
                            class="card-img-top img-fluid" alt="">
                    @endforeach
                </div>
            </div>
        </div>
        <!-- THÔNG TIN NỘI DUNG CHƯƠNG/TẬP END -->
@endsection
