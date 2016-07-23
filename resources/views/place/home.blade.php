<!-- Places Home -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10   ">
                <ul class="nav nav-tabs">
                  <li role="presentation"><a href="{{ url('/places/view') }}">View Places  </a></li>
                  <li role="presentation" class=""><a href="{{ url('/places/new') }}">New Place </a></li>
                  <!-- <li role="presentation"><a href="{{ url('/places') }}">Service Tags </a></li> -->
                </ul><br>
                
@yield('place_content')

        </div>
    </div>
</div>
@endsection
