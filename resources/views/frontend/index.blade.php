@extends('layouts.frontend')

@section('title', 'Pizzeria - Menu')

@section('content')
<div class="container">
  @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    </div>
  @endif
  @if(session('saveOrder'))
    <div class="alert alert-warning" role="alert">
      {{session('saveOrder')}}
    </div>
  @endif
  @foreach($pizzas->chunk(4) as $chunked_object)
    <div class="row">
      <div class="card-deck">
      @foreach($chunked_object as $object)
        <div class="card" style="width: 18rem; margin-bottom: 20px;">
          <img src="{{ $object->photo_path }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $object->name }}</h5>
            <p class="card-text">{{ $object->description }}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item text-muted">Cena: {{ $object->price }} zł</li>
            {{-- <li class="list-group-item text-muted">Średnia: {{ $object->average_price }} zł</li>
            <li class="list-group-item text-muted">Mała: {{ $object->small_price }} zł</li> --}}
          </ul>
          <div class="card-body">
            <p class="btn-holder"><a href="{{ route('addToCart', [$object->id, 'pizza']) }}" class="btn btn-primary btn-block text-center" role="button">Zamów</a> </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  @endforeach
</div>

@endsection

@section('scripts')

@endsection
