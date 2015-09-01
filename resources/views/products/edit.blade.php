@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product: {{$product->name}}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}

          <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                <br>
                {!! Form::select('category_id',$categories, $product->category->id, ['class' => 'form-control]']) !!}
          </div>
           <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                <br>
                {!! Form::text('name',$product->name, ['class' => 'form-control]']) !!}
           </div>
           <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                <br>
                {!! Form::textarea('description',$product->description,['class' => 'form-control]']) !!}
           </div>
           <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                <br>
                {!! Form::text('price',$product->price) !!}
           </div>
           <div class="form-group">
                {!! Form::label('featured', 'Featured:') !!}
                <br>
                {!! Form::select('featured',array('No','Yes'),$product->featured) !!}
           </div>
           <div class="form-group">
                {!! Form::label('recommend', 'Recommend:') !!}
                <br>
                {!! Form::select('recommend',array('No','Yes'),$product->recommend) !!}
           </div>
           <div class="form-group">
                {!! Form::label('tags', 'Tags:') !!}
                <br>
                {!! Form::textarea('tags', $tags_name ,['class' => 'form-control]']) !!}
           </div>
           <div class="form-group">
                {!! Form::submit('Save Product',['class' => 'btn btn-primary']) !!}
           </div>
        {!! Form::close() !!}
    </div>
@endsection
