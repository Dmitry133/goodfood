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
            {!! Form::model($category,['route'=>['editcat',$category->id],'method'=>'PUT','files'=>true,'class'=>'form']) !!}

            <div class="form-group">
                {!! Form::label('categorytitleform','Category title:') !!}
                {!! Form::text('categorytitleform',$category->title,['class'=>'form-control']) !!}

                {!! Form::label('categorydescriptionform','Description:') !!}
                {!! Form::text('categorydescriptionform',$category->description,['class'=>'form-control']) !!}

                <div class="form-inline row mt-3">
                    <label for="categoryimagepathform" class="m-3">Add Image</label>
                    <span>{{$category->imagepath}}</span>

                    <input type="file" name="categoryimagepathform" id="categoryimagepathform" class="col-10">
                </div>

                {!! Form::label('categoryaliasform','Alias:') !!}
                {!! Form::text('categoryaliasform',$category->alias,['class'=>'form-control']) !!}

            </div>
            {!! Form::submit('Edit Category',['class'=>'btn btn-primary' ]) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
