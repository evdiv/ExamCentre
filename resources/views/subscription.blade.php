@extends('layouts.app')

@section('content')

    <div class="container">

        @if(auth()->check())
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/lessons/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/subscriptions">Subscriptions</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $subscription->title }}</li>
                </ol>
            </nav>
        @endif


        @if(count($errors->all()) > 0)
            <div class="alert alert-danger">
                {{ $errors->first() }}<br/>{{ url()->previous() }}
                <a href='/'>Return to the main page</a>
            </div>
        @else
            <hr style="margin-bottom: 40px;" />

            @guest
                @include('auth.register')
            @else
                <stripe-form :subscription="{{ $subscription }}"></stripe-form>
            @endguest

        @endif   

    </div>

@endsection