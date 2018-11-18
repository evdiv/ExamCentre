@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Here will be</h1>
                        <li>Personal information: photo, name, email, balance, subscription type,
                            links to update personal information and statistic about available and completed tests</li>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection