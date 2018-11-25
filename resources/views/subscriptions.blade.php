@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Subscriptions</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>


        <div class="row">

            @foreach($subscriptions as $subscription)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $subscription->title }}</h5>
                            <p class="card-text">
                                {{ $subscription->description }}
                            </p>
                            <h1 class="display-4">
                                @if($subscription->price > 0)
                                    ${{ $subscription->price }}
                                @else
                                    Free
                                @endif
                            </h1>
                            <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-primary btn-lg">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection