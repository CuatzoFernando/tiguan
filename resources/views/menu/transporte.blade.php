  <div class="items">
      <ul id="tree1">
        @foreach($transportes as $transporte)

        <div class="panel panel-primary">
          <div class="panel-heading">{{ $transporte->nombre }}</div>
            <div class="panel-body">
              @if(count( $transporte->lineas) > 0 )
                  @include('menu.Transport', ['lineas' => $transporte->lineas])
              @endif
            </div>
        </div>
        @endforeach
    </ul>
  </div>
