function LineasTransporte(id){
  var id = (id);


  //window.alert(id);

  $('#panel-title').empty();

  $.get('/lineas/' + id, function(data){


    $.each(data, function(index, subcatObj){

      $('#panel-title').empty().append(subcatObj.nombre);
      //$('#img').html("<img src='/images/lineas/" + subcatObj.imagen "' />")
      $('#img').html("<img src='/images/lineas/"+subcatObj.imagen+"'/>");
      $(".panel-body img").css({'width':'100%' , 'height':'100%'});
      $('#btnExcelt').css('display', 'none');
      $('#myInput').show();
      $('#tablea').css('display', 'none');
      $('#documentost').css('display', 'none');
    });
    $('.container-proceso').show();
  });

  var href = '/transporte/detalle/'+id;

  $('#dates-t').empty(); //////// limpio la tabla datesa
  /*  agrego la url al value del boton btnExcela para despues llamarlo
  **  genero el actualizado de la tabla sin necesidad de recargar la pagina
  **  la acción del botón sera la de descargar el Excel
  */
  $('#btnExcelt').attr('value', href);

  //window.alert(href);

  ////////// retorno todos los datos dependiendo del id  y los muestro en la tabla #datesa
  $.ajax({
    url: href,
    type: 'get',
    async: false,
    dataType: 'JSON',
    success: function(response){
      var len = response.length;
      for(var i=0; i<len; i++){
        var id = response[i].id;
        var proceso = response[i].proceso;
        var linea = response[i].linea;
        var nombrepadre = response[i].NOMBREPADRE;
        var cantpadres = response[i].CANTPADRES;
        var nombreequipo = response[i].NOMBREEQUIPO;
        var maximo = response[i].MAXIMO;
        var marcaequipo = response[i].MARCAEQUIPO;
        var modeloequipo = response[i].TYPE;
        var modelobemipadre = response[i].MODELOBEMIPADRE;
        var numserie = response[i].NUMSERIE;
        var descripcioncomplementaria = response[i].DESCRIPCIONCOMPLEMENTARIA;

        var tr_str = "<tr>" +
        //"<td>" + id + "</td>" +
        "<td>" + proceso + "</td>" +
        "<td>" + linea + "</td>" +
        "<td>" + nombrepadre + "</td>" +
        "<td>" + modelobemipadre + "</td>" +
        "<td>" + cantpadres + "</td>" +
        "<td>" + nombreequipo + "</td>" +
        "<td>" + maximo + "</td>" +
        "<td>" + marcaequipo + "</td>" +
        "<td>" + modeloequipo + "</td>" +
        "<td>" + numserie + "</td>" +
        "<td>" + descripcioncomplementaria + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EditarDatoTransporte" onclick="EditarDatoTransporte('+id+')" class="btn btn-sm btn-primary">Editar</button> ' + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EliminarDatoTransporte" onclick="EliminarDatoTransporte('+id+')" class="btn btn-sm btn-danger edit-item">Eliminar</button> ' + "</td>" +
        "</tr>";

        $("#dates-t").append(tr_str);
        $('#table-t').show();
        $('#btnExcelt').css('display', 'none');
      }
    }
  });
}

function procesosEditarSelect(){
  var id = $('#procesos option[value]:selected').val();

  //window.alert(id);

  $.get('/nivel-linea/' + id, function(data){

    $('#lineas').empty();
    $('#lineas').prop('disabled', false);

    $('#lineas').append('<option value=""></option>');
    $.each(data, function(index, subcatObj){
      $('#lineas').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
    });
  });
}

function lineasEditarSelect(){
  var id = $('#lineas option[value]:selected').val();

  $.get('/nivel-padreTransporte/' + id, function(data){

    $('#NOMBREPADRE').empty();
    $('#NOMBREPADRE').prop('disabled', false);

    $('#NOMBREPADRE').append('<option value=""></option>');
    $.each(data, function(index, subcatObj){
      $('#NOMBREPADRE').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
    });
  });
}


/////////   Mando a llamar el modal para editar

