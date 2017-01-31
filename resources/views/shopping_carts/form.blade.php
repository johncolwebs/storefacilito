{!! Form::open(['url' => route('carrito.pay'), 'method' => 'POST', 'class' => 'inline-block']) !!}
  {!! Form::submit('Comprar', ['class' => 'btn btn-raised btn-success']) !!}
{!! Form::close() !!}