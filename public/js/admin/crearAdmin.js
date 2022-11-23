$(document).ready(function(){
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 4000);
});

$(document).ready(function(){
  $('#procesos').on('change', function(e){
      console.log(e);
      var proceso_id = e.target.value;

      //ajax

      $.get('/nivel-linea/' + proceso_id, function(data){

        $('#lineas').empty();

        $('#lineas').append('<option value=""></option>');
        $.each(data, function(index, subcatObj){
          $('#lineas').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
        });
      });
    });


    $('#lineas').on('change', function(e){
        console.log(e);
        var linea_id = e.target.value;

        //ajax

        $.get('/nivel-afo/' + linea_id, function(data){

          $('#afos').empty();

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

            $('#NOMBREPADREC').empty();

            $('#NOMBREPADREC').append('<option value=""></option>');
            $.each(data, function(index, subcatObj){
              $('#NOMBREPADREC').append('<option value="'+subcatObj.id+'">'+subcatObj.NOMBREPADRE+'</option>');
            });
          });
        });

        $('#procesosT').on('change', function(e){
            console.log(e);
            var proceso_id = e.target.value;

            //ajax

            $.get('/nivel-linea/' + proceso_id, function(data){

              $('#lineasT').empty();

              $('#lineasT').append('<option value=""></option>');
              $.each(data, function(index, subcatObj){
                $('#lineasT').append('<option value="'+subcatObj.id+'">'+subcatObj.nombre+'</option>');
              });
            });
          });

        $('#lineasT').on('change', function(e){
            console.log(e);
            var linea_id = e.target.value;

            //ajax

            $.get('/nivel-padreTransporte/' + linea_id, function(data){

              $('#NOMBREPADRECT').empty();

              $('#NOMBREPADRECT').append('<option value=""></option>');
              $.each(data, function(index, subcatObj){
                $('#NOMBREPADRECT').append('<option value="'+subcatObj.id+'">'+subcatObj.NOMBREPADRE+'</option>');
              });
            });
          });
});
