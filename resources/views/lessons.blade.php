@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Personal Details (<a href="/account">Edit</a>)</div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/250.png" class="rounded" alt="..."><br/>

                        {{ Auth::user()->name }}<br/>
                        City: {{ Auth::user()->city }}<br/>
                        Email: {{ Auth::user()->email }}<br/><br/>

                        <small>Created {{ Auth::user()->created_at }}</small>

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
                                    <th scope="col">Purchased</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <tr class="table-light">
                                        <td></td>
                                        <td><h6 style="margin-top: 2px;">Active Lessons</h6></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($lessons as $lesson)

                                        @if($lesson->completed)
                                            @continue
                                        @endif

                                        <tr class="table-primary">
                                            <td></td>
                                            <td><a href="/lesson/{{ $lesson->id }}">{{ $lesson->exam->title }}</a></td>
                                            <td>{{ $lesson->created_at }}</td>
                                            <td>
                                                <a href="/lesson/{{ $lesson->id }}" type="button" class="btn btn-light btn-sm">Open</a>
                                            </td>
                                        </tr>
                                    @endforeach



                                    <tr class="table-light">
                                        <td></td>
                                        <td><h6 style="margin-top: 2px;">Completed Lessons</h6></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($lessons as $lesson)

                                        @if(!$lesson->completed || $lesson->evaluation)
                                            @continue
                                        @endif

                                        <tr class="table-success">
                                            <td></td>
                                            <td><a href="/lesson/{{ $lesson->id }}">{{ $lesson->exam->title }}</a></td>
                                            <td>{{ $lesson->created_at }}</td>
                                            <td>
                                                <a href="/lesson/{{ $lesson->id }}" type="button" class="btn btn-light btn-sm">Evaluate</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr class="table-light">
                                        <td></td>
                                        <td><h6 style="margin-top: 2px;">Lessons On Evaluation</h6></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($lessons as $lesson)

                                        @if($lesson->evaluation)
                                            <tr class="table-secondary">
                                                <td></td>
                                                <td><a href="/lesson/{{ $lesson->id }}">{{ $lesson->exam->title }}</a></td>
                                                <td>{{ $lesson->created_at }}</td>
                                                <td>
                                                    @if($lesson->evaluation->completed)
                                                        <a href="/lesson/{{ $lesson->id }}" type="button" class="btn btn-light btn-sm">Results</a>
                                                    @else
                                                        <small>on evaluation...</small>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif


                                    @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection