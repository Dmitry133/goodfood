@extends('layouts.main')

@section('content')
   <div class="container" style="margin-top: 10%">
       <div class="col-12">
{{--            {!! Form::model($product, ['action'=>'ProductController@store','method'=>'post','files'=>true,'class'=>'form']) !!}--}}

           <div class="form-group">
{{--               {!! Form::label('productnameform','Foodpackage name:') !!}--}}
{{--               {!! Form::text('productnameform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productbarcodeform','Barcode:') !!}--}}
{{--               {!! Form::text('productcodeform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productdescriptionform','Description:') !!}--}}
{{--               {!! Form::text('productdescriptionform','',['class'=>'form-control']) !!}--}}

               <div class="form-inline row mt-3">
                   <label for="productimagepathform" class="m-3">Add Image</label>
                   <input type="file" name="producteimagepathform" id="productimagepathform" class="col-10">
               </div>

{{--               {!! Form::label('productpriceform','Price:') !!}--}}
{{--               {!! Form::text('productpriceform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productkcalform','kCal:') !!}--}}
{{--               {!! Form::text('productkcalform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productproteinform','Protein:') !!}--}}
{{--               {!! Form::text('productproteinform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productfatsform','fats:') !!}--}}
{{--               {!! Form::text('productfatsform','',['class'=>'form-control']) !!}--}}

{{--               {!! Form::label('productcarbohydratesform','Carbohydrates:') !!}--}}
{{--               {!! Form::text('productcarbohydratesform','',['class'=>'form-control']) !!}--}}


{{--           </div>--}}
{{--           {!! Form::submit('Add product',['class'=>'btn btn-primary' ]) !!}--}}

{{--           {!! Form::close() !!}--}}
       </div>
   </div>

@endsection
