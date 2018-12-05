<form method="POST">
    @csrf


    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Your Name</label>

        <div class="col-md-8">
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group row">
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
            <input type="text" class="form-control" name="country" value="{{ old('country') }}">
        </div>
    </div>


    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>


    <div class="col-md-6 offset-md-3" style="margin-top: 40px;">
        <button type="submit" class="btn btn-block btn-lg btn-primary">
            @if(auth()->guest())
                Register
            @else
                Subscribe
            @endif
        </button>
    </div>

</form>