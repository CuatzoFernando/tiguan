$(document).ready(function(){

    // select para crear
    $('#procesosSelect').on('change', function(e){
        console.log(e);
        var proceso_id = e.target.value;

        //ajax

        $.get('/nivel-linea/' + proceso_id, function(data){

          $('#lineasSelect').empty();

          $('#lineasSelect').append('<option value=""></option>');
          $.each(data, function(index, subcatObj){
            $('#lineasSelect').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
          });
        });
      });

      $('#lineasSelect').on('change', function(e){
          console.log(e);
          var linea_id = e.target.value;

          //ajax

          $.get('/nivel-afo/' + linea_id, function(data){

            $('#afosSelect').empty();

            $('#afosSelect').append('<option value=""></option>');
            $.each(data, function(index, subcatObj){
              $('#afosSelect').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
            });
          });
        });

      $('#lineasSelect').on('change', function(e){
          console.log(e);
          var linea_id = e.target.value;

          //ajax

          $.get('/nivel-padreTransporte/' + linea_id, function(data){

            $('#NOMBREPADRECSelect').empty();

            $('#NOMBREPADRECSelect').append('<option value=""></option>');
            $.each(data, function(index, subcatObj){
              $('#NOMBREPADRECSelect').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
            });
          });
        });

      $('#afosSelect').on('change', function(e){
          console.log(e);
          var afo_id = e.target.value;

          //ajax

          $.get('/nivel-padre/' + afo_id, function(data){

            $('#NOMBREPADRECSelect').empty();

            $('#NOMBREPADRECSelect').append('<option value=""></option>');
            $.each(data, function(index, subcatObj){
              $('#NOMBREPADRECSelect').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
            });
          });
        });


      /////////// seleccionar para editar

    $('#lineas').on('change', function(e){
      console.log(e);
      var linea_id = e.target.value;

      //ajax

      $.get('/nivel-afo/' + linea_id, function(data){

        $('#afos').empty();
        $('#afos').prop('disabled', false);

        $('#afos').append('<option value=""></option>');
        $.each(data, function(index, subcatObj){
          $('#afos').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
        });
      });
    });

    $('#afos').on('change', function(e){
        console.log(e);
        var afo_id = e.target.value;

        //ajax

        $.get('/nivel-padre/' + afo_id, function(data){

          $('#NOMBREPADRE').empty();
          $('#NOMBREPADRE').prop('disabled', false);

          $('#NOMBREPADRE').append('<option value=""></option>');
          $.each(data, function(index, subcatObj){
            $('#NOMBREPADRE').append('<option value="'+subcatObj.NOMBREPADRE+'">'+subcatObj.NOMBREPADRE+'</option>');
          });
        });
      });

});


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
