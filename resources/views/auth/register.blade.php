@extends('layouts.app')

@section('title', config('app.name') . '. Register and get Free IELTS Speaking Exam')

@section('content')
<div class="container content">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">
            <div class="card text-white bg-info shadow">
                <div class="card-header">
                    @if(empty($subscription))
                        <h2>Register and get Free Exam</h2>
                    @else
                        <h2>Register and purchase {{ $subscription->title }}</h2>
                        
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf

                        @if(!empty($subscription))
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                        @endif
    
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Your Name</label>

                            <div class="col-md-8">
                            	<input type="text" class="form-control-hp" name="userName" value="">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" 
                                    placeholder="Enter your name" 
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-8">
                            	<input type="text" class="form-control-hp" name="website" value="">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    name="email" 
                                    placeholder="Enter your email" 
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                       <!-- <div class="form-group row">
                            <label for="occupation_id" class="col-md-4 col-form-label text-md-right">Your Occupation</label>

                            <div class="col-md-8">
                                <select name="occupation_id" class="form-control">
                                    @foreach($occupations as $occupation)
                                        <option value="{{$occupation->id}}">{{ $occupation->name }}</option>>
                                    @endforeach    

                                </select>
                            </div>    
                        </div>


                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Your Country</label>

                            <div class="col-md-8">
                                <input type="text" class="form-control" 
                                    name="country" 
                                    placeholder="Enter your country" 
                                    value="{{ old('country') }}">
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                    placeholder="Your password" 
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" 
                                    placeholder="Repeat your password" 
                                    class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-block btn-lg btn-light">
                                @if(empty($subscription))
                                    Register
                                @else
                                    Register and Purchase
                                @endif
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
