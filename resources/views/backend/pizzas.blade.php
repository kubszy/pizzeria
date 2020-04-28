@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')
@section('content_header')
    <h1>Pizze</h1>
@stop
@section('content')
    @foreach ($pizzas as $key => $value)
      <blockquote>
        {{ $value->id }}. {{ $value->name }} : {{ $value->description }}
        <small> cena {{ $value->price }} zł </small>
      </blockquote>
    @endforeach
@stop
