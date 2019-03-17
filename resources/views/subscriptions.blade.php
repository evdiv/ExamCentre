@extends('layouts.app')

@section('content')

    <div class="container" >
        <a href="/lessons" class="navbar-menu btn btn-success btn-sm"><i class="fas fa-arrow-circle-left fa-lg"></i> Back to Home</a>
    </div>

    <div class="container content">

        <div class="jumbotron jumbotron-fluid" style="margin-bottom: 40px;">
            <div class="container">
                <img src="/images/header-examinier.png" class="float-left" style="margin: 0 30px 40px 0;" alt="IELTS Virtual Speaking Exams Mascot">
                <h1 class="display-4">IELTS Virtual Speaking Exams</h1>
                <p>We have found that for many students the most difficult part is the Speaking test. This is mostly because of not knowing of what to expect on the real test, lack of practice and absende of someone who can profecionally evaluate your speach and point out on your mistakes and weak points. </p> 
                <p>Using our service you will get an experience of the Speaking Exam in the most realistic way, all our teachers are real IELTS examenators who not only perform the exam with you but also will be able to evaluate your speaking ability according to the official IELTS evaluation standarts. Evaluation cost is 11.99 USD.
            </div>
        </div>
        <hr />

        <div class="row">

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