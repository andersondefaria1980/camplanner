function confirmInput() {
    largura = document.forms[0].largura.value;
    alert("Hello " + largura + "! You will now be redirected to www.w3Schools.com");
} 
$(function() {

  $('#formprincipal').submit(function(){
    /*if (Number($('#largura').val().replace(",",".")) <= 0 || 
        Number($('#profundidade').val().replace(",",".")) <= 0 || 
        Number($('#distancia').val().replace(",",".")) <= 0){
      alert("Os campos Largura, Profundidade e Distância do Grau de Reconhecimento são obrigatórios. Preencha os campos e tente novamente por favor.");
      return false;
    }*/
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

    $('#gerarproposta').removeClass('disabled');
    draw(largura, profundidade, distancia, resolucao, lente, sensor, angulo);
    
    //$('#formprincipal').submit()
  });

 $('#gerarproposta').click(function(){
  $("#propostacomercial").removeClass("hidden");
    $(document).scrollTop( $("#propostacomercial").offset().top );
    atualizaDadosProposta($('#cameraselecionada').val());
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

    atualizaDadosCamera(element.attr("value"));
  }

  function atualizaDadosCamera(id){
    console.log("id: " + id)
     var data = {
      "action": "test",
      "id": id
    };
    data = $(this).serialize() + "&" + $.param(data);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "camerajson.php", //Relative or absolute path to response.php file
      data: data,
      success: function(data) {
        $("#dadosCameraSelecinoada").html(
          data["texto"]
        );

        //alert("Form submitted successfully.\nReturned json: " + data["json"]);
      }
    });
    return false;
  }

  function atualizaDadosProposta(id){
    console.log("id: " + id)
     var data = {
      "action": "test",
      "id": id
    };
    data = $(this).serialize() + "&" + $.param(data);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "camerajson.php", //Relative or absolute path to response.php file
      data: data,
      success: function(data) {
        var texto = data["texto"];
        texto = texto + "<br><br> Aqui vai o texto da proposta, campos pra preencher os preços, adicionar logos, produtos, nome do cliente, etc... <br><br><br>";
        //texto += "<br /> Aqui vai o texto da proposta".
        $("#dadosProposta").html(texto);
      }
    });
    return false;
  }
});

