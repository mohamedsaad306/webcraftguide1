@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10   ">
                <ul class="nav nav-tabs">
                  <li role="presentation" class=""><a href="{{ url('/appconfig/area') }}">Areas</a></li>
                  <li role="presentation"><a href="{{ url('/appconfig/categories') }}">Categories & Sub-Categories</a></li>
                  <li role="presentation"><a href="{{ url('/appconfig/tags') }}">Service Tags </a></li>
                </ul><br>
                
@yield('config_content')

        </div>
    </div>
</div>
@endsection
