@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.errors')

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Personal Details
                        <a href="/account">
                            <span class="badge badge-pill badge-info"><i class="fas fa-wrench"></i> Edit</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <i class="fas fa-user text-black-50"></i> {{ $user->name }} / {{ $user->occupation->name }}<br/>

                        <i class="fas fa-envelope text-black-50"></i> Email: {{ $user->email }}<br/>
                        <i class="fas fa-map-marker-alt text-black-50"></i> Country: {{ $user->country }}<br/><br/>

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
                <div class="card">
                    <div class="card-header">Your Lessons</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table table-sm">

                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Exam</th>
                                        <th scope="col">Added</th>
                                        <th scope="col">Completed</th>
                                        <th scope="col">IELTS Mark</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if($lessons['active']->count() > 0)
                                        <tr class="table-light">
                                            <td></td>
                                            <td><h6 style="margin-top: 20px;">Active Lessons</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif

                                    @foreach($lessons['active'] as $lesson)
                                        <tr>
                                            <td></td>
                                            <td><a href="/lessons/{{ $lesson->id }}" class="btn btn-info btn-sm">
                                                {{ $lesson->exam->title }}</a></td>
                                            <td><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                            <td>...</td>
                                            <td>...</td>
                                            <td><a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-info btn-sm"
                                                data-toggle="tooltip" data-placement="top" title="Take a Speaking Exam">
                                                <i class="far fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach

                                
                                    @if($lessons['completed']->count() > 0 
                                        || $lessons['onEvaluation']->count() > 0
                                        || $lessons['evaluated']->count() > 0)

                                        <tr class="table-light">
                                            <td></td>
                                            <td><h6 style="margin-top: 20px;">Completed Lessons</h6></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif


                                    @foreach($lessons['completed'] as $lesson)

                                        <tr>
                                            <td></td>
                                            <td><a href="/lessons/{{ $lesson->id }}" class="btn btn-info btn-sm">
                                                {{ $lesson->exam->title }}</a></td>
                                            <td><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                            <td><small>{{ $lesson->updated_at->diffForHumans() }}</small></td>
                                            <td>...</td>
                                            <td>

                                                <a href="#" 
                                                    class="btn btn-info btn-sm" 
                                                    data-toggle="modal" data-target="#retakeConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Retake the exam">
                                                    <i class="fas fa-sync"></i>
                                                </a>

                                                <a href="#" 
                                                    class="btn btn-info btn-sm" 
                                                    data-toggle="modal" data-target="#evaluateConfirmationModal-{{ $lesson->id }}"
                                                    data-toggle="tooltip" data-placement="top" title="Send for evaluation">
                                                    <i class="far fa-share-square"></i>
                                                </a>



                                                <!-- Modal -->
                                                <div class="modal fade" id="retakeConfirmationModal-{{ $lesson->id }}" tabindex="-1" role="dialog" 
                                                    aria-labelledby="retakeConfirmationModal-{{ $lesson->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Retake this Exam?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Do you really want to retake the Exam?<br/>
                                                                If you click retake your last recording will be deleted.
                                                            </div>
                                                            <div class="modal-footer">

                                                                <form method="POST" action="/lessons/{{ $lesson->id }}" style="display: inline-block;">
                                                                    @csrf
                                                                    {{ method_field('PATCH') }}
                                                                    <input type="hidden" name="completed" value="0" >
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">
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
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Send for evaluation?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Your speaking will be evaluated our teachers who takes real IELTS exam.<br/>
                                                                After evaluation you will receive the report with and the mark that you will probably receieve on the real IELTS Exam.
                                                            </div>
                                                            <div class="modal-footer">

                                                                <form method="POST" action="/evaluations" style="display: inline-block;">
                                                                    @csrf
                                                                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}" >
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                            <i class="far fa-share-square"></i> &nbsp;Send for evaluation
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ Modal -->

                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach($lessons['onEvaluation'] as $lesson)
                                        <tr>
                                            <td></td>
                                            <td><a href="/lessons/{{ $lesson->id }}" class="btn btn-info btn-sm">
                                                {{ $lesson->exam->title }}</a></td>
                                            <td><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                            <td><small>{{ $lesson->updated_at->diffForHumans() }}</small></td>
                                            <td>...</td>
                                            <td><small>on evaluation...</small></td>
                                        </tr>
                                    @endforeach

                                    @foreach($lessons['evaluated'] as $lesson)
                                        <tr>
                                            <td></td>
                                            <td><a href="/lessons/{{ $lesson->id }}" class="btn btn-info btn-sm">
                                                {{ $lesson->exam->title }}</a></td>
                                            <td><small>{{ $lesson->created_at->diffForHumans() }}</small></td>
                                            <td><small>{{ $lesson->updated_at->diffForHumans() }}</small></td>
                                            <td><span class="badge badge-pill badge-danger">{{ $lesson->evaluation->mark }}</span></td>
                                            <td><a href="/lessons/{{ $lesson->id }}" 
                                                class="btn btn-info btn-sm"
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