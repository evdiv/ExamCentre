@extends('layouts.app')

@section('content')

    <div class="container content">

        @include('layouts.errors')

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-white bg-info shadow d-none d-sm-block">
                    <div class="card-header">
                        <h3>Personal Details &nbsp;<small>
                        <a href="/account">
                            <span class="badge badge-dark"><i class="fas fa-wrench"></i> &nbsp;Edit</span>
                        </a></small></h3>
                    </div>
                    <div class="card-body">
                        <i class="fas fa-user"></i> {{ $user->name }} / {{ $user->occupation->name }}<br/>

                        <i class="fas fa-envelope"></i> {{ $user->email }}<br/>
                        <!--<i class="fas fa-map-marker-alt"></i> {{ $user->country }}-->
                        <br/>

                        <small>
                            @if ( $user->updated_at )
                                Updated {{ $user->updated_at->diffForHumans() }}
                            @else
                                Created {{ $user->created_at->diffForHumans() }}
                            @endif
                        </small>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card text-white bg-info shadow">
                    <div class="card-header">
                        <h3>Your IELTS Exams</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table table-sm">
                                <thead>
                                    <tr class="d-none d-sm-table-row">
                                        <th class="text-center" scope="col"></th>
                                        <th scope="col">Exam</th>
                                        <th scope="col">Added</th>
                                        <th class="text-center" scope="col">Completed</th>
                                        <th class="text-center" scope="col">IELTS Score</th>
                                        <th class="text-center" scope="col" style="min-width: 100px;">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($lessons['active']->count() > 0)
                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td><h6 style="margin-top: 20px;">Active Exams</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr class="d-table-row d-sm-none">
                                            <td>Active Exams</td>
                                            <td style="min-width: 100px;">Actions</td>
                                        </tr>                                        

                                    @endif

                                    @foreach($lessons['active'] as $lesson)
                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $lesson->created_at->diffForHumans() }}</td>
                                            <td class="text-center">...</td>
                                            <td class="text-center">...</td>
                                            <td class="text-center"><a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-success btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Take a Speaking Exam">
                                                <i class="far fa-eye"></i></a></td>
                                        </tr>

                                        <tr class="d-table-row d-sm-none">
                                            <td><small>Added {{ $lesson->created_at->diffForHumans() }}</small>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td>
                                                <br/><br/>
                                                <a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-success btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Take a Speaking Exam"><i class="far fa-eye"></i></a>
                                                <br/>

                                            </td>
                                        </tr>    


                                    @endforeach

                                
                                    @if($lessons['completed']->count() > 0 
                                        || $lessons['onEvaluation']->count() > 0
                                        || $lessons['evaluated']->count() > 0)

                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td><h6 style="margin-top: 20px;">Completed Exams</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr class="d-table-row d-sm-none">
                                            <td>Completed Exams</td>
                                            <td>Actions</td>
                                        </tr>    

                                    @endif


                                    @foreach($lessons['completed'] as $lesson)

                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $lesson->created_at->diffForHumans() }}</td>
                                            <td class="text-center text-light">
                                                <i class="far fa-check-circle fa-lg"></i></td>
                                            <td class="text-center">...</td>
                                            <td class="text-center">

                                                <a href="#" 
                                                    class="btn btn-danger btn-sm" 
                                                    data-toggle="modal" data-target="#retakeConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Retake the exam">
                                                    <i class="fas fa-sync"></i>
                                                </a>

                                                <a href="#" 
                                                    class="btn btn-success btn-sm" 
                                                    data-toggle="modal" data-target="#evaluateConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Send for evaluation">
                                                    <i class="far fa-share-square"></i>
                                                </a>

                                            </td>
                                        </tr>

                                        <tr class="d-table-row d-sm-none">
                                            <td>
                                                <small>Added {{ $lesson->created_at->diffForHumans() }}</small>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td>
                                                <br/><br/>
                                                <a href="#" 
                                                    class="btn btn-danger btn-sm" 
                                                    data-toggle="modal" data-target="#retakeConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Retake the exam">
                                                    <i class="fas fa-sync"></i>
                                                </a>

                                                <a href="#" 
                                                    class="btn btn-success btn-sm" 
                                                    data-toggle="modal" data-target="#evaluateConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Send for evaluation">
                                                    <i class="far fa-share-square"></i>
                                                </a>
                                            </td>
                                        </tr>    

                                        <tr>
                                            <td style="border-top: none;">
                                            <!-- Modal -->
                                            <div class="modal fade" id="retakeConfirmationModal-{{ $lesson->id }}" tabindex="-1" role="dialog" 
                                                aria-labelledby="retakeConfirmationModal-{{ $lesson->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content text-dark">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Retake this Exam?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body text-left">
                                                            <img src="/images/danger-notification.jpg" class="float-right" alt="...">
                                                            Do you really want to retake the Exam?<br/>
                                                            If you click 'retake' your last recording will be deleted.
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form method="POST" action="/lessons/{{ $lesson->id }}">
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
                                            <div class="modal fade" id="evaluateConfirmationModal-{{ $lesson->id }}" tabindex="-1" role="dialog" 
                                                aria-labelledby="evaluateConfirmationModal-{{ $lesson->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content text-dark">
                                                        <div class="modal-header">

                                                            @if($lesson->exam->id > 1)
                                                                <h4 class="modal-title">Send for evaluation?</h4>
                                                            @else 
                                                                <h4 class="modal-title">Sending for evaluation is not available for Demo Exams</h4>
                                                            @endif

                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body text-left">

                                                            @if($lesson->exam->id > 1)
                                                                <img src="/images/notification.jpg" class="float-right" alt="...">
                                                                Your speaking will be evaluated by our teachers.<br/>
                                                                After evaluation you will receive the report with and the mark that you will probably receieve on the real IELTS Exam.<br/><br/><br/>
                                                                <h3>Evaluation cost is {{ env('EVALUATION_COST') }} USD</h3>
                                                            @else 
                                                                <img src="/images/danger-notification.jpg" class="float-right" alt="...">
                                                               Demo Exams are not available for evaluation. <br/>
                                                               This option will be available for any Regular Exam that you can purchase <a href='/subscriptions'>here</a>.<br/>
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
                                        </td>
                                    </tr>
                                    @endforeach

                                    @foreach($lessons['onEvaluation'] as $lesson)
                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $lesson->created_at->diffForHumans() }}</td>
                                            <td class="text-light text-center"><i class="far fa-check-circle fa-lg"></i></td>
                                            <td class="text-center">...</td>
                                            <td class="text-center">
                                                <h5><span class="badge badge-warning"
                                                    data-toggle="tooltip" data-placement="top" title="The Exam is on evaluation at the moment. Usually the evaluation process takes us 24 hours to complete.">on evaluation...</span></h5>
                                            </td>
                                        </tr>


                                        <tr class="d-table-row d-sm-none">
                                            <td>
                                                <small>Added {{ $lesson->created_at->diffForHumans() }}</small>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td>
                                                <br/><br/>
                                                <h5><span class="badge badge-warning"
                                                    data-toggle="tooltip" data-placement="top" title="The Exam is on evaluation at the moment. Usually the evaluation process takes us 24 hours to complete.">on evaluation...</span></h5>
                                            </td>
                                        </tr>    

                                    @endforeach

                                    @foreach($lessons['evaluated'] as $lesson)
                                        <tr class="d-none d-sm-table-row">
                                            <td></td>
                                            <td>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $lesson->created_at->diffForHumans() }}</td>
                                            <td class="text-light text-center"><i class="far fa-check-circle fa-lg"></i></td>
                                            <td class="text-center"><span class="badge badge-pill badge-danger">{{ $lesson->evaluation->mark }}</span></td>
                                            <td class="text-center"><a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-success btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="View the evaluation report">
                                                <i class="far fa-file-alt"></i></a>
                                            </td>
                                        </tr>

                                        <tr class="d-table-row d-sm-none">
                                            <td>
                                                <small>Added {{ $lesson->created_at->diffForHumans() }}</small>
                                                <a href="/lessons/{{ $lesson->id }}">
                                                    <img src="/images/{{ $lesson->exam->preview }}" class="img-thumbnail" alt="{{ $lesson->exam->title }}"><br/>
                                                </a>
                                            </td>
                                            <td>
                                                Score <span class="badge badge-pill badge-danger">{{ $lesson->evaluation->mark }}</span>
                                                <br/><br/>
                                                <a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-success btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="View the evaluation report">
                                                <i class="far fa-file-alt"></i></a>
                                            </td>
                                        </tr>    

                                    @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection