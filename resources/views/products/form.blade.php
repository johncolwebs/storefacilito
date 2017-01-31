{!! Form::open(['url' => $url, 'method' => $method, 'files' => true]) !!}
  <div class="form-group label-floating">
    {{ Form::label('title', 'Título del producto', ['class' => 'control-label']) }}
    {{ Form::text('title', $product->title, ['class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group label-floating">
    {{ Form::label('pricing', 'Precio del producto', ['class' => 'control-label']) }}
    <div class="input-group">
      {{ Form::number('pricing', $product->pricing, ['class' => 'form-control', 'step' => 'any', 'min' => '0', 'required' => 'required']) }}
      <span class="input-group-btn">
        <button type="button" class="btn btn-fab btn-fab-mini">
          <i class="material-icons">attach_money</i>
        </button>
      </span>
    </div>
  </div>
  <div class="form-group label-floating">
    {{ Form::label('description', 'Describe tu producto', ['class' => 'control-label']) }}
    {{ Form::textarea('description', $product->description, ['class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
    <div class="row-picture">
      <img id="previewCover" src="{{ $cover = $product->cover ? $product->cover : 'data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0ODMuMiA0ODMuMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDgzLjIgNDgzLjI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojRkZGRkZGOyIgcG9pbnRzPSIzMy42LDAgMzMuNiwzNTIgMTYzLjIsNDgwIDQ0OS42LDQ4MCA0NDkuNiwwICIvPgo8cG9seWxpbmUgc3R5bGU9ImZpbGw6I0U5RjRGMzsiIHBvaW50cz0iNDQ5LjYsNDgwIDQ0OS42LDAgMzMuNiwwICIvPgo8cG9seWxpbmUgc3R5bGU9ImZpbGw6I0Q0RThFNTsiIHBvaW50cz0iNDQ5LjYsMjI0IDQ0OS42LDAgMzMuNiwwICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojRDZFNUUzOyIgcG9pbnRzPSIyODkuNiw0ODAuOCAxNjEuNiwzNTIgMTYxLjYsNDgwIDI4OS42LDQ4MCAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzhBQzRCRDsiIHBvaW50cz0iMzMuNiwzNTIgMTYxLjYsNDgzLjIgMTYxLjYsMzUyICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojNjdBNTlDOyIgcG9pbnRzPSI4Mi40LDQwMi40IDE2MS42LDQ4My4yIDE2MS42LDM1MiA5NS4yLDQxMy42ICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojMTU4OUFEOyIgcG9pbnRzPSIzODQuOCwzMzYuOCAzMDMuMiwzNDMuMiAyMjIuNCwzMzYuOCAzMDMuMiwxNzYuOCAiLz4KPHBvbHlsaW5lIHN0eWxlPSJmaWxsOiMwMzU2NzA7IiBwb2ludHM9IjMwMy4yLDE3Ni44IDM4NC44LDMzNi44IDMwMy4yLDM0My4yICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojMUVBNEM0OyIgcG9pbnRzPSIzMDMuMiwzMTQuNCAzNDkuNiwyNjggMzI0LDIxNi44IDMwMy4yLDE5NiAyODMuMiwyMTYuOCAyNTYuOCwyNjggIi8+Cjxwb2x5bGluZSBzdHlsZT0iZmlsbDojMDY2QjkzOyIgcG9pbnRzPSIzMDMuMiwzMTQuNCAzNDkuNiwyNjggMzI0LDIxNi44IDMwMy4yLDE5NiAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzE1ODlBRDsiIHBvaW50cz0iMzM4LjQsMzMyLjggMjE4LjQsMzQzLjIgOTguNCwzMzIuOCAyMTguNCw5Ny42ICIvPgo8cG9seWxpbmUgc3R5bGU9ImZpbGw6IzA1NzA5MTsiIHBvaW50cz0iMjE4LjQsOTcuNiAzMzguNCwzMzIuOCAyMTguNCwzNDMuMiAiLz4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzFFQTRDNDsiIHBvaW50cz0iMjE4LjQsMzAwLjggMjg2LjQsMjMyLjggMjQ4LDE1Ni44IDIxOC40LDEyNi40IDE4OC44LDE1Ni44IDE0OS42LDIzMi44ICIvPgo8cG9seWxpbmUgc3R5bGU9ImZpbGw6IzEyOTBBRDsiIHBvaW50cz0iMjE4LjQsMzAwLjggMjg2LjQsMjMyLjggMjQ4LDE1Ni44IDIxOC40LDEyNi40ICIvPgo8cG9seWdvbiBzdHlsZT0iZmlsbDojOUFERkVGOyIgcG9pbnRzPSIyMzcuNiwyMTQuNCAyNTcuNiwyMzQuNCAyNzcuNiwyMTQuNCAyMTguNCw5Ny42IDE1OS4yLDIxNC40IDE3OS4yLDIzNC40IDE5OS4yLDIxNC40ICAgMjE4LjQsMjM0LjQgIi8+Cjxwb2x5bGluZSBzdHlsZT0iZmlsbDojN0RENEUyOyIgcG9pbnRzPSIyMTguNCwyMzQuNCAyMzcuNiwyMTQuNCAyNTcuNiwyMzQuNCAyNzcuNiwyMTQuNCAyMTguNCw5Ny42ICIvPgo8cmVjdCB4PSI5Ny42IiB5PSIzMjgiIHN0eWxlPSJmaWxsOiMwNTcwOTE7IiB3aWR0aD0iMjg4IiBoZWlnaHQ9IjE2Ii8+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0Y5OEQyQjsiIGN4PSIzNDkuNiIgY3k9IjEzNiIgcj0iMzcuNiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojREQ2RTEyOyIgZD0iTTM3Ni44LDEwOC44YzE0LjQsMTQuNCwxNC40LDM4LjQsMCw1My42cy0zOC40LDE0LjQtNTMuNiwwIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=' }}" />
    </div>
  </div>
  <div class="form-group label-floating">
    {{ Form::label('cover', 'Imagen de tu producto', ['class' => 'control-label']) }}
    {{ Form::file('cover') }}
    <div class="input-group">
      {{ Form::text('cover', null, ['class' => 'form-control', 'readonly' => '', 'required' => 'required']) }}
        <span class="input-group-btn input-group-sm">
          <button type="button" class="btn btn-fab btn-fab-mini">
            <i class="material-icons">attach_file</i>
          </button>
        </span>
    </div>
  </div>
  <div class="form-group text-right">
    <a class="btn btn-info btn-raised" href="{{ url('/products') }}"> Regresar al listado de productos</a>
    <button class="btn btn-raised btn-success" type="submit">
      <i class="material-icons">save</i>
      Enviar
    </button>
  </div>
{!! Form::close() !!}