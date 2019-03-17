@extends('layouts.app')

@section('content')

    <div class="container content">

        @include('layouts.errors')

        <div class="row justify-content-center">

            <div class="col-sm-8">
            <div class="card text-white bg-info shadow">
                <div class="card-header">
                    <h2><i class="fas fa-question"></i> Help</h2>
                    Have a question? Have a success story you'd like to share?<br/>
                We'd like to hear from you! Fill out the form below and let us know how we can help.
                </div>

                <div class="card-body">
                    <form method="POST" action="/help">
                        @csrf
    
                        @guest
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Your Name</label>

                                <div class="col-md-9">
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
                                <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-9">
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

                        @endguest

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Your Message</label>

                            <div class="col-md-9">

                                <textarea rows="10" cols="50" class="form-control" 
                                    name="message" 
                                    placeholder="Enter your message" required></textarea>

                            </div>
                        </div>


                        <div class="col-md-6 offset-md-3" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-block btn-lg btn-light">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>

    </div>
@endsection