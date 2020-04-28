@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
         <h3 class="box-title">Szczegóły zamówienia nr <span class="badge badge-danger"> {{ $id }}</span></h3>
       </div>
         <div class="box-body">
           <h4 class="box-title">Pizze</h4>
           @foreach ($orderPizza as $key => $value)
             {{ $value->id }}. {{ $value->pizza->name }} cena {{ $value->pizza->price }} zł <br>
           @endforeach

           <h4 class="box-title">Dodatki</h4>
           @foreach ($orderTopping as $key => $value)
             {{ $value->id }}. {{ $value->topping->name }} cena {{ $value->topping->price }} zł <br>
           @endforeach
           <button class="btn btn-primary text-center" data-id="{{ $id }}">Zatwierdź</button>
         </div>
     </div>
   </div>
  </div>
@stop
@section('scripts')
  <script type="text/javascript">
  $('.btn-primary').click(function (e) {
    e.preventDefault();
    var orderId = $(this).data('id');
      $.ajax({
        url: '{{ route('confirm') }}',
        method: 'put',
        data: {_token: '{{ csrf_token() }}', orderId: orderId},
        success: function () {
            window.location.replace('{{ route('pendingOrders') }}');
        }
      });
  });
  </script>
@endsection
