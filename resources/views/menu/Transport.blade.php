<div style="overflow-y: scroll;  height: 350px;">
  <ul id="tree1">
      @foreach($lineas as $linea)
            <li><a href="#" ondblclick="LineasTransporte({{ $linea->id }})">{{ $linea->nombre }}</a>
              @if(count( $linea->padres))
                  @include('menu.padresTransporte', ['padres' => $linea->padres])
              @endif
          </li>
      @endforeach
  </ul>
</div>
