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
	<div class="panel-heading"><b>Place Icon Image  </b></div>
		  
		  <div class="panel-body">

		  	<!-- icon imgs -->
		  	<div id="iconImg">
		  	<img src="/images/iconImgs/{{ $place_toEdit->iconImg }}" style="width: 150px; height: 150px;float:left; border-radius: 50%;"><br>
		  	
		  	<form  enctype="multipart/form-data" action="/places/updateicon" method="POST" files="true"  >
 
			  	 <div class="form-group">
				    <label for="iconImg">Update Icon Image</label>
				    <input type="file" name="iconImg" id="iconImg" >				   
				  </div>

			  	<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			  	<input type="hidden" name="id" value="{{ $place_toEdit->id }}">

			    <button type="submit" class="btn btn-default">Submit</button>
		  	</form>

		  	</div><!-- end of icon imgs -->
	


				

		       
		  </div><!-- end of panel body  -->
		  
</div><!-- end of panel  -->
<!-- {{$place_toEdit->subcategories}} -->
<!-- {{$place_toEdit['subcategories']}} -->

@endif <!-- end palce to edit if  -->

 

@endsection