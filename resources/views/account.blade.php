@extends('layouts.app')

@section('content')
    <div class="container">

        @include('layouts.errors')

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Personal Details</div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/250.png" class="rounded" alt="..."><br/>

                        {{ Auth::user()->name }}<br/>
                        {{ Auth::user()->city }}, {{ Auth::user()->country }}<br/>
                        Email: {{ Auth::user()->email }}<br/><br/>

                        <small>
                            @if (Auth::user()->updated_at)
                                Updated {{ Auth::user()->updated_at }}
                            @else
                                Created {{ Auth::user()->created_at }}
                            @endif
                        </small>

                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update your details</div>

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
                                           name="name" value="{{ Auth::user()->name }}" required autofocus>

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
                                           name="email" value="{{ Auth::user()->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="country" value="{{ Auth::user()->country }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
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


                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-block btn-lg btn-primary" value="Update">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection