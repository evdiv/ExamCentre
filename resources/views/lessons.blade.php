@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Lessons</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Here will be</h1>
                        <p>List of available, completed and evaluated lessons</p>
                        <ul>
                            @foreach($lessons as $lesson)
                            <li>
                                <a href="/lesson/{{ $lesson->id }}">{{ $lesson->exam->title }}, <small>{{ $lesson->created_at }}</small></a>
                            </li>
                            @endforeach
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection