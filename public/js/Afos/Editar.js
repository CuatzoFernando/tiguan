
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

/////////   Mando a llamar el modal para editar

function EditarDatoAfo(id) {
  var id = (id);

  var href = '/editar/dato/'+id;

  //window.alert(reload);

  /////////   disabled lineas afos
  $('#lineas').attr('disabled', true);
  $('#NOMBREPADRE').attr('disabled', true);
  $('#afos').attr('disabled', true);

  /// retorno todas las lineas
  $.get('/allLineas', function(data){

    $.each(data, function(index, subcatObj){
      $('#lineas').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
    });
  });

  /// retorno todas los afos
  $.get('/allAfos', function(data){

    $.each(data, function(index, subcatObj){
      $('#afos').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
    });
  });

  $.get('/allPadres', function(data){

    $.each(data, function(index, subcatObj){
      $('#NOMBREPADRE').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
      //$('#NOMBREPADRE').replaceWith('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
    });
  });

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
function UpdateDatoAfo(){

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
  var reload = $('#btnExcela').attr('value');

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

  $('#datesa').empty();  /// limpio la tablea

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
          var afo = response[i].afo;
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
              "<td>" + afo + "</td>" +
              "<td>" + nombrepadre + "</td>" +
              "<td>" + modelobemipadre + "</td>" +
              "<td>" + cantpadres + "</td>" +
              "<td>" + nombreequipo + "</td>" +
              "<td>" + maximo + "</td>" +
              "<td>" + marcaequipo + "</td>" +
              "<td>" + modeloequipo + "</td>" +
              "<td>" + numserie + "</td>" +
              "<td>" + descripcioncomplementaria + "</td>" +
              "<td>" + '<button data-toggle="modal" data-target="#EditarDatoAfo" onclick="EditarDatoAfo('+id+')" class="btn btn-sm btn-primary">Editar</button> ' + "</td>" +
              "<td>" + '<button data-toggle="modal" data-target="#EliminarDatoAfo" onclick="EliminarDatoAfo('+id+')" class="btn btn-sm btn-danger">Eliminar</button> ' + "</td>" +
              "</tr>";

          $("#datesa").append(tr_str);
          $('#tablea').show();
      }
    }
  });

  document.getElementById("EditarForm").reset();
  $('#EditarDatoAfo').modal('hide');

}
