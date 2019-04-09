@extends('layouts.app')

@section('title', config('app.name') . '. List of available IELTS Speaking Tests')

@section('content')

    <div class="container" >
        <a href="/lessons" class="navbar-menu btn btn-top btn-sm"><i class="fas fa-arrow-circle-left fa-lg"></i> Back to Home</a>
    </div>

    <div class="container content">

        <div class="jumbotron jumbotron-fluid" style="margin-bottom: 40px;">
            <div class="container">
                <img src="/images/header-examinier.png" class="float-left" style="margin: 0 30px 40px 0;" alt="IELTS Virtual Speaking Exams Mascot">
                <h1 class="display-4">IELTS Virtual Speaking Exams</h1>
                
                <p>We have found that for many students, the most difficult part of the IELTS Exam is the speaking section, mostly because they do not know what to expect on the real exam, do not practice enough, and do not have anyone who can professionally evaluate their speech and point out their weak points.</p> 
                <p>Using our service, you will experience the speaking exam in the most realistic way, as all our tests are created by real IELTS examiners. Our teachers also will be able to evaluate your speaking ability according to the official IELTS evaluation standards. Evaluation cost is {{ env('EVALUATION_COST') }} USD.</p>
            </div>
        </div>
        <hr />

        <div id="subscriptions" class="row">

            @foreach($subscriptions as $key=>$subscription)

                <div class="col-md-4">
                    <div class="card text-white bg-info shadow">
                        <div class="card-header">
                            <h2 class="exam-title">{{ $subscription->title }}</h2>
                        </div>

                        <div class="card-body">
                            <img src="/images/{{$key}}-subscription.png" 
                                style="margin: 0 10px 20px 0;" 
                                alt="{{ $subscription->title }} Mascot" class="float-left">

                            <p class="card-text">
                                {{ $subscription->description }}
                            </p>

                            <div class="display-4 text-center exam-price">
                                ${{ $subscription->price }}
                            </div>   

                           <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-light btn-lg btn-block">Purchase</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection