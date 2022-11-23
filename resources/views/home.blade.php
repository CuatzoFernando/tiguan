@extends('layouts.header')

@section('content')

<div class="container-fluid" style="padding-top: .3cm;">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<!--<div class="col-sm-11 col-md-11 col-lg-11" style="background-color: rgba(0,0,0,0.6); border-radius: 10px;">-->
			<div class="col-sm-12 col-md-12 col-lg-12" style="background-image: url('icon/texturizado_8.jpg'); border-radius: 10px;">
				<div class="col-xs-1"></div>
				<table width="1059" height="594">
					<tr>
						<td height="177" colspan="2">
							<a href="/proceso/1/UB1" data-toggle="tooltip" title="UB1"><img id="UB1_1" src="images/nv/UB1_recorte_1.png" width="357" height="177" /></a>
						</td>
						<td width="129">&nbsp;</td>
						<td colspan="2">
							<a href="/proceso/3/ANBAUTEILE" data-toggle="tooltip" title="ANBAUTEILE"><img id="ANBAUTEILE_1" src="images/nv/ANBAUTEILE_recorte_1.png" width="320" height="142" /></a>
						</td>
						<td width="122">
							<a href="/proceso/6/FINISH" data-toggle="tooltip" title="FINISH"><img id="FINISH_1" src="images/nv/FINISH_1.png" width="39" height="159" /></a>
						</td>
						<td width="231">&nbsp;</td>
					</tr>
					<tr>
						<td height="221" colspan="2">
							<a href="/proceso/2/UB2" data-toggle="tooltip" title="UB2"><img id="UB2_1" src="images/nv/UB2_recorte_1.png" width="340" height="136" /></a>
						</td>
						<td>
							<a href="/proceso/4/AUFBAU" data-toggle="tooltip" title="AUFBAU"><img id="AUFBAU_2" src="images/nv/AUFBAU_recorte_2.png" width="48" height="126" /></a>
						</td>
						<td width="272" rowspan="2">
							<a href="/proceso/5/COSTADOS" data-toggle="tooltip" title="COSTADOS"><img id="COSTADOS_1" src="images/nv/COSTADOS_transparente_1.png" width="207" height="227" /></a>
							<a href="/proceso/4/AUFBAU" data-toggle="tooltip" title="AUFBAU"><img id="AUFBAU_1" src="images/nv/AUFBAU_recorte_1.png" width="169" height="175" /></a>
						</td>
						<td width="79">
							<a href="/proceso/3/ANBAUTEILE" data-toggle="tooltip" title="ANBAUTEILE"><img id="ANBAUTEILE_2" src="images/nv/ANBAUTEILE_recorte_2.png" width="70" height="164" /></a>
						</td>
						<td>
							<a href="/proceso/6/FINISH" data-toggle="tooltip" title="FINISH"><img id="FINISH_2" src="images/nv/FINISH_2.png" width="43" height="206" /></a>
						</td>
						<td>
							<a href="/transporte/7/SISTEMA DE TRANSPORTE N102" data-toggle="tooltip" title="SISTEMA DE TRANSPORTE"><img id="SISTEMADETRANSPORTE_1" src="images/nv/SISTEMADETRANSPORTE_transparente.png" width="201" height="217" /></a>
						</td>
					</tr>
					<tr>
						<td width="324" height="193">&nbsp;</td>
						<td width="69" height="193">
							<a href="/proceso/1/UB1" data-toggle="tooltip" title="UB1"><img id="UB1_2" src="images/nv/UB1_recorte_2.png" width="61" height="162" /></a>
						</td>
						<td>
							<a href="/proceso/2/UB2" data-toggle="tooltip" title="UB2"><img id="UB2_2" src="images/nv/UB2_recorte_2.png" width="115" height="189" /></a>
						</td>
						<td width="79">&nbsp;</td>
						<td>
							<a href="/proceso/6/FINISH" data-toggle="tooltip" title="FINISH"><img id="FINISH_3" src="images/nv/FINISH_3.png" width="44" height="168" /></a>
						</td>
						<td>
							<a href="/transporte/8/SISTEMA DE TRANSPORTE EXTERNO" data-toggle="tooltip" title="SISTEMA DE TRANSPORTE EXTERNO"><img id="SISTEMADETRANSPORTEEXTERNO" src="images/nv/SISTEMADETRANSPORTEEXTERNO.png" width="219" height="189" /></a>
						</td>
					</tr>
				</table>
			</div>
		</div>

	</div>
</div>

@include('manual.home')

@endsection
