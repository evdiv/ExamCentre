@extends('layouts.app')

@section('content')

    <div class="container content">

        @include('layouts.errors')

        <div class="jumbotron jumbotron-fluid" style="margin-bottom: 40px;">
            <div class="container">
                <img src="/images/header-examinier.png" class="float-left" style="margin: 0 30px 40px 0;" alt="IELTS Virtual Speaking Exams Mascot">
                <h1 class="display-4">IELTS Virtual Speaking Exams</h1>
                <p>We have found that for many students the most difficult part is the Speaking test. This is mostly because of not knowing of what to expect on the real test, lack of practice and absende of someone who can profecionally evaluate your speach and point out on your mistakes and weak points. </p> 
                <p>Using our service you will get an experience of the Speaking Exam in the most realistic way, all our teachers are real IELTS examenators who not only perform the exam with you but also will be able to evaluate your speaking ability according to the official IELTS evaluation standarts. Evaluation cost is 7.99 USD.
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
                                @if($subscription->price > 0)
                                    ${{ $subscription->price }}
                                @else
                                    Free
                                @endif
                            </div>                            


                            @if($subscription->price > 0)
                                <a href="/subscriptions/{{ $subscription->id }}" class="btn btn-light btn-lg btn-block">Purchase</a>
                            @else
                                <a href="/register" class="btn btn-light btn-lg btn-block">Register</a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row" style="margin: 40px 0;">

            <div class="col-md-12">
                <div class="card transparent-card">
                     <div class="card-body" style="padding-top: 1rem;">
                        <p class="card-text">
                            <img src="/images/virtual-exam.png" class="float-right" alt="Convinience on the Virtual IELTS Exams">
                            <i style="font-size: 18px;">All you need for taking virtual IELTS exam is your computer, microphone and relatively silent environment aroud you. Our profeccioanl teachers will help you to to emerge into the examination process siting at home in your cousy chair. After completing any exam you will get not only the solid understanding of the examinations proccess but also you will ba able to send you recordings for evaluation. Evaluation takes 24 hours and costs 11.99 USD, on its completion you will get the report with your weak points and your estimate IELTS mark. Taking our virtual exams is easy and convenient way to significanly improve your performance on the real IELTS test. </i>
                        </p>
                    </div>
                </div>    
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">1st</span> Advantage</span> <br/>
                    Based on real IELTS Exams</h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            All our virtual Exam based on the real IELTS Speaking test. We are trying to make them as realistic as posible in order to provide you with the most related to the test experience.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">2nd</span> Advantage</span> <br/>
                    Taking by real IELTS examinators</h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            All our teachers who will be taking your exams are IELTS examinators who systimatically participating in the real IELTS Exams. They ask questions the same way as they do it on IELTS test.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">3rd</span> Advantage</span> <br/>
                        Evaluation by IELTS examinators
                    </h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            After completing the test you will be able to send your recording for evaluation. Our teachers will highlight your weak points, mistakes and mark your response accordingly to the IELTS evaluation process.
                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-header"><h3 class='advantage-title'><span class='advantage-sub-title'>
                        <span class="badge badge-danger">4th</span> Advantage</span> <br/> 
                    It is much cheaper than real Exam
                    </h3></div>
                    <div class="card-body">
                        <p class="card-text">
                            As you know the current cost of taking IELTS Exam ranges between $215–230 USD. Using our service you can purchase an Exam with full evaluation of your records for only 17.98 USD that nearly as 12 times less. 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin: 40px 0;">
            <div class="col-md-12">
                <div class="card" style="border: none; background-color: #fffae6; font-size: 26px; color: #b79164; font-family: 'Satisfy', cursive;">
                     <div class="card-body">
                        <p class="card-text">
                           <reviews></reviews>
                        </p>
                    </div>
                </div>    
            </div>
        </div>    

        @guest
            <div class="row" style="margin: 60px 0 0 0;">
                <div class="col-md-6 offset-md-3">
                    <a href="/register" class="btn btn-primary btn-lg btn-block">Register and get Free Exam</a> 
                </div>
            </div> 
        @endguest          

    </div>
@endsection