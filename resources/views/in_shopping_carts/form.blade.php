{!! Form::open(['url' => route('in_shopping_carts.store'), 'method' => 'POST', 'class' => 'inline-block add-to-cart']) !!}
  {!! Form::hidden('product_id', $product->id, ['name' => 'product_id']) !!}
  {!! Form::submit('Agregar al carrito', ['class' => 'btn btn-info btn-raised']) !!}
{!! Form::close() !!}