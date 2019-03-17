@if($errors->count()>0)
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="alert alert-danger">
                <h5>Error: </h5>
                <ul class="errors">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>    
    </div>
@endif

@if (Session::has('success'))
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="alert alert-success">
                <p><b>Success:</b> {{ Session::get('success') }}</p>
            </div>
        </div>
    </div>        
@endif