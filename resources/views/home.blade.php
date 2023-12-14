@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <a href="{{ url('/') }}">
                            <button class="btn btn-dark btn-sm">
                                {{ __('Shop now!') }}
                            </button>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
