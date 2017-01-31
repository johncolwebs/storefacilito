<div class="card product text-left">

  @if(Auth::check() && $product->user_id == Auth::user()->id)
    <div class="absolute actions btn-group-sm">
      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-fab" title="Editar Producto"><i class="material-icons">create</i></a>
      @include('products.delete', ['product' => $product, 'url' => route('products.destroy', $product->id), 'method' => 'DELETE'])
    </div>
  @endif

  <h1>{{ $product->title }}</h1>
  <div class="row">
    <div class="col-sm-6 col xs-12">
      <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{$product->title}}" class="product-cover">
    </div>
    <div class="col-sm-6 col xs-12">
      <p>
        <strong>Descripción</strong>
      </p>
      <p>
        {{ $product->description }}
      </p>
      <p>
        @include('in_shopping_carts.form', ['product' => $product])
      </p>
    </div>
  </div>
</div>