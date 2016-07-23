@extends('place.home')
@section('place_content')

<div class="panel panel-default">
	<div class="panel-heading"><b>Create New Place </b></div>
		  <div class="panel-body">
		{{Form::open(array('url'=>'/place/new/create','method'=>'post','class'=>'form-horizontal'))}}
				
				<!-- place Name -->

				<div class="form-group ">
		            <div class="col-md-6">
		            {{Form::label('place_name','Place name',['class'=>'control-label '])}}
		            {{Form::text('place_name',null, ['class'=>'form-control','required'=>'true'])}}
		            </div>
				</div>

				<!-- place Description -->

		        <div class="form-group ">
		        	<div class="col-md-6">
		        	{!! Form::label('description','Description', ['class'=>'form-label']) !!}
		        	{!! Form::textarea('description', null, ['class'=>'form-control ','rows'=>'2']) !!}
		        	</div>
		        </div>

				<!-- place Address -->

		        <div class="form-group ">
		        	<div class="col-md-6">
		        	{!! Form::label('address','Address', ['class'=>'form-label']) !!}
		        	{!! Form::text('address', null, ['class'=>'form-control' ,'required'=>'true']) !!}
		        	</div>
		        </div>

				<!-- place Telephone Number  -->
		            
		        <div class="form-group ">
		        	<div class="col-md-4">
		        	{!! Form::label('tel_number','Telephone #', ['class'=>'form-label']) !!}
		        	{!! Form::text('tel_number', null, ['class'=>'form-control ']) !!}
		        	</div>
		        </div>
				
				<!-- place Area -->

		        <div class="form-group">
		        	<div class="col-md-4">
		        		{!! Form::label('area_id','Area ', ['class'=>'form-label']) !!}
		        		{!! Form::select('area_id',$areas	,null, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

				<!-- place Category -->

		        <div class="form-group ">
		        	<div class="col-md-4">
		        		{!! Form::label('category_id','Select Place Category  ', ['class'=>'form-label']) !!}
		        		{!! Form::select('category_id',$categories,null, ['class'=>'form-control']) !!}
		        	</div>
		        </div>

		        
		        <!-- subcategory div  -->
		        
		        		{!! Form::label('subcategories','Select Place Category  ', ['class'=>'form-label']) !!}
		        <div class="form-group" >
		        	<div class="col-md-8" id="subcategories" >

		        	<!-- jQuery Script will generate chek boxes representing sub categories here  -->
		        
		        	</div>
		        </div> <!-- end of subcategories-div -->
				

		        <!-- Submit Button  -->
		        <div class="form-group">
		        	<div class="col-sm-offset-1" >
		            {!!Form::submit('submit',array('class'=>'btn btn-default  btn-lg','style'=>'width: 40%;'))!!}
		            {{Form::close()}}
		        	</div>
		        </div>
    			
		  </div><!-- end of panel body  -->
		  
</div><!-- end of panel  -->

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
		});//end of ready doc   
</script>
@stop	