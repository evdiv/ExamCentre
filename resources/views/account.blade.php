@extends('layouts.app')

@section('content')

    <div class="container" >
        <a href="/lessons" class="navbar-menu btn btn-top btn-sm"><i class="fas fa-arrow-circle-left fa-lg"></i> Back to Home</a>
    </div>

    <div class="container content">

        @include('layouts.errors')

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-white bg-info shadow">
                    <div class="card-header">
                        <h3>Personal Details</h3>
                    </div>
                    <div class="card-body">
                        <i class="fas fa-user"></i> {{ $user->name }}<br/>

                        <i class="fas fa-envelope"></i> Email: {{ $user->email }}<br/>

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
                        <h3>Update your details</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST">
                            @csrf

                            {{ method_field('PATCH') }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-8">
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>



                                <div class="text-right">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> &nbsp;&nbsp;Update</button>
                                </div>    

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection