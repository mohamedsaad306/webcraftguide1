@extends('place.home')
@section('place_content')

<div class="panel panel-info">
	<div class="panel-heading">Create New Place </div>
		  <div class="panel-body">
		{{Form::open(array('url'=>'/__ROUTE__','method'=>'post','class'=>'form-group'))}}
				
				<!-- left side Inputs   -->
				<div class="form-horizontal">
				<div class="col-md-6">
				<!-- place Name -->

				<div class="form-group ">
		            <!-- <div class="col-md-6"> -->
		            {{Form::label('place_name','Place name',['class'=>'control-label '])}}
		            {{Form::text('place_name',null, ['class'=>'form-control','required'=>'true'])}}
		            <!-- </div> -->
				</div>

				<!-- place Description -->

		        <div class="form-group ">
		        	<!-- <div class="col-md-6"> -->
		        	{!! Form::label('place_description','Description', ['class'=>'form-label']) !!}
		        	{!! Form::textarea('place_description', null, ['class'=>'form-control ','rows'=>'2']) !!}
		        	<!-- </div> -->
		        </div>

				<!-- place Address -->

		        <div class="form-group ">
		        	<!-- <div class="col-md-6"> -->
		        	{!! Form::label('place_address','Address', ['class'=>'form-label']) !!}
		        	{!! Form::text('place_address', null, ['class'=>'form-control' ,'required'=>'true']) !!}
		        	<!-- </div> -->
		        </div>

				<!-- place Telephone Number  -->
		            
		        <div class="form-group ">
		        	<div class="col-md-8">
		        	{!! Form::label('tel_number','Telephone #', ['class'=>'form-label']) !!}
		        	{!! Form::text('tel_number', null, ['class'=>'form-control ']) !!}
		        	</div>
		        </div>
				
				<!-- place Area -->

		        <div class="form-group">
		        	<div class="col-md-8">
		        		{!! Form::label('area_id','Area ', ['class'=>'form-label']) !!}
		        		{!! Form::select('area_id',['null'=>'null'],null, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

				</div> <!-- end of left side col-md-6  -->
				</div><!-- end of left side  -->
				
				
				<!-- Right side Inputs   -->
				<div class="form-horizontal">
				<div class="col-md-5 col-md-offset-1">
				

				<!-- place Category -->

		        <div class="form-group ">
		        	<div class="col-md-8">
		        		{!! Form::label('category_id','Select Place Category  ', ['class'=>'form-label']) !!}
		        		{!! Form::select('category_id',['1'=>'cat 1','2'=>'cat2'],null, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

		        
		        <!-- subcategory div  -->
		        
		        		{!! Form::label('subcategories','Select Place Category  ', ['class'=>'form-label']) !!}
		        <div class="form-group" >
		        	<div class="col-md-8" id="subcategories" >

		        	<!-- jQuery Script will generate chek boxes representing sub categories  -->
		        
		        	</div>
		        </div> <!-- end of subcategories-div -->



				</div> <!-- end of Right side col-md-6  -->
				</div><!-- end of right side  -->
				

		        <!-- Submit Button  -->
		        <div class="form-group">
		        	<div class=" col-md-offset-5">
		            {!!Form::submit('submit',array('class'=>'btn btn-default  btn-lg '))!!}
		            {{Form::close()}}
		        	</div>
		        </div>
    			
		  </div><!-- end of panel body  -->
		  
</div><!-- end of panel  -->
@stop	

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
			$('#category_id').change(function(){
			  if (!$('#category_id').val()) {
			      alert('please select valid category ');
			  }else{

			      $.get("/appconfig/subcategories/"+$('#category_id').val(),function(data){

			      $('#subcategories').empty();
			      if (data.count==0) {
			      alert('sorry this category dosn\'t have sub categories ');
			        $('#subcategories').empty();
			      };

			      $.each(data, function(value,key) {
			      //creating the chechk boxes from server data retrived  
			      $('#subcategories').append( $("<input></input>")
			      	.attr({"name":"subcategories[]","value": value,"type":"checkbox","id":"sub"+value}).text(key));

			      //creating LABELS FOR the chechk boxes  
			      $('#subcategories').append( $("<label>")
			      	.attr({"for":"sub"+value}).text(key));
			      
			        });   
			  });
			  }
			});//end of my filling script
		});//end of reay doc   
</script>