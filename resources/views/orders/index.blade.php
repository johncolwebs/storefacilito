@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Dashboard</h2>
      </div>
      <div class="panel-body">
        <h3>Estadísticas</h3>
        <div class="row top-space">
          <div class="col-xs-4 col-md-3 col-lg-2 sale-data">
            <span>{{ $totalMonth }}USD</span>
            Ingresos del Mes
          </div>
          <div class="col-xs-4 col-md-3 col-lg-2 sale-data">
            <span>{{ $totalMonthCount }}</span>
            Número de ventas
          </div>
        </div>
        <h3>Ventas</h3>
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Comprador</th>
              <th>Dirección</th>
              <th>No. Guía</th>
              <th>Status</th>
              <th>Fecha de Venta</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->recipient_name}}</td>
              <td>{{$order->address()}}</td>
              <td>
                <a href="#"
                  data-type="text"
                  data-pk="{{$order->id}}"
                  data-url="{{route('orders.update', $order->id)}}"
                  data-title="Número de guía"
                  data-value="{{$order->guide_number}}"
                  data-name="guide_number"
                  class="set-guide-number"
                ></a>
              </td>
              <td>
                <a href="#"
                  data-type="select"
                  data-pk="{{$order->id}}"
                  data-url="{{route('orders.update', $order->id)}}"
                  data-title="Número de guía"
                  data-value="{{$order->status}}"
                  data-name="status"
                  class="select-status"
                ></a>
              </td>
              <td>{{$order->created_at}}</td>
              <td></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection