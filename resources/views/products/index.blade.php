@extends("layouts.app")

@section('title', 'Todos los productos de la Tienda')

@section('content')
  <div class="big-padding text-center blue-grey white-text">
    <h1>Productos</h1>
  </div>
  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td>ID</td>
          <td>Título</td>
          <td>Descripción</td>
          <td>Precio</td>
          <td>Acciones</td>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->pricing }}</td>
            <td class="btn-group-sm">
              <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-fab" title="Ver Producto"><i class="material-icons">pageview</i></a>
              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-fab" title="Editar Producto"><i class="material-icons">create</i></a>
              @include('products.delete', ['product' => $product, 'url' => route('products.destroy', $product->id), 'method' => 'DELETE'])
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="floating">
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection