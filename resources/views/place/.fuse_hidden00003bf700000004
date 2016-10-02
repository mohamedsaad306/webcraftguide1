@extends('place.home')
@section('place_content')


<ol class="breadcrumb">
  <li><a href="{{url('places/edit/'.$place_toEdit->id.'/basic')}}">Basic Data </a></li>
  <li><a href="{{url('places/edit/'.$place_toEdit->id.'/images')}}">Images</a></li>
  <li><a href="{{url('places/edit/'.$place_toEdit->id.'/options')}}">Options </a></li>
</ol>
{{$editType}}
@if ($place_toEdit)   <!-- place to edit if  -->


<div class="panel panel-default">
	<div class="panel-heading"><b>Edit Place </b></div>
		  <div class="panel-body">
		{{Form::open(array('url'=>'/places/updateoptions ','method'=>'POST','class'=>'form-horizontal'))}}

				<!-- place id -->
				{{ Form::hidden('invisible',$place_toEdit->id,['name'=>'id']) }}
				
				<!-- working days  -->

				<div class="form-group form-inline ">
		            <div class="col-md-6">
		            <label>Working Days </label>
		            <BR>
		           @foreach ($workingDays as $wd)
		           	
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="{{$wd['id']}}" 
		            {{($place_toEdit->workingDays->contains($wd['id']))?'checked=""':""}}>
		            {{ucfirst( $wd['day'] )}} </label>
		           @endforeach
<!-- 
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="2">Sun </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="3">Mon </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="4">Tue </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="5">Wed </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="6">Thu </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="7">Fri </label> -->
		            <br><br>
		            
		            <!-- from  -->
		             <label for="from">From</label>
					<div class="input-group clockpicker col-md-3">
					    <input type="text" class="form-control" name="work_from">
					    <span class="input-group-addon">
					        <span class="glyphicon glyphicon-time"></span>
					    </span>
					</div>
					&nbsp;
					&nbsp;
		            <!-- To   -->
		             <label for="from">TO </label>
					<div class="input-group clockpicker col-md-3">
					    <input type="text" class="form-control" name="work_to">
					    <span class="input-group-addon">
					        <span class="glyphicon glyphicon-time"></span>
					    </span>
					</div>
					&nbsp;
					&nbsp;
			            <label class="checkbox-inline">
			            <input name="open247" type="checkbox" value="true" >&nbsp;24/7 
			            </label>
		            
		           </div>
				</div>
				<!-- end of working days  -->

				<hr>
				<!-- Has Delivery system  -->

		        <div class="form-group form-inline">
		        	<div class="col-md-6 ">
			        	<label>Delivery  </label>
			        	<br>
			            <label class="checkbox-inline">
			            <input name="delivery" type="checkbox" value="true" >Delivry Avilable
			            </label>
			        	<br>
			            <br>

		            <!-- from  -->
		             <label for="from">From</label>
					<div class="input-group clockpicker col-md-3">
					    <input type="text" class="form-control" name="delivery_from">
					    <span class="input-group-addon">
					        <span class="glyphicon glyphicon-time"></span>
					    </span>
					</div>
					&nbsp;
					&nbsp;
		            <!-- To   -->
		             <label for="from">TO </label>
					<div class="input-group clockpicker col-md-3">
					    <input type="text" class="form-control" name="delivery_to">
					    <span class="input-group-addon">
					        <span class="glyphicon glyphicon-time"></span>
					    </span>
					</div>

		        	</div>
		        </div>

				<!-- place service Tags  -->
<hr>
		        <div class="form-group ">
		        	<div class="col-md-6">
		        
			        	<label>Service tags   </label>
			        	<br>
		        		<select class="js-example-tokenizer col-md-8" name="serviceTags[]" multiple="multiple">
						@foreach ($avilableServicetags as $tag=>$value )
 
				 
						    <option value="{{$value}}"  >{{$tag}}</option>    

						@endforeach
						  <!-- <option value="AL" selected >Alabama</option>     -->
						  <!-- 	  <option value="WY">Wyoming</option> -->
						</select>

		        	</div>

		        </div>
<hr>
				<!-- Place Location for google maps  -->
				Place location on google maps <br>
				<div class="form-group ">
		            <div class="col-md-8">
		            <div class="col-md-3">
   					  <label for="lat">latitude</label>
  					  <input type="text" class="form-control" id="lat" name="latitude">
     				  </div>
		            <div class="col-md-3">
     				  <label for="long">longitude</label>
  					  <input type="text" class="form-control" id="long" name="longitude">
		            </div>
				&nbsp;&nbsp;&nbsp;
		            <label class= "label label-warning"   onclick="getLocation()" id="location_lable">  
		            	<span class="glyphicon glyphicon-info-sign" aria-hidden="true" ></span>
		            	&nbsp;Get Current Location
		            </label>
		            </div>
				</div>

<hr>
				<!-- facebook link  -->

				<div class="form-group ">
		            <div class="col-md-6">
		            {{Form::label('facebook_link','facebook link',['class'=>'control-label '])}}
		            {{Form::text('facebook_link',$place_toEdit->facebook_link, ['class'=>'form-control'])}}
		            </div>
				</div>

				

		        <!-- Submit Button  -->
		        <div class="form-group">
		        	<div class="col-sm-offset-1" >
		            {!!Form::submit('Save',array('class'=>'btn btn-default  btn-lg','style'=>'width: 40%;'))!!}
		            {{Form::close()}}
		        	</div>
		        </div>
    			
		  </div><!-- end of panel body  -->
		  
</div><!-- end of panel  -->
<!-- {{$place_toEdit->subcategories}} -->
<!-- {{$place_toEdit['subcategories']}} -->
{{ $place_toEdit}}
<hr>
{{ $workingDays }}
<hr>
{{ $areas }}
<hr>
{{ $categories }}
<hr>
{{ $subcategories }}
<hr>
{{  $avilableServicetags }}
{{  print_r($avilableServicetags) }}

@endif <!-- end palce to edit if  -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 

<!-- /* Tagging Script  */ -->
<script type="text/javascript">
	$(".js-example-tokenizer").select2({
		  tags: true,
		  tokenSeparators: [',', ' ']
		});

</script>
<!-- html comment -->

<!-- timming  script -->

<script type="text/javascript" src="{{ asset('/timepicker assets/src/clockpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/timepicker assets/dist/jquery-clockpicker.min.js') }}"></script>

<!-- timming  Style -->

<link rel="stylesheet" type="text/css" href="{{ asset('/timepicker assets/dist/jquery-clockpicker.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/timepicker assets/src/clockpicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/timepicker assets/src/standalone.css') }}">
<script type="text/javascript">$('.clockpicker').clockpicker({
    
    align: 'left',
    donetext: 'Done'
});</script>
 <!-- location script -->
 <script>
			var x = document.getElementById("demo");
			var lat = document.getElementById("lat");
			var lon = document.getElementById("long");
			function getLocation() {
			    if (navigator.geolocation) {
			        navigator.geolocation.getCurrentPosition(showPosition);

			    } else { 
			        x.innerHTML = "Geolocation is not supported by this browser.";
			    }
			}

			function showPosition(position) {
			    // x.innerHTML = "Latitude: " + position.coords.latitude + 
			    // "<br>Longitude: " + position.coords.longitude;
			    lat.value=position.coords.latitude;
			    lon.value=position.coords.longitude;

			}
			</script> 		
@endsection