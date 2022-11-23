function LineasAfo(id){
  var id = (id);

  //window.alert(id);

  $('#panel-title').empty();

  $.get('/lineas/' + id, function(data){


    $.each(data, function(index, subcatObj){

      $('#panel-title').append(subcatObj.nombre).show();
      //$('#img').html("<img src='/images/lineas/" + subcatObj.imagen "' />")
      $('#img').html("<img src='/images/lineas/"+subcatObj.imagen+"'/>");
      $(".panel-body img").css({'width':'100%' , 'height':'100%'});
      $('#myInput').css('display', 'none');
      $('#btnExcela').css('display', 'none');
      $('#tablea').css('display', 'none');
      $('#documentos').css('display', 'none');
    });
    $('.container-proceso').show();
  });
}
