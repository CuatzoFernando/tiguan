<div class="items">
    <ul id="tree1">
    @foreach($procesos as $proceso)

      <div class="panel panel-primary">
        <div class="panel-heading">{{ $proceso->nombre }}</div>
          <div class="panel-body">
            @if(count( $proceso->lineas) > 0 )
              @include('menu.lineas', ['lineas' => $proceso->lineas])
            @endif
          </div>
      </div>

    @endforeach
  </ul>
</div>
