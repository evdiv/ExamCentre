@extends('layouts.app')

@section('content')

    <div class="container" >
        <a href="/lessons" class="navbar-menu navbar-menu btn btn-sm btn-top"><i class="fas fa-arrow-circle-left fa-lg"></i> 
            @if($lesson->completed)
                Back to Home
            @else
                Cancel Exam and Back to Home
            @endif
        </a>
    </div>

    <div class="container content">

        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>        

        <div class="row justify-content-center">

            @if($lesson->completed && !$lesson->evaluation)
            
                <div class="col-sm-8">
                    <div class="card text-white bg-info shadow">
                        <div class="card-header">
                            <h2>Exam has been completed</h2>
                        </div>

                        <div class="card-body">
                            <div class="alert alert-success">
                                You have already completed this lesson.<br/>
                                You can either send your recordings for evaluation or take the exam again.
                            </div>
                        </div>
                    </div>

                    <div class="alert text-right">
                        <a href="#" class="btn btn-danger" 
                            data-toggle="modal" data-target="#retakeConfirmationModal"
                            data-toggle="tooltip" data-placement="top" title="Retake the exam">
                            <i class="fas fa-sync"></i> Take the Exam Again
                        </a>

                        <a href="/lessons" class="btn btn-info" 
                            data-toggle="tooltip" data-placement="top" title="Return to lessons">Return to Exams
                        </a>


                        <a href="#" class="btn btn-success" 
                            data-toggle="modal" data-target="#evaluateConfirmationModal"
                            data-toggle="tooltip" data-placement="top" title="Send for evaluation">
                            <i class="far fa-share-square"></i> Send for evaluation
                        </a>
                    </div>
                </div>    
    
            @elseif($lesson->evaluation && !$lesson->evaluation->mark)

                <div class="col-sm-8">
                    <div class="card text-white bg-info shadow">
                        <div class="card-header">
                            <h2>Exam is on evaluation</h2>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success">
                                We have received your recording. It is being evaluated by our teachers at the moment.<br/>
                                Evaluation takes us approximately 24 hours.
                                Thank you.
                            </div>
                        </div>
                    </div>

                    <div class="alert text-right">
                        <a href="/lessons" class="btn btn-info" 
                            data-toggle="tooltip" data-placement="top" title="Return to lessons">Return to Exams
                        </a>
                    </div>
                </div>    

            @elseif($lesson->evaluation && $lesson->evaluation->mark)

                <div class="col-sm-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5>Evaluation has been completed</h5>
                        </div>

                        <div class="card-body">
                            <div class="alert alert-success">
                                Evaluation has been completed. You can download your report
                            </div>
                        </div>
                    </div>                        

                    <div class="alert text-right">
                        <a href="/reports/{{ auth()->user()->id }}/{{ $lesson->evaluation->report_src}}" class="btn btn-success"><i class="fas fa-download"></i> &nbsp;Download Report</a>
                    </div>
                </div>    

            @else

                <div class="col-sm-12">
                    <div class="card shadow">
                        <div class="card-body" style="padding: 0.2em;">
                            <div class="player">
                                <recorder id="{{ $lesson->id }}" 
                                    src="/exams/{{ $lesson->exam->src }}" 
                                    intervals-str="{{ $lesson->exam->intervals }}"
                                    second-part-start="{{ $lesson->exam->secondPartStart }}"
                                    length="{{ $lesson->exam->length }}"></recorder>
                            </div>
                        </div>    
                    </div>                         
                </div>    

            @endif

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="retakeConfirmationModal" tabindex="-1" role="dialog" 
        aria-labelledby="retakeConfirmationModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Retake this Exam?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <img src="/images/danger-notification.jpg" class="float-right" alt="...">
                    Do you want to retake the Exam?<br/>
                    If you click 'retake' your records will be deleted.
                </div>
                <div class="modal-footer">

                    <form method="POST" action="/lessons/{{ $lesson->id }}" style="display: inline-block;">
                        @csrf
                        {{ method_field('PATCH') }}
                        <input type="hidden" name="completed" value="0" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">
                                <i class="fas fa-sync"></i> &nbsp;Retake the exam
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--/ Modal -->


    <!-- Modal -->
    <div class="modal fade" id="evaluateConfirmationModal" tabindex="-1" role="dialog" 
        aria-labelledby="evaluateConfirmationModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if($lesson->exam->id > 1)
                        <h5 class="modal-title">Send for evaluation?</h5>
                    @else 
                        <h5 class="modal-title">Sending for evaluation is not available for Demo Exams</h5>
                    @endif

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @if($lesson->exam->id > 1)
                        <img src="/images/notification.jpg" class="float-right" alt="...">
                        Your speaking will be evaluated by our teachers who takes the real IELTS exams.<br/>
                        After evaluation you receive the report with the estimate IELTS mark for your speaking.
                    @else 
                        <img src="/images/danger-notification.jpg" class="float-right" alt="...">
                       Demo Exams are not available for evaluation proccess. <br/>
                       This option is available only for Regular Exams that can be purchased <a href='/subscriptions'>here</a>.<br/>
                        Thank you for using our service.
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    @if($lesson->exam->id > 1)
                        <a href="/evaluate/{{ $lesson->id }}" class="btn btn-success">
                            <i class="far fa-share-square"></i> &nbsp;Send for evaluation
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--/ Modal -->

@endsection