@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">

                        <h1>Here will be:</h1>
                        <ul>
                            <li>Header Image</li>
                            <li>Service Description</li>
                            <li>Animated intro</li>
                            <li>List of advantages</li>
                            <li>List of Subscription Plans <br/>
                                (one plan can be free, so the user can use our testing method)</li>
                            <li>Button to ask a question with modal form</li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-3">
                <div class="alert alert-success" role="alert">
                    <h3>Advantage 1</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-success" role="alert">
                    <h3>Advantage 2</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-success" role="alert">
                    <h3>Advantage 3</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                </div>
            </div>
            <div class="col-md-3">
                <div class="alert alert-success" role="alert">
                    <h3>Advantage 4</h3>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

                <a href="/subscriptions/1" class="btn btn-info btn-lg btn-block">Subscription Plan 1</a>
            </div>

            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

                <a href="/subscriptions/2" class="btn btn-info btn-lg btn-block">Subscription Plan 2</a>
            </div>

            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

                <a href="/subscriptions/3" class="btn btn-info btn-lg btn-block">Subscription Plan 3</a>
            </div>
        </div>





    </div>
@endsection