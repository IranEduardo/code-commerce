@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>
        {!! Form::open(['route' => 'products.store']) !!}
           <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                <br>
                {!! Form::text('name',null, ['class' => 'form-control]']) !!}
           </div>
           <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                <br>
                {!! Form::textarea('description',null,['class' => 'form-control]']) !!}
           </div>
           <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                <br>
                {!! Form::text('price',null) !!}
           </div>
           <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                <br>
                {!! Form::select('featured',array('No','Yes'),null) !!}
           </div>
           <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                <br>
                {!! Form::select('recommend',array('No','Yes'),null) !!}
           </div>
           <div class="form-group">
                {!! Form::submit('Add Product',['class' => 'btn btn-primary form-control']) !!}
           </div>
        {!! Form::close() !!}
    </div>
@endsection
