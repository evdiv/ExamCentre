@extends('layouts.app')

@push('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@section('content')

    @if(auth()->check())

        <div class="container" >
            <a href="/lessons" class="navbar-menu btn btn-top btn-sm"><i class="fas fa-arrow-circle-left fa-lg"></i> Back to Home</a>
            <a href="/subscriptions" class="navbar-menu btn btn-top btn-sm"><i class="far fa-list-alt fa-lg"></i> All Exam Packages</a></li>
        </div>

    @endif

    <div class="container content">

        @if(count($errors->all()) > 0)
           <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="alert alert-danger">
                        <p>{{ $errors->first() }}</p>
                        <p><a class='btn btn-info' href='/subscriptions'>Return to Exam Packages</a></p>
                    </div>
                </div>
            </div>
        @endif

        @guest
            @include('auth.register')
        @else
            <stripe-form :product="{{ $subscription }}">
                <template slot="paypal">
                    <form method="POST" action="/paypal">
                        {{ csrf_field() }}
                        <input type="hidden" name="productId" value="{{ $subscription->id }}" />
                        <input type="hidden" name="productType" value="subscription" />
                        <button class='btn btn-block btn-lg btn-primary'><i class="fab fa-cc-paypal fa-lg"></i>&nbsp; Pay with PayPal</button>
                    </form>
                </template>
            </stripe-form>
        @endguest

    </div>

@endsection