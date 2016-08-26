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
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="sat">Sat </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="sun">Sun </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="mon">Mon </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="tue">Tue </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="wed">Wed </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="thu">Thu </label>
		            <label class="checkbox-inline">
		            <input name="workingDays[]" type="checkbox" value="fri">Fri </label>
		            
		            </div>
				</div>

				<!-- Has Delivery system  -->

		        <div class="form-group form-inline">
		        	<div class="col-md-6 ">
			        	<label>Delivery  </label>
			        	<br>
			            <label class="checkbox-inline">
			            <input name="delivery" type="checkbox" value="true" >Delivry Avilable
			            </label>
			            <br>
			             <label for="from">From</label>
	    					<input type="text" class="form-control " name="delivery_from" placeholder="12:59">To
						 <label for="to"></label>
	    					<input type="text" class="form-control " name="delivery_to" placeholder="12:59">		        	
		        	</div>
		        </div>

				<!-- place service Tags  -->

		        <div class="form-group ">
		        	<div class="col-md-6">
		        		<select class="js-example-tokenizer col-md-6" name="serviceTags[]" multiple="multiple">
						  <option value="AL" selected >Alabama</option>
						    
						  <option value="WY">Wyoming</option>
						</select>

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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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

/* Tagging Script  */
<script type="text/javascript">
	$(".js-example-tokenizer").select2({
		  tags: true,
		  tokenSeparators: [',', ' ']
		});

</script>



@endsection