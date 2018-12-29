@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Welcome to IELTS Speaking Exams</h1>
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
                            <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-info btn-lg btn-block">Subscribe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row" style="margin: 40px 0;">

            <div class="col-md-8">
                <div class="card">
                     <div class="card-body">
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                    </div>
                </div>    
            </div>
            <div class="col-md-4">
                Here will be an Image
            </div>
        </div>

        <hr />

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

    </div>
@endsection