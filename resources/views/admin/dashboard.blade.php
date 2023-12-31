@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xxxl-12 col-12">
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">
                            Dashboard
                        </h4>
                    </div>
                    <div class="box-body pt-0 box-dashboard">
                        <div class="mb-5">
                            <img class="rounded img-fluid" src="{{ asset($logo) }}" alt="">
                        </div>
                        <div class="info-content">
                            <h2 class="my-15"><a href="{{ route('home') }}">Welcome to {{ env('APP_NAME') }} </a></h2>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="icon-Image"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($banner) }}</h2>
                                <p class="text-fade mb-0">Banners</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="fa fa-fw fa-file"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($page) }}</h2>
                                <p class="text-fade mb-0">Pages</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($inquiry) }}</h2>
                                <p class="text-fade mb-0">Newsletter Inquiries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Ecommerce Info --}}

            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="fa fa-car" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($product) }}</h2>
                                <p class="text-fade mb-0">Vehciles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="ti-car"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($category) }}</h2>
                                <p class="text-fade mb-0">Body Style</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-4 col-lg-4 col-md-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="fa fa-hashtag"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ count($bids) }}</h2>
                                <p class="text-fade mb-0">Bids</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection




@push('css')
    <style>
        p {
            color: whitesmoke;
        }
    </style>
@endpush
