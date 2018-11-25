@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4 class="my-0 font-weight-normal">{{ $subscription->title }}</h4>
                    </div>

                    <div class="card-body text-center">

                        <h1 class="card-title pricing-card-title">${{ $subscription->price }}
                            <small class="text-muted"> USD</small>
                        </h1>

                        <p>{{ $subscription->description }}</p>

                        @guest
                            @include('layouts.checkout-guest')
                        @else
                            @include('layouts.checkout')
                        @endguest

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection