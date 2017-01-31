@extends("layouts.app")

@section('content')
  <div class="container white">
    <h1>Editar Producto</h1>
    {{-- formulario --}}
    @include('products.form', ['product' => $product, 'url' => route('products.update', $product->id), 'method' => 'PATCH'])
  </div>
@endsection