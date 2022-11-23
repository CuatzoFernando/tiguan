<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Volkswagen</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/new.css')}}">

</head>
<body onload="myFunction()" style="margin:0;" >

<br>

  @if (Auth::guest())
      <li><a href="{{ route('login') }}" class="btn-primary">Login</a></li>
  @else

  <table width="100%">
    <tr>
      <th width="2%"></th>
      <th width="6%">
        <a href="/home" class="btn btn-sm btn-light"><img src="/icon/arrow_left.png" height="30px" width="30px">&nbsp;Atrás</a>
      </th>
      <th width="10%">
        <a href="#" class="btn btn-md btn-primary">Usuario: {{ Auth::user()->usuario }}</a>
      </th>
      <th width="20%" style="text-align: center;">Vistas Aéreas Tiguan N102</th>
      <th width="20%" style="text-align: center;">Plan. Estandarización</th>
      <!--<th width="20%" style="text-align: center;"><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#principal">Manual</button></th>-->
      <th>
        <a href="{{url('logout')}}" class="pull-right btn btn-danger btn-md"
              onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> &nbsp; Cerrar Sesión</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
      </th>
    </tr>
  </table>

  <br>

  @yield('content')


@endif

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/menu.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/eliminar.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/transporte.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/breadcrumb.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/dropdown.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}" charset="utf-8"></script>

<script>

$(function() {
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toUpperCase();
    $("#dates-t tr").filter(function() {
      $(this).toggle($(this).text().toUpperCase().indexOf(value) > -1)
    });
  });
});

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  //document.getElementById("loader").style.display = "none";
  //document.getElementById("myDiv").style.display = "block";
}

</script>
</body>
</html>
