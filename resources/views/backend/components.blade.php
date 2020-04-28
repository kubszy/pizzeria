@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')
@section('content_header')
    <h1>Dodatkowe składniki</h1>
@stop
@section('content')
    @foreach ($components as $key => $value)
      <blockquote>
        {{ $value->name }}
        <small> cena: {{ $value->price }} zł </small>
      </blockquote>
    @endforeach
@stop
