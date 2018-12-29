@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
            <!-- <stripe-checkout :subscription="{{ $subscription }}"></stripe-checkout> -->
            <stripe-form :subscription="{{ $subscription }}"></stripe-form>
                
            </div>
        </div>
    </div>
@endsection