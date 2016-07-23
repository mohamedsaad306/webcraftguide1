@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10   ">
                <ul class="nav nav-tabs">
                  <li role="presentation" class=""><a href="{{ url('/appconfig/area') }}">Areas</a></li>
                  <li role="presentation"><a href="#">Categories & Sub-Categoriess</a></li>
                  <li role="presentation"><a href="#"></a></li>
                </ul><br>
                
@yield('config_content')

        </div>
    </div>
</div>
@endsection
