@extends('adminlte::page')
@section('title', 'Pizzeria / Admin panel')

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-header">
           <h3 class="box-title">Zamówienia oczekujące</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
           <table id="example"  class="table table-bordered table-hover">
             <thead>
             <tr>
               <th>Nr</th>
               <th>Użytkownik</th>
               <th>Data</th>
               <th>Suma</th>
               <th>Adres dostawy</th>
               <th>Status</th>
             </tr>
             </thead>
             <tbody>
            @foreach ($confirmedOrders as $key => $value)
             <tr>
               <td>{{ $value->id }}</td>
               <td>{{ $value->user->name }} {{ $value->user->surname }}</td>
               <td>{{ \Carbon\Carbon::parse($value->order_date)->format('d-m-Y H:m')}}</td>
               <td>{{ $value->total_price }} zł</td>
               <td>{{ $value->user->city }}, {{ $value->user->street }} {{ $value->user->number }} / {{ $value->user->apartment_number }}</td>
               <td>{{ $value->status }}</td>
             </tr>
            @endforeach
             </tbody>
             <tfoot>
               <tr>
                 <th>Nr</th>
                 <th>Użytkownik</th>
                 <th>Data</th>
                 <th>Suma</th>
                 <th>Adres dostawy</th>
                 <th>Status</th>
               </tr>
             </tfoot>
           </table>
         </div>
         <!-- /.box-body -->
       </div>
     </div>
@stop
@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Polish.json"
        }
    });
  });
  </script>
@endsection
