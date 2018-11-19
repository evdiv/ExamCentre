@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>{{ $lesson->exam->title }}</h4></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            {{ $lesson->exam->description }}<br/>
                            Video: {{ $lesson->exam->src }}
                        </p>
                        <small>{{ $lesson->created_at }}</small>

                        @if($lesson->completed && !$lesson->evaluation)

                            <div class="alert alert-info">
                                You have already completed this lesson.
                                Now you can send its results for evaluation or take the lasson one more time.
                            </div>

                            <div class="text-right">
                                <a href="#" type="button" class="btn btn-light btn-sm">Take this lesson again</a>
                                <a href="#" type="button" class="btn btn-info btn-sm">Send for Evaluation</a>
                            </div>

                        @elseif($lesson->evaluation && !$lesson->evaluation->completed)
                            <div class="alert alert-info">
                                We have received your script. It is being evaluated by our teachers at the moment.
                                It takes us approximately 24 hours to evaluate your response.
                                Thank you.
                            </div>

                        @elseif($lesson->evaluation && $lesson->evaluation->completed)
                            <div class="alert alert-success">
                               Evaluation has been completed. You can download your report
                            </div>

                            <div class="text-right">
                                <a href="#" type="button" class="btn btn-light btn-sm">Download Report</a>
                            </div>

                        @else
                            <div class="text-right">
                                <a href="#" type="button" class="btn btn-info btn-sm">Complete</a>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection