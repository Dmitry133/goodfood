@extends('layouts.main')

@section('content')

   <div class="container" style="margin-top: 10%"><div></div>
       @if(session('errors'))
           @foreach(session('errors')->all() as $error)
               <div class="alert alert-danger">

                   {{$error }}<br>
                   {{session('errors')}};
               </div>
           @endforeach
       @endif

       @if(session('message'))
           <div class="alert alert-success">
               {{session('message')}}
           </div>
       @endif
       <div class="col-12">
           <h2>Create new category</h2>
            {!! Form::model($category,['action'=>'CatController@store','method'=>'post','files'=>true,'class'=>'form']) !!}

           <div class="form-group">
               {!! Form::label('categorytitleform','Category title:') !!}
               {!! Form::text('categorytitleform','',['class'=>'form-control']) !!}

               {!! Form::label('categorydescriptionform','Description:') !!}
               {!! Form::text('categorydescriptionform','',['class'=>'form-control']) !!}

               <div class="form-inline row mt-3">
                   <label for="categoryimagepathform" class="m-3">Add Image</label>
                   <input type="file" name="categoryimagepathform" id="categoryimagepathform" class="col-10">
               </div>

               {!! Form::label('categoryaliasform','Alias:') !!}
               {!! Form::text('categoryaliasform','',['class'=>'form-control']) !!}

           </div>
           {!! Form::submit('Add category',['class'=>'btn btn-primary' ]) !!}

           {!! Form::close() !!}
           <div class="btn btn-success mt-2"><a class="text-dark" href="{{url('prodcreate')}}">Product create</a></div>
       </div>
   </div>

@endsection
