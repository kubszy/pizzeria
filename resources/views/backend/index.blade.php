@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')
@section('content_header')
    <h1>Start</h1>
@stop
@section('content')
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $orders }}</h3>
          <p>Zamówień</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        {{-- <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $users }}</h3>
          <p>Użytkowników</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        {{-- <a href="/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
      </div>
    </div>
  </div>
@stop
