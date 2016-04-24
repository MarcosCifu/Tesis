@extends('template')

@section('title','Ingresar animal')

@section('content')
    {{ Form::open(['route' => 'admin.animales.store', 'method' => 'POST']) }}
@endsection