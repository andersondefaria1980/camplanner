function confirmInput() {
    largura = document.forms[0].largura.value;
    alert("Hello " + largura + "! You will now be redirected to www.w3Schools.com");
} 
$(function() {

  $('#formprincipal').submit(function(){
    if (Number($('#largura').val().replace(",",".")) <= 0 || 
        Number($('#profundidade').val().replace(",",".")) <= 0 || 
        Number($('#distancia').val().replace(",",".")) <= 0){
      alert("Os campos Largura, Profundidade e Distância do Grau de Reconhecimento são obrigatórios. Preencha os campos e tente novamente por favor.");
      return false;
    }
    return true;
  });

  $('#largura').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  $('#profundidade').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  $('#distancia').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  
  $('.camera').click(function(){
    $('#cameraselecionada').val($(this).attr("value"));
    $('#cameraselecionadanome').val($(this).attr("nomecamera"));

    //$(this).addClass("negrito");
    selecionarCamera($(this));
    var largura = Number($('#largura').val().replace(",",".")); 
    var profundidade = Number($('#profundidade').val().replace(",",".")); 
    var distancia = Number($('#distancia').val().replace(",",".")); 

    var resolucao = Number($(this).attr("resolucao").replace(",",".")); 
    var lente = Number($(this).attr("lente").replace(",",".")); 
    var sensor = Number($(this).attr("sensor").replace(",",".")); 
    var angulo = Number($(this).attr("angulo").replace(",",".")); 


    draw(largura, profundidade, distancia, resolucao, lente, sensor, angulo);
    
    //$('#formprincipal').submit();

  });

  $('#dimensionar').click(function(){
  	$('#cameraselecionada').val("");
  });

  $('[data-toggle="tooltip"]').tooltip();  

  function selecionarCamera(element){
    $( ".camera" ).each(function( index ) {
      //console.log( index + ": " + $( this ).text() );
      $(this).removeClass("negrito");
    });
    element.addClass("negrito");
    $('#imagemprojeto').hide();
  }
});

