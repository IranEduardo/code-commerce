@extends('app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => 'categories.store']) !!}
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
                {!! Form::submit('Add Category',['class' => 'btn btn-primary']) !!}
           </div>
        {!! Form::close() !!}
    </div>
@endsection