function EditarDatoTransporte(id) {
  var id = (id);

  var href = '/editar/dato/'+id;

  /////////   disabled lineas afos
  $('#lineas').attr('disabled', true);
  $('#NOMBREPADRE').attr('disabled', true);

  /// retorno todas las lineas
  $.get('/allLineas', function(data){

    $.each(data, function(index, subcatObj){
      $('#lineas').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
    });
  });

  /// retorno todoslos padres
  $.get('/allPadres', function(data){

    $.each(data, function(index, subcatObj){
      $('#NOMBREPADRE').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
    });
  });

  //window.alert(reload);

  /////// agrego todos los datos dependiendo del id al modal para poder editar
  $.get(href, function(data){

    $.each(data, function(index, subcatObj){

      $('#id').attr('value', subcatObj.id).show();
      $('#naves option[value='+ subcatObj.NAVES+']').prop('selected', true);
      $('#PROYECTO').attr('value', subcatObj.PROYECTO).show();
      $('#procesos option[value='+ subcatObj.PROCESOS+']').prop('selected', true);
      $('#lineas option[value='+ subcatObj.LINEAS+']').prop('selected', true);
      $('#afos option[value='+ subcatObj.AFOS+']').prop('selected', true);
      //$('#NOMBREPADRE option[value='+ subcatObj.NOMBREPADRE+']').prop('selected', true);
      $('select>option[value="' + subcatObj.NOMBREPADRE + '"]').prop('selected', true);
      //$('#NOMBREPADRE').attr('value', subcatObj.NOMBREPADRE).show();
      $('#MODELOBEMIPADRE').attr('value', subcatObj.MODELOBEMIPADRE).show();
      $('#DESCRIPCION').attr('value', subcatObj.DESCRIPCION).show();
      $('#CANTPADRES').attr('value', subcatObj.CANTPADRES).show();
      $('#NOMBREEQUIPO').attr('value', subcatObj.NOMBREEQUIPO).show();
      $('#MARCAEQUIPO').attr('value', subcatObj.MARCAEQUIPO).show();
      $('#TYPE').attr('value', subcatObj.TYPE).show();
      $('#NUMSERIE').attr('value', subcatObj.NUMSERIE).show();
      $('#DESCRIPCIONCOMPLEMENTARIA').attr('value', subcatObj.DESCRIPCIONCOMPLEMENTARIA).show();
      $('#MAXIMO').attr('value', subcatObj.MAXIMO).show();
      $('#CANTELEMENTO').attr('value', subcatObj.CANTELEMENTO).show();
      $('#NOMENCLATURA').attr('value', subcatObj.NOMENCLATURA).show();
      $('#NUMTABLERO').attr('value', subcatObj.NUMTABLERO).show();
      $('#OBSERVACIONES').attr('value', subcatObj.NOMBREPADRE).show();
      $('#NUMINVENTARIO').attr('value', subcatObj.NUMINVENTARIO).show();
    });
  });

  document.getElementById("EditarForm").reset();

}

////////// funcion de actualizar
function UpdateDatoTransporte(){

  var id = $("input[id=id]").val(); // selecciono el valor que tenga el input con el #id

  //window.alert(id);

  var href = '/update/'+id; // url + id

  // datos a actualizar

  var naves = $( "#naves option:selected" ).val();
  var proyecto = $('#PROYECTO').val();
  var procesos = $('#procesos option:selected').val();
  var lineas = $('#lineas option:selected').val();
  var afos = $('#afos option:selected').val();
  var nombrepadre = $('#NOMBREPADRE').val();
  var modelobemipadre = $('#MODELOBEMIPADRE').val();
  var descripcion = $('#DESCRIPCION').val();
  var cantpadres = $('#CANTPADRES').val();
  var nombreequipo = $('#NOMBREEQUIPO').val();
  var marcaequipo = $('#MARCAEQUIPO').val();
  var type = $('#TYPE').val();
  var numserie = $('#NUMSERIE').val();
  var descripcioncomplementaria = $('#DESCRIPCIONCOMPLEMENTARIA').val();
  var maximo = $('#MAXIMO').val();
  var cantelemento = $('#CANTELEMENTO').val();
  var nomenclatura = $('#NOMENCLATURA').val();
  var numtablero = $('#NUMTABLERO').val();
  var observaciones = $('#OBSERVACIONES').val();
  var numinventario = $('#NUMINVENTARIO').val();

  // variable para recargar la tabla
  var reload = $('#btnExcelt').attr('value');

  //window.alert(nombrepadre);

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  ////  actualizó a la base de datos con los datos que tenga el model
  $.post({
    url: href,
    type: 'POST',
    dataType: 'JSON',
    data:{
      NAVES:naves,
      PROYECTO:proyecto,
      PROCESOS:procesos,
      LINEAS:lineas,
      AFOS:afos,
      NOMBREPADRE:nombrepadre,
      MODELOBEMIPADRE:modelobemipadre,
      DESCRIPCION:descripcion,
      CANTPADRES:cantpadres,
      NOMBREEQUIPO:nombreequipo,
      MARCAEQUIPO:marcaequipo,
      TYPE:type,
      NUMSERIE:numserie,
      DESCRIPCIONCOMPLEMENTARIA:descripcioncomplementaria,
      MAXIMO:maximo,
      CANTELEMENTO:cantelemento,
      NOMENCLATURA:nomenclatura,
      NUMTABLERO:numtablero,
      OBSERVACIONES:observaciones,
      NUMINVENTARIO:numinventario
    },
    success:function(data){
       //console.log(data);
    }
  });

  $('#dates-t').empty();  /// limpio la tablea

  //
  $.ajax({
    url: reload,
    type: 'get',
    dataType: 'JSON',
    success: function(response){
      var len = response.length;
      for(var i=0; i<len; i++){
        var id = response[i].id;
        var proceso = response[i].proceso;
        var linea = response[i].linea;
        var nombrepadre = response[i].NOMBREPADRE;
        var cantpadres = response[i].CANTPADRES;
        var nombreequipo = response[i].NOMBREEQUIPO;
        var maximo = response[i].MAXIMO;
        var marcaequipo = response[i].MARCAEQUIPO;
        var modeloequipo = response[i].TYPE;
        var modelobemipadre = response[i].MODELOBEMIPADRE;
        var numserie = response[i].NUMSERIE;
        var descripcioncomplementaria = response[i].DESCRIPCIONCOMPLEMENTARIA;

        var tr_str = "<tr>" +
        //"<td>" + id + "</td>" +
        "<td>" + proceso + "</td>" +
        "<td>" + linea + "</td>" +
        "<td>" + nombrepadre + "</td>" +
        "<td>" + modelobemipadre + "</td>" +
        "<td>" + cantpadres + "</td>" +
        "<td>" + nombreequipo + "</td>" +
        "<td>" + maximo + "</td>" +
        "<td>" + marcaequipo + "</td>" +
        "<td>" + modeloequipo + "</td>" +
        "<td>" + numserie + "</td>" +
        "<td>" + descripcioncomplementaria + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EditarDatoTransporte" onclick="EditarDatoTransporte('+id+')" class="btn btn-sm btn-primary">Editar</button> ' + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EliminarDatoTransporte" onclick="EliminarDatoTransporte('+id+')" class="btn btn-sm btn-danger edit-item">Eliminar</button> ' + "</td>" +
        "</tr>";

        $("#dates-t").append(tr_str);
        $('#table-t').show();
        $('#btnExcelt').show();
      }
    }
  });

  document.getElementById("EditarForm").reset();
  $('#EditarDatoTransporte').modal('hide');

}

$(document).ready(function(){

  $('#btnExcelt').click(function(e){
    var href = $(this).attr("value");

    var url = '/Excel' + href;
    $('#btnExcelt').attr('href', url);
  });

  $('#btnCrearDato').click(function(e){
    document.getElementById("CrearForm").reset();
  });

  $('ul li a').click(function() {
    //$(this).parent().css('background','LightGoldenRodYellow');
    $('ul li').css('background','none');
    $(this).parent().css('background','PaleTurquoise');
  });

});


