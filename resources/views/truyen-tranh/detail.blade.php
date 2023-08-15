@extends('layouts.app')

@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg"
                            data-setbg="{{ asset('storage/uploads/truyen-tranh/' . $dataTruyenRow['truyen_hinhdaidien']) }}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $dataTruyenRow['truyen_ten'] }}</h3>
                                <span>Tác giả: {{ $dataTruyenRow['truyen_tacgia'] }}</span>
                            </div>
                            {{-- <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div> --}}
                            <p>{{ $dataTruyenRow['truyen_mota_ngan'] }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $dataTruyenRow['truyen_theloai'] }}</li>
                                            <li><span>Date aired:</span> {{ $dataTruyenRow['truyen_ngaydang'] }}</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DANH SÁCH CÁC CHƯƠNG/TẬP START -->
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Danh sách Chương truyện {{ $dataTruyenRow['truyen_ten'] }}</h5>
                        </div>
                        <table class="table table-striped table-dark table-hover border border-2">
                            <thead>
                                <tr>
                                    <th>Số tập</th>
                                    <th>Tên tập</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataChuong as $chuong)
                                    <tr>
                                        <td>Tập {{ $chuong['chuong_so'] }}</td>
                                        <td>
                                            <a
                                                href="{{ url('truyen-tranh', ['truyen_id' => $chuong['truyen_id'], 'chuong_so' => $chuong['chuong_so'], 'tong_so_chuong' => count($dataChuong)]) }}">
                                                {{ $chuong['chuong_ten'] }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DANH SÁCH CÁC CHƯƠNG/TẬP END -->
@endsection
