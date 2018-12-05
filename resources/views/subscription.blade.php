@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-light shadow">
                    <div class="card-header text-center">
                        <h4 class="my-0 font-weight-normal">{{ $subscription->title }}</h4>
                    </div>

                    <div class="card-body text-center">

                        <h1 class="card-title pricing-card-title">
                            @if($subscription->price > 0)
                                ${{ $subscription->price }}<small class="text-muted"> USD</small>
                            @else
                                Free
                            @endif

                        </h1>

                        <p>{{ $subscription->description }}</p>

                        @if(count($errors->all()) > 0)
                            <div class="alert alert-danger">
                                {{ $errors->first() }}<br/>{{ url()->previous() }}
                                <a href='/'>Return to the main page</a>
                            </div>
                        @else
                            <hr style="margin-bottom: 40px;" />
                            @guest
                                @include('layouts.checkout-guest')
                            @else
                                @include('layouts.checkout')
                            @endguest
                        @endif    

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection