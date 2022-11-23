function EliminarDatoAfo(id){
  //window.alert(id);
  $('#EliminarDatoAfos').attr('value', id);

}

function CANCELAR()
{
  $('#EliminarDatoAfo').modal('hide');
  $('#EliminarDatoTransporte').modal('hide');
}

$(document).ready(function(){
    $('#EliminarDatoAfos').click(function(e){
      var id = $(this).attr("value");
      var reload = $('#btnExcela').attr('value');

      //window.alert(id);
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax(
      {
          url: "/delete/"+id,
          type: 'delete', // replaced from put
          dataType: "JSON",
          data: {
              "id": id // method and token not needed in data
          },
          success: function (response)
          {
              console.log(response); // see the reponse sent
              $('#EliminarDatoAfo').modal('hide');
          },
          error: function(xhr) {
           console.log(xhr.responseText); // this line will save you tons of hours while debugging
          // do something here because of error
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

    });

    $('#EliminarDatoTransportes').click(function(e){
        var id = $(this).attr("value");
        var reload = $('#btnExcela').attr('value');

        //window.alert(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
        {
            url: "/delete/"+id,
            type: 'delete', // replaced from put
            dataType: "JSON",
            data: {
                "id": id // method and token not needed in data
            },
            success: function (response)
            {
                console.log(response); // see the reponse sent
                $('#EliminarDatoTransporte').modal('hide');
            },
            error: function(xhr) {
             console.log(xhr.responseText); // this line will save you tons of hours while debugging
            // do something here because of error
           }
        });

        //
        $('#dates-t').empty();

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
                    "<td>" + '<button data-toggle="modal" data-target="#EliminarDatoTransporte" onclick="EliminarDatoTransporte('+id+')" class="btn btn-sm btn-danger">Eliminar</button> ' + "</td>" +
                    "</tr>";

                $("#dates-t").append(tr_str);
                $('#table-t').show();
            }
          }
        });

      });
});
