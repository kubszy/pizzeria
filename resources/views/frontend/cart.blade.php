@extends('layouts.frontend')

@section('title', 'Pizzeria - Koszyk')

@section('content')
<div class="container">
  @if(session('delete'))
    <div class="alert alert-success" role="alert">
      {{session('delete')}}
    </div>
  @endif
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Pozycja</th>
        <th style="width:10%">Cena</th>
        <th style="width:8%">Ilość</th>
        <th style="width:22%" class="text-center"> Łącznie </th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php $sum  = 0 ?>
    @if(session('cart'))
      @foreach(session('cart') as $id => $details)
        <?php $sum += $details['price'] * $details['quantity'] ?>
        <tr>
          <td data-th="Pozycja">
              <div class="row">
                  <div class="col-sm-9">
                      <h4 class="nomargin">{{ $details['name'] }}</h4>
                  </div>
              </div>
          </td>
          <td data-th="Cena">{{ $details['price'] }} zł</td>
          <td data-th="Ilość">
              {{ $details['quantity'] }}
          </td>
          <td data-th="Łącznie" class="text-center">{{ $details['price'] * $details['quantity'] }} zł</td>
          <td class="actions" data-th="">
              <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
      @endforeach
    @endif
    </tbody>
    <tfoot>
      <tr>
        <td>
          <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Kontynuuj zakupy </a>
          @if(session('cart'))
              <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> Zamów </a>
          @endif
        </td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Łącznie {{ $sum }} zł</strong></td>
      </tr>
    </tfoot>
  </table>
  @if(session('cart'))
    <div class="row">
      <div class="col-sm-6">
        <h4 >Dodatki</h4>
        <table class="table table-borderless">
          <tbody>
            @foreach ($components as $component)
            <tr>
              <td>{{$component->name}} {{$component->price}} zł</td>
              <td><a href="{{ route('addToCart', [$component->id, 'topping']) }}" class="btn btn-outline-success btn-sm" role="button">Dodaj</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-sm-6">
        <h4 >Sosy</h4>
        <table class="table table-borderless">
          <tbody>
            @foreach ($sauces as $sauce)
            <tr>
              <td>{{$sauce->name}} {{$sauce->price}} zł</td>
              <td><a href="{{ route('addToCart', [$sauce->id, 'topping']) }}" class="btn btn-outline-success btn-sm" role="button">Dodaj</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Potwierdzenie zamówienia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            W celu potwierdzenia zamówienia proszę podać nr klienta: <br>
            <form action=""  method="post">
              <div class="form-group">
                <div class="col-md-4">
                <input type="text" class="form-control" id="userId">
              </div>
              </div>
            </form>
            Jeśli go nie posiadasz, załóż <a href="{{ route('register') }}">Nowe konto</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Anuluj</button>
            <button type="submit" class="btn btn-success btn-sm" id="save">Zamów</button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
  $('.remove-from-cart').click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
      $.ajax({
        url: '{{ route('removeFromCart') }}',
        method: 'delete',
        data: {_token: '{{ csrf_token() }}', id: id},
        success: function (response) {
            window.location.reload();
        }
      });
  });

  $('#save').click(function (e) {
    e.preventDefault();
    var userId = $.trim($("#userId").val());
      $.ajax({
        url: '{{ route('saveCart') }}',
        method: 'post',
        data: {_token: '{{ csrf_token() }}', userId: userId},
        success: function () {
            window.location.replace('{{ route('indexFrontend') }}');
        }
      });
  });
  </script>
@endsection
