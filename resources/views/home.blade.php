@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Here will be:</h1>
                <ul>
                    <li>Header Image</li>
                    <li>Service Description</li>
                    <li>Animated intro</li>
                    <li>List of advantages</li>
                    <li>List of Subscription Plans (one plan can be free, so the user can use our testing method)</li>
                    <li>Button to ask a question with modal form</li>
                </ul>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header">Advantage 1</div>
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header">Advantage 2</div>
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header">Advantage 3</div>
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header">Advantage 4</div>
                    <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <hr />


        <div class="row">
            @foreach($subscriptions as $subscription)
                <div class="col-md-4">
                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{ $subscription->title }}</h4>
                        </div>

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
                            <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-primary btn-lg btn-block">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection