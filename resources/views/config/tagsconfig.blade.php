@extends('config.appconfig')

@section('config_content')
<H3>Add new tag </H3> 

            {{Form::open(array('url'=>'/appconfig/tags/create_servicetag','method'=>'post','class'=>'form-inline'))}}

            {{Form::label('category_id','select main category:')}}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control','placeholder' => 'Pick a category...']) !!}

            {{Form::label('subcategory_id','select sub category:')}}
            {!! Form::select('subcategory_id',[''=>''],null,['class'=>'form-control']) !!}

            {{Form::label('area_name','New tag name: ')}}
            
            {{Form::text('servicetag_name',null, ['class'=>'form-control'])}}
            
            {!!Form::submit('submit',array('class'=>'btn btn-default'))!!}
            {{Form::close()}}
              <hr>

             <div id="area_table" >
             <table class="table table-condensed table-striped ">
              <thead>
              <tr>
                <th>#</th>
                <th>Tag</th>
                <th>Places Count</th>
              </tr>
              </thead>
              <tbody>             

@if (isset($categories))
@foreach ($categories as $category)
                <tr class="header">
              <th colspan="3">{{$category}} <span>-</span></th>
               
              </tr>
     <tr> 
      <td> </td>
      <td>data</td>
      <td>data</td>
     </tr>
          <tr> 
      <td>data</td>
      <td>data</td>
      <td>data</td>
     </tr>
@endforeach
@endif

              </tbody>
            </table><hr>
           </div> <!-- end of area table div   -->    

            
       
{{ $categories  }}
<br>
{{ $subcategories }}


@endsection
   
<style type="text/css">
table, tr, td, th
{
    border: 1px ;
    border-collapse:collapse;
}
tr.header
{
    cursor:pointer;
}

</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
$('.header').click(function(){
   $(this).find('span').text(function(_, value){return value=='-'?'+':'-'});
    $(this).nextUntil('tr.header').slideToggle(100, function(){
    });
});

  

$('#category_id').change(function(){
  if (!$('#category_id').val()) {
      alert('please select valid category ');
  }else{

      $.get("subcategories/"+$('#category_id').val(),function(data){
      $('#subcategory_id').empty();
      if (data.count==0) {
      alert('sorry this category dosn\'t have sub categories ');
        $('#subcategory_id').empty();
      };
      $.each(data, function(value,key) {
      $('#subcategory_id').append($("<option></option>").attr("value", value).text(key));
        });   
  });
  }

});
    
});
</script>
  