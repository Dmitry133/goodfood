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

            {!! Form::model($product,['action'=>'ProdController@store','method'=>'post','files'=>true,'class'=>'form']) !!}

        <label for="productcategory_idform" class="col-2">Select category</label>
        <select name="productcategory_idform" id="productcategory_idform" class="col-8">
            @foreach($category as $id =>$category)
                <option value="{{$id}}">{{$category->title}}-{{$category->id}}</option>
            @endforeach
        </select>

            <div class="form-group">
                {!! Form::label('productnameform','Product name:') !!}
                {!! Form::text('productnameform','',['class'=>'form-control']) !!}

                {!! Form::label('productpriceform','Price:') !!}
                {!! Form::text('productpriceform','',['class'=>'form-control']) !!}

                {!! Form::label('productnew_priceform','New price:') !!}
                {!! Form::text('productnew_priceform','',['class'=>'form-control']) !!}

                {!! Form::label('productin_stockform','In stock:') !!}
                {!! Form::text('productin_stockform','',['class'=>'form-control']) !!}

                {!! Form::label('productbarcodeform','Barcode:') !!}
                {!! Form::text('productbarcodeform','',['class'=>'form-control']) !!}

                {!! Form::label('productdescriptionform','Description:') !!}
                {!! Form::text('productdescriptionform','',['class'=>'form-control']) !!}

                <div class="form-inline row mt-3">
                    <label for="productimagepathform" class="m-3">Add Image</label>
                    <input type="file" name="productimagepathform" id="productimagepathform" class="col-10">
                </div>

                {!! Form::label('productkcalform','kCal:') !!}
                {!! Form::text('productkcalform','',['class'=>'form-control']) !!}

                {!! Form::label('productproteinform','Protein:') !!}
                {!! Form::text('productproteinform','',['class'=>'form-control']) !!}

                {!! Form::label('productfatsform','Fats:') !!}
                {!! Form::text('productfatsform','',['class'=>'form-control']) !!}

                {!! Form::label('productcarbohydratesform','Carbohydrates:') !!}
                {!! Form::text('productcarbohydratesform','',['class'=>'form-control']) !!}

            </div>
            {!! Form::submit('Add product',['class'=>'btn btn-primary' ]) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
