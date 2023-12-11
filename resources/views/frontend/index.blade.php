@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($sliders as $key => $data)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($data->image)
                        <img src="{{ asset($data->image) }}" calss="d-block w-100" alt="Slider">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $data->title !!}
                            </h1>
                            <p>
                                {!! $data->description !!}
                            </p>
                            <div class="">
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Imprint Design Shopping Site</h4>
                    <div class="underline mx-auto"></div>
                    <p>
                        We've got something for everyone, quality meets affordability.
                        Message us to stock up your inventory with our available for wholesale top-notch t-shirts and polo
                        shirts.
                        DM us to place your wholesale order now! 👕✨
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-carousel">
                            @foreach ($trendingProducts as $data)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($data->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    <img src="{{ asset($data->productImages[0]->image) }}"
                                                        alt="{{ $data->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $data->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    {{ $data->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">₱{{ $data->selling_price }}</span>
                                                <span class="original-price">₱{{ $data->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="p-3">
                            <h4>No Product Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('/new-arrival') }}" class="btn btn-dark float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($newArrivalProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-carousel">
                            @foreach ($newArrivalProducts as $data)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($data->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    <img src="{{ asset($data->productImages[0]->image) }}"
                                                        alt="{{ $data->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $data->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    {{ $data->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">₱{{ $data->selling_price }}</span>
                                                <span class="original-price">₱{{ $data->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="p-3">
                            <h4>No New Arrivals Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('/featured-products') }}" class="btn btn-dark float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-carousel">
                            @foreach ($featuredProducts as $data)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($data->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    <img src="{{ asset($data->productImages[0]->image) }}"
                                                        alt="{{ $data->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $data->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                                    {{ $data->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">₱{{ $data->selling_price }}</span>
                                                <span class="original-price">₱{{ $data->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="p-3">
                            <h4>No Featured Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.product-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
