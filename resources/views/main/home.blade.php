@extends('layouts.app')

@section('title', 'Productos MiCursoDigital')

@section('content')
  <div class="container-fluid products-container">
    <div class="row">
      @foreach($products as $product)
        <div class="col-xs-12 col-sm-6">
          @include('products.product', ['product' => $product])
        </div>
      @endforeach
    </div>
    <div class="paginate">
    {{$products->links()}}
    </div>
  </div>
@endsection