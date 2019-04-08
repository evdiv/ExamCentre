@extends('layouts.app')

@push('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@section('content')

    @if(auth()->check())
        <div class="container" >
            <a href="/lessons" class="navbar-menu btn btn-top btn-sm"><i class="fas fa-arrow-circle-left fa-lg"></i> Back to Home</a>
        </div>
    @endif


    <div class="container content">

        @if(count($errors->all()) > 0)
            <div class="alert alert-danger">
                {{ $errors->first() }}<br/>{{ url()->previous() }}
                <a href='/'>Return to the main page</a>
            </div>
        @else

            @guest
                @include('auth.register')
            @else
                <stripe-form :product="{{ $lesson }}">
                    <template slot="paypal">
                        <form method="POST" action="/paypal">
                            {{ csrf_field() }}
                            <input type="hidden" name="productId" value="{{ $lesson->id }}" />
                            <input type="hidden" name="productType" value="evaluation" />
                            <button class='btn btn-block btn-lg btn-primary'><i class="fab fa-cc-paypal fa-lg"></i>&nbsp; Pay with PayPal</button>
                        </form>
                    </template>
                </stripe-form>
            @endguest

        @endif   

    </div>

@endsection