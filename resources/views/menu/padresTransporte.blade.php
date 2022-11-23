<ul id="tree1">
@foreach($padres as $padre)
<li>
  <a href="#" id="padres_id" value="/padres/transporte/{{$padre->linea_id}}/{{ $padre->NOMBREPADRE }}" onclick="Padres({{ $padre->id }})">
    {{ $padre->NOMBREPADRE }}
  </a>
</li>
@endforeach
</ul>
