@extends('appconfig')

@section('config_content')
             <div id="area_table" >
             <table class="table table-condensed table-striped ">
              <thead>
              <tr>
                <th>#</th>
                <th>Area Name</th>
                <th>Places Count</th>
              </tr>
              </thead>
              <tbody>
@foreach ($areas as $area)
                <tr>
                  <td>{{$area['id']}}</td>
                  <td>{{$area['area_name']}}</td>
                  <td>{{$area['created_at']}}</td>

              </tr>
@endforeach
              </tbody>
            </table><hr>
           </div> <!-- end of area table div   -->    

            <H3>Add new Area </H3> 

            {{Form::open(array('url'=>'/appconfig/area',
                                'method'=>'post',
                                'class'=>'form-inline'))}}

            {{Form::label('area_name','New area name: ')}}
            
            {{Form::text('area_name',null, ['class'=>'form-control'])}}
            
            {!!Form::submit('submit',array('class'=>'btn btn-default'))!!}
            {{Form::close()}}
              <hr>
            {{ $areas }} 



@endsection
   
