@extends('config.appconfig')

@section('config_content')
<div class="row col-xs-offset-1 ">
  <div class="col-md-4">
     <div class="panel panel-default " style="height: 350px;overflow-y: scroll;">
    <div class="panel-heading ">Main application categories</div>
    <div class="panel-body">
      <ul>
        @if (null!==$main_categories)
 <?php 
    $categoriesids = array();
  ?>
        @foreach ($main_categories as $mcat)
            <!-- /* filling array to use it later with ids and names only  */ -->
        <li><a href="{{url('/appconfig/categories/'.$mcat['id'])}}">{{$categoriesids[$mcat['id']]=$mcat['category_name']}} </a></li>      
        @endforeach

        @endif
      </ul>
        </div>
      </div>
  </div>
  <div class="col-md-8">
  <div class="panel panel-default" style="height: 350px;overflow-y: scroll;">
  <div class="panel-heading">Associated Sub categories </div>
  <div class="panel-body">
      <ul>
        @if (isset($sub_categories )&& count($sub_categories)>0)
        
        @foreach ($sub_categories as $sub_cat)
        <li><a href="#">{{$sub_cat['subcategory_name']}} </a></li>
        @endforeach
        @else
        <h4 class="alert alert-warning" role="alert">selected Category Dosen't contain sub categories !!</h4>
        @endif
        
 
      </ul>
    </div>
  </div> 

  </div>

</div>
<br>

<div class="panel panel-default"></div>
            <H3>Create new main category</H3> 

            {{Form::open(array('url'=>'/appconfig/categories/create_main',
                               'method'=>'post',
                               'class'=>'form-inline'
                                 ))}}

            {{Form::label('category_name','Category name:')}}
            
            {{Form::text('category_name',null, ['class'=>'form-control'])}}
            {!!Form::submit('Add',array('class'=>'btn btn-default'))!!}
            {{Form::close()}}

              <hr>

           <h3>Or Add sub-category to existed category</h3>
            {{Form::open(array('url'=>'/appconfig/categories/create_subcategory',
                 'method'=>'post',
                 'class'=>'form-inline'
                   ))}}

            {{Form::label('category_id','select main category:')}}
            {!! Form::select('category_id', $categoriesids,null,['class'=>'form-control']) !!}

            {{Form::label('subcategory_name','Sub-Category name:')}}
            {{Form::text('subcategory_name',null, ['class'=>'form-control'])}}
            
            {!!Form::submit('Add',array('class'=>'btn btn-default'))!!}
            {{Form::close()}}
              <hr>
            
            
           <hr>

            

{{ $main_categories }}

@endsection
   
