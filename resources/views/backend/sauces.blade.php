@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')
@section('content_header')
    <h1>Sosy</h1>
@stop
@section('content')
    @foreach ($sauces as $key => $value)
      <blockquote>
        {{ $value->name }}
        <small> cena: {{ $value->price }} zł  </small>
      </blockquote>
    @endforeach
@stop
