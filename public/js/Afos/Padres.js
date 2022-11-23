function Padres(id){
  var id = (id);

  //window.alert(id);
  var href = $(this).attr("value");

  $.get('/padres/' + id, function(data){

    $('#panel-title').empty();

    $.each(data, function(index, subcatObj){

      $('#panel-title').append(subcatObj.NOMBREPADRE).show();
      $('#img').html("<img src='/images/padres/"+subcatObj.imagen+"'/>").show();
      $(".panel-body img").css({'width':'50%' , 'height':'45%'});
      $('#btnExcela').show();
      $('#tablea').show();
      $('#myInput').show();
      $('#btnCrearDato').css('display', 'block');
      $('#datosdoc').css('display', 'block');
      reloadPadre(id);
    });
    $('.container-proceso').show();
  });
}

function reloadPadre(id){

  var id =(id);

  var href = document.getElementById("padres_id").getAttribute("value");//$(this).attr("value");

  $('#btnExcela').attr('value', href);
  //window.alert(href);
  $('#datesa').empty();

  //$(this).parent().addClass('active').siblings().removeClass('active');

  $.ajax({
  url: href,
  type: 'get',
  dataType: 'JSON',
  async: false,
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

  DocumentosPadre(id)

}

$(document).ready(function(){

  ////// función para los nodos del menú se activan respecto al click

  $('ul li a').click(function() {
    $('ul li').css('background','none');
    $(this).parent().css('background','PaleTurquoise');
  });


    //////// función para actualizar los datos de la tabla
    /*$('.padres_id').click(function(e){
        var href = $(this).attr("value");

        $('#btnExcela').attr('value', href);
        //window.alert(href);
        $('#datesa').empty();

        //$(this).parent().addClass('active').siblings().removeClass('active');

        var jqXHR = $.ajax({
        url: href,
        type: 'get',
        dataType: 'JSON',
        async: false,
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
        return jqXHR.responseText;
    });*/

    ///////    funcion para descargar excel
    $('#btnExcela').click(function(e){
      var href = $(this).attr("value");

      var url = '/Excel' + href;
      $('#btnExcela').attr('href', url);
    });

    ////  funcion para resetear el formulario de crear
    $('#btnCrearDato').click(function(e){
      document.getElementById("CrearForm").reset();
    });
});

function DocumentosPadre(id){

  var id = (id);

  //window.alert(id);

  $('#datosdoc').empty();  /// limpio la tabla

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

          $("#datosdoc").append(tr_str);
          $('#documentos').show();
      }
    }
  });
}
