@extends('layouts.app')

@section('content')
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/lessons/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
            </ol>
        </nav>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Subscriptions</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>


        <div class="row">

            @foreach($subscriptions as $subscription)
                <div class="col-md-4">
                    <div class="card text-white bg-info shadow">
                        <div class="card-header">{{ $subscription->title }}</div>
                        <div class="card-body">
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
                            <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-light btn-lg">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection