@extends('place.home')
@section('place_content')

<!-- display main categories on left  -->
<div class="col-md-3">
<!-- Main Categories List  -->

<div class="list-group">
  <a href="#" class="list-group-item active">default view all categories  </a>
  <a href="#" class="list-group-item">to view by category </a>
  <a href="#" class="list-group-item">to view by category </a>
  <a href="#" class="list-group-item">to view by category </a>
  <a href="#" class="list-group-item">to view by category </a>

</div>
</div>	<!-- end of main Catageories div  -->

<div class="panel panel-default col-md-offset-3">
  <div class="panel-body">
    		
    		<!-- search for place  -->
    		
            {{Form::open(array('url'=>'/_ROUTE__','method'=>'post','class'=>'form-inline'))}}
            <h4>Search for a place by name</h4>
            <!-- {{Form::label('palce_name','Search for a place by name')}} -->
            {{Form::text('place_name',null, ['class'=>'form-control','style'=>'width:80%;'])}}
            {!!Form::submit('saerch',array('class'=>'btn btn-default','style'=>'width:15%;'))!!}
            {{Form::close()}}
            <hr>
            <!-- display Places  -->

            <div id="placesTable">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
            				
            				<th style="width:80%">Name</th>
            				
            				<th>options</th>
            			</tr>
            		</thead>
            		
            		<tbody>
                        @if (count($places)>0)
                        @foreach ($places as $place)
                        
                        <tr>
                            <td>{{$place->place_name}}</td>
                            <td><a href="edit/{{$place['id']}}" class="btn btn-warning" >edit</a></td>
                        </tr>
                        @endforeach
                        @endif


            		</tbody>
            	</table>
                <!-- Pagnition -->
                @if ($places->lastPage() > 1)
                <center>
                    <ul class="pagination">
                        <li class="{{ ($places->currentPage() == 1) ? ' disabled' : '' }}">
                            <a href="{{ $places->url(1) }}"><</a>
                        </li>
                        @for ($i = 1; $i <= $places->lastPage(); $i++)
                            <li class="{{ ($places->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $places->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ ($places->currentPage() == $places->lastPage()) ? ' disabled' : '' }}">
                            <a href="{{ $places->url($places->currentPage()+1) }}" >></a>
                        </li>
                    </ul>
                </center>
                @endif
                <!-- end pagnition  -->
                <br> 
            </div>	<!-- endof places table div  -->
  </div> <!-- end of the panel Body   -->
</div> <!-- end of the panel  -->
{{print_r($places)}}

@endsection