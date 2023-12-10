@extends('layouts.app')
@section('title', 'New Arrival Products')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h4>New Arrivals</h4>
                    <div class="underline mb-4"></div>
                </div>


                @forelse ($newArrivalProducts as $data)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>
                                @if ($data->productImages->count() > 0)
                                    <a href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
                                        <img src="{{ asset($data->productImages[0]->image) }}" alt="{{ $data->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $data->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/' . $data->category->slug . '/' . $data->slug) }}">
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
                @empty
                    <div class="col-md-12 p-2">
                        <h4>No Product Available</h4>
                    </div>
                @endforelse
                <div class="text-center">
                    <a href="{{ url('/collections') }}" class="btn btn-warning px-3">View more</a>
                </div>

            </div>
        </div>
    </div>
@endsection
