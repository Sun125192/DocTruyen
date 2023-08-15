@extends('layouts.app')

@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Danh sách Truyện Tranh</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($dataDanhSachTruyenTranh as $truyentranh)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ 'storage/uploads/truyen-tranh/' . $truyentranh['truyen_hinhdaidien'] }}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i>
                                                9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <h5>
                                                <a
                                                    href="{{ url('truyen-tranh', ['truyen_id' => $truyentranh['truyen_id']]) }}">{{ $truyentranh['truyen_ten'] }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
