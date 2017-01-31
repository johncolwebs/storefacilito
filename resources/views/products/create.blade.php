@extends("layouts.app")

@section('content')
  <div class="container white">
    <h1>Nuevo Producto</h1>
    {{-- formulario --}}
    @include('products.form', ['product' => $product, 'url' => route('products.store'), 'method' => 'POST'])
  </div>
@endsection