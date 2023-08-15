@extends('layouts.app')

@section('content')
    <!-- THÔNG TIN CHƯƠNG/TẬP START -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
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
                        <a href="{{ url('tieu-thuyet', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongTruocSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                            class="btn btn-primary <?= $trangThaiChuongTruoc ?>">Chương trước</a>

                        <a href="{{ url('tieu-thuyet', $dataTruyenRow['truyen_id']) }}" class="btn btn-outline-success">Quay
                            về
                            Danh
                            sách</a>

                        <a href="{{ url('tieu-thuyet', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongSauSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                            class="btn btn-primary <?= $trangThaiChuongSau ?>">Chương sau</a>
                    </div>
                </div>
                <!-- THÔNG TIN CHƯƠNG/TẬP END -->

                <!-- THÔNG TIN NỘI DUNG CHƯƠNG/TẬP START -->
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            <div class="text-justify" style="font-size: 16px;">
                                <p> {!! $dataChuongRow['chuong_noidung'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- THÔNG TIN NỘI DUNG CHƯƠNG/TẬP END -->

                <div class="row mb-2">
                    <div class="col text-center">
                        @php
                            // Tính toán Chương trước Số = chương hiện tại +/- 1
                            $chuongTruocSo = $dataChuongRow['chuong_so'] - 1;
                            $chuongSauSo = $dataChuongRow['chuong_so'] + 1;
                            
                            // Set trạng thái Disabled nếu Số Chương/Tập tính toán không hợp lý
                            $trangThaiChuongTruoc = $chuongTruocSo <= 0 ? 'disabled' : '';
                            $trangThaiChuongSau = $chuongSauSo > $tong_so_chuong ? 'disabled' : '';
                        @endphp
                        <a href="{{ url('tieu-thuyet', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongTruocSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                            class="btn btn-primary <?= $trangThaiChuongTruoc ?>">Chương trước</a>

                        <a href="{{ url('tieu-thuyet', ['truyen_id' => $dataChuongRow['truyen_id'], 'chuong_so' => $chuongSauSo, 'tong_so_chuong' => $tong_so_chuong]) }}"
                            class="btn btn-primary <?= $trangThaiChuongSau ?>">Chương sau</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
