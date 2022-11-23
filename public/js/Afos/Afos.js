function AfosPadre(id){
  var id = (id);

  //window.alert(id);

  $('#panel-title').empty();
  var href = '/AfosDetalle/'+id;

  $.get('/afos/' + id, function(data){

    $.each(data, function(index, subcatObj){

      $('#panel-title').append(subcatObj.nombre).show();
      //$('#img').html("<img src='/images/lineas/" + subcatObj.imagen "' />")
      $('#img').html("<img src='/images/afos/"+subcatObj.imagen+"'/>");
      $(".panel-body img").css({'width':'100%' , 'height':'100%'});
      $('#btnExcela').show();
      $('#myInput').show();
      $('#tablea').css('display', 'none');
      $('#btnCrearDato').css('display', 'none');
      $('#documentos').css('display', 'none');
    });
    $('.container-proceso').show();
  });

  reloadAfo(href);
}

function reloadAfo(href){

  $('#datesa').empty(); //////// limpio la tabla datesa
  /*  agrego la url al value del boton btnExcela para despues llamarlo
  **  genero el actualizado de la tabla sin necesidad de recargar la pagina
  **  la acción del botón sera la de descargar el Excel
  */
  $('#btnExcela').attr('value', href);

  //window.alert(href);

  ////////// retorno todos los datos dependiendo del id  y los muestro en la tabla #datesa
  $.ajax({
  url: href,
  type: 'get',
  //async: false,
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
          $('#btnExcela').css('display', 'none');
      }
    }
});
}