function Padres(id){
  var id = (id);

  //window.alert(id);

  $.get('/padres/' + id, function(data){

    //$('#panel-title').empty();

    $.each(data, function(index, subcatObj){

      $('#panel-title').empty().append(subcatObj.NOMBREPADRE);
      $('#img').html("<img src='/images/padres/"+subcatObj.imagen+"'/>").show();
      $(".panel-body img").css({'width':'50%' , 'height':'45%'});
      $('#btnExcelt').show();
      $('#myInput').show();
      $('#table-t').show();
      $('#btnCrearDato').css('display', 'block');
      $('#documentost').css('display', 'block');
      ReloadPadre(id);
    });
    $('.container-proceso').show();
  });
}

function ReloadPadre(id){

  var id =(id);

  var href = document.getElementById("padres_id").getAttribute("value");//$(this).attr("value");

  $('#btnExcelt').attr('value', href);
  //window.alert(href);
  $('#dates-t').empty();

  $.ajax({
    url: href,
    type: 'get',
    async: false,
    dataType: 'JSON',
    success: function(response){
      var len = response.length;
      for(var i=0; i<len; i++){
        var id = response[i].id;
        var proceso = response[i].proceso;
        var linea = response[i].linea;
        var nombrepadre = response[i].NOMBREPADRE;
        var cantpadres = response[i].CANTPADRES;
        var nombreequipo = response[i].NOMBREEQUIPO;
        var maximo = response[i].MAXIMO;
        var marcaequipo = response[i].MARCAEQUIPO;
        var modeloequipo = response[i].TYPE;
        var modelobemipadre = response[i].MODELOBEMIPADRE;
        var numserie = response[i].NUMSERIE;
        var descripcioncomplementaria = response[i].DESCRIPCIONCOMPLEMENTARIA;

        var tr_str = "<tr>" +
        //"<td>" + id + "</td>" +
        "<td>" + proceso + "</td>" +
        "<td>" + linea + "</td>" +
        "<td>" + nombrepadre + "</td>" +
        "<td>" + modelobemipadre + "</td>" +
        "<td>" + cantpadres + "</td>" +
        "<td>" + nombreequipo + "</td>" +
        "<td>" + maximo + "</td>" +
        "<td>" + marcaequipo + "</td>" +
        "<td>" + modeloequipo + "</td>" +
        "<td>" + numserie + "</td>" +
        "<td>" + descripcioncomplementaria + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EditarDatoTransporte" onclick="EditarDatoTransporte('+id+')" class="btn btn-sm btn-primary">Editar</button> ' + "</td>" +
        "<td>" + '<button data-toggle="modal" data-target="#EliminarDatoTransporte" onclick="EliminarDatoTransporte('+id+')" class="btn btn-sm btn-danger">Eliminar</button> ' + "</td>" +
        "</tr>";

        $("#dates-t").append(tr_str);
        $('#table-t').show();
      }
    }
  });
  DocumentosPadre(id);
}

function DocumentosPadre(id){
  //window.alert("hola mundo");
  var id = (id);

  //window.alert(id);

  $('#datosdoct').empty();  /// limpio la tabla

  $.ajax({
    url: '/Documento/' + id,
    type: 'get',
    dataType: 'JSON',
    success: function(response){
      var len = response.length;
      for(var i=0; i<len; i++){
        var id = response[i].id;
        var nombre = response[i].nombre;

        var tr_str = "<tr>" +
        //"<td>" + id + "</td>" +
        "<td>" + nombre + "</td>" +
        //"<td>" + '<button onclick="DescargarDocumento('+id+')" class="btn btn-sm btn-success">Descargar</button> ' + "</td>" +
        "<td>" + '<a href="/Descargar/'+id+'" class="btn btn-primary btn-sm"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Descargar</a>'+ "</td>"+
        "</tr>";

        $("#datosdoct").append(tr_str);
        $('#documentost').show();
      }
    }
  });
}
