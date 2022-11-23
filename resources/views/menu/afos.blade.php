<ul id="tree1">
    @foreach($afos as $afo)

        <div>
					<li><a href="#" ondblclick="AfosPadre({{ $afo->id }})">{{ $afo->nombre }}</a>
            @if(count( $afo->padres))
                @include('menu.padres', ['padres' => $afo->padres])
            @endif
	        </li>
				</div>

    @endforeach
</ul>
