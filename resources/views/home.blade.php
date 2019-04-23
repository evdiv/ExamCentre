@extends('layouts.app')

@section('title', config('app.name') . '. The most effective way to prepare for IELTS Speaking Tests online')

@section('content')

    <div class="container content">

        @include('layouts.errors')

        <div class="jumbotron jumbotron-fluid">
            <div class="container main-promo-container">
                <h1 style="display: inline-block;">IELTS Speaking Simulation Exams</h1>
                <img src="/images/header-examinier.png" class="jumbotron-img" alt="IELTS Virtual Speaking Exams Mascot">
                
                <p>We have found that for many students, the most difficult part of the IELTS Exam is the speaking section, mostly because they do not know what to expect on the real exam, do not practice enough, and do not have anyone who can professionally evaluate their speech and point out their weak points.</p> 

                <h2 style="display: inline-block;">Created by real IELTS Examiners</h2>
                <p>Using our service, you will experience the speaking exam in the most realistic way, as all our tests are created by real IELTS examiners. Our teachers also will be able to make an assessment of your speaking ability according to the official IELTS evaluation standards. Evaluation cost is {{ env('EVALUATION_COST') }} USD.</p>

            </div>
        </div>

        <hr />

        <div class="row">
        	<div class="col-lg-12 text-center">
                <h2>Simulation exams are fully based on the scripts of <span class="badge badge-danger">current IELTS Exams (spring 2019)</span></h2>
            </div>
            @foreach($subscriptions as $key=>$subscription)
                <div class="col-md-4">
                    <div class="card text-white bg-info shadow">

                        <div class="card-header">
                            <h2 class="exam-title">{{ $subscription->title }}</h2>
                        </div>

                        <div class="card-body">

                            <img src="/images/{{$key}}-subscription.png" class="exam-mascot" alt="{{ $subscription->title }} Mascot" >

                            <p class="card-text">
                                {{ $subscription->description }}
                            </p>
                            <div class="display-4 text-center exam-price">
                                @if($subscription->price > 0)
                                    ${{ $subscription->price }}
                                @else
                                    Free
                                @endif
                            </div>                            


                            @if($subscription->price > 0)
                                <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-light btn-lg btn-block">Get Full Simulation Exam</a>
                            @else
                                <a href="/register" class="btn btn-light btn-lg btn-block">Register</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row home-description">

            <div class="col-md-12">
                <div class="card transparent-card">
                     <div class="card-body">
                        <p class="card-text">
                            <i>All you need to take the virtual IELTS exam is a computer, a microphone, and relatively silent surroundings. Our professional teachers will help you immerse yourself in the examination process from the comfort of your own home. After completing any of our exams, you will gain not only a solid understanding of the examination process but also be able to send your recordings for evaluation, which takes 24 hours. Upon its completion, you will receive a report with your weak points and your estimated IELTS mark. Taking our virtual exams is an easy and convenient way to significantly improve your performance on the real IELTS test.</i>
                        </p>
                    </div>
                </div>    
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">1st</span> Advantage</span> <br/>
                    Based on real IELTS Exams</h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            All our virtual exams are based on the real IELTS Speaking tests. We try to make them as realistic as possible in order to provide you with the most accurate and beneficial test experience.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">2nd</span> Advantage</span> <br/>
                    Taking by real IELTS examinators</h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            All our teachers who administer the exams are real IELTS examiners who systematically participate in the real IELTS exams. They ask the questions the same way as they do on the real IELTS test.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">3rd</span> Advantage</span> <br/>
                        Assessment by IELTS examinators
                    </h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            After completing the test, you will be able to send your recording for evaluation. Our teachers will highlight your weak points and mark your speech according to the IELTS evaluation process.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">4th</span> Advantage</span> <br/> 
                    It is much cheaper than real Exam
                    </h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            The current cost of taking IELTS exam ranges from 215 to 230 USD. Using our service, you can purchase a virtual exam with a full evaluation for only 17.89 USD, which is around 12 times less.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row home-reviews">
            <div class="col-md-12">
                <div class="card">
                     <div class="card-body">
                        <p class="card-text">
                           <reviews></reviews>
                        </p>
                    </div>
                </div>    
            </div>
        </div>    

        @if(!Auth::user() && config('app.register_for_demo'))
            <div class="row" style="margin: 60px 0 0 0;">
                <div class="col-md-6 offset-md-3">
                    <a href="/register" class="btn btn-primary btn-lg btn-block btn-register">Register and get Free Demo Exam</a> 
                </div>
            </div> 
        @endif          

    </div>
@endsection