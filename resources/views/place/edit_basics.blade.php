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
		{{Form::open(array('url'=>'/places/updatebasic ','method'=>'post','class'=>'form-horizontal'))}}

				<!-- place id -->
				{{ Form::hidden('invisible',$place_toEdit->id,['name'=>'id']) }}
				
				<!-- place Name -->

				<div class="form-group ">
		            <div class="col-md-6">
		            {{Form::label('place_name','Place name',['class'=>'control-label '])}}
		            {{Form::text('place_name',$place_toEdit->place_name, ['class'=>'form-control','required'=>'true'])}}
		            </div>
				</div>

				<!-- place Description -->

		        <div class="form-group ">
		        	<div class="col-md-6">
		        	{!! Form::label('description','Description', ['class'=>'form-label']) !!}
		        	{!! Form::textarea('description', $place_toEdit->description, ['class'=>'form-control ','rows'=>'2']) !!}
		        	</div>
		        </div>

				<!-- place Address -->

		        <div class="form-group ">
		        	<div class="col-md-6">
		        	{!! Form::label('address','Address', ['class'=>'form-label']) !!}
		        	{!! Form::text('address', $place_toEdit->address, ['class'=>'form-control' ,'required'=>'true']) !!}
		        	</div>
		        </div>

				<!-- place Telephone Number  -->
		            
		        <div class="form-group ">
		        	<div class="col-md-4">
		        	{!! Form::label('tel_number','Telephone #', ['class'=>'form-label']) !!}
		        	{!! Form::text('tel_number', $place_toEdit->tel_number, ['class'=>'form-control ']) !!}
		        	</div>
		        </div>
				
				<!-- place Area -->

		        <div class="form-group">
		        	<div class="col-md-4">
		        		{!! Form::label('area_id','Area ', ['class'=>'form-label']) !!}
		        		{!! Form::select('area_id',$areas	,$place_toEdit->area_id, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

				<!-- place Category -->

		        <div class="form-group ">
		        	<div class="col-md-4">
		        		{!! Form::label('category_id','Select Place Category  ', ['class'=>'form-label']) !!}
		        		{!! Form::select('category_id',$categories,$place_toEdit->category_id, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

		        
		        <!-- subcategory div  -->
		        
		        		{!! Form::label('subcategories','Select Place Category  ', ['class'=>'form-label']) !!}
		        <div class="form-group" >
		        	<div class="col-md-8" id="subcategories" >

					@foreach ($subcategories as $subcat)
							@if ($subcat['category_id']==$place_toEdit->category_id)
							<!-- {{ $subcat }} -->
							<label class="checkbox-inline">
  							<input name="subcategories[]" type="checkbox"  value="{{$subcat['id']}}"
  							 {{($place_toEdit->subcategories->contains($subcat['id']))?'checked=""':"" }}  >
  								{{$subcat['subcategory_name']}} 
							</label>
							@endif
							@endforeach		
		        	<!-- jQuery Script will generate chek boxes representing sub categories here  -->
		        	<!-- in case thsi was changed to new values   -->
		        
		        	</div>
		        </div> <!-- end of subcategories-div -->
				

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

@endif <!-- end palce to edit if  -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
			$('#category_id').on("change ",function(){
			  if (!$('#category_id').val()) {
			      alert('please select valid category ');
			  }else{

			      $.get("/appconfig/subcategories/"+$('#category_id').val(),function(data){

			      $('#subcategories').empty();
			      // if (data.count==0) {
			      // alert('sorry this category dosn\'t have sub categories ');
			      //   $('#subcategories').empty();
			      // };

			      $.each(data, function(value,key) {
			      //creating the chechk boxes from server data retrived  
			      $('#subcategories').append( $("<input></input>")
			      	.attr({"name":"subcategories[]","value": value,"type":"checkbox","id":"sub"+value, "checked":false }).text(key));
			      //creating LABELS FOR the chechk boxes  
			      $('#subcategories').append( $("<label>").attr({"for":"sub"+value}).text(key));     
			        });   
			  });
			  }
			});//end of my filling script
			//.triggerHandler('change')

			// var subcats={{$place_toEdit['subcategories']}};
			$('category_id').on("change",function () {
					
			 
			 	
			});// 

		});//end of ready doc   
</script>


@endsection