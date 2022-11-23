<div style="overflow-y: scroll;  height: 350px;">
	<ul id="tree1">
    @foreach($lineas as $linea)

				<div>
					<li><a href="#" value="" ondblclick="LineasAfo({{ $linea->id }})">{{ $linea->nombre }}</a>
	            @if(count( $linea->afos))
	                @include('menu.afos', ['afos' => $linea->afos])
	            @endif
	        </li>
				</div>

    @endforeach
</ul>
</div>
