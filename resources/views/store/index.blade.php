@extends('store.store');

@section('categories')
   @include('store.partial.categories');
@stop

@section('content')

     @yield('content')

@stop
