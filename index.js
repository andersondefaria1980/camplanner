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

  //$('#largura').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  //$('#profundidade').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  //$('#distancia').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  
  $('#exp-rec').click(function(){
    if($('#row-explicacao-reconhecimento').hasClass("hidden")){
      $('#row-explicacao-reconhecimento').removeClass("hidden");
    }else{
      $('#row-explicacao-reconhecimento').addClass("hidden");
    }
    
  });

   $('#proximo1').click(function(){
    $('.passo2').removeClass('hidden');
    $(this).addClass('hidden');
   });

  $('#proximo2').click(function(){
    $('.passo3').removeClass('hidden');
    $(this).addClass('hidden');
   });

$('#proximo3').click(function(){
    $('.passo4').removeClass('hidden');
    $(this).addClass('hidden');
   });

  $('.camera').click(function(){

    $('#cameraselecionada').val($(this).attr("value"));
    $('#cameraselecionadanome').val($(this).attr("nomecamera"));

    //$(this).addClass("negrito");
    selecionarCamera($(this));
    var largura = Number($('#largura').val().replace(",",".")); 
    var profundidade = Number($('#profundidade').val().replace(",",".")); 
    //var distancia = Number($('#distancia').val().replace(",",".")); 
    var distancia = 0;

    var resolucao = Number($(this).attr("resolucao").replace(",",".")); 
    var lentemax = Number($(this).attr("lentemax").replace(",",".")); 
    var lentemin = Number($(this).attr("lentemin").replace(",",".")); 
    var sensor = Number($(this).attr("sensor").replace(",",".")); 
    var angulomax = Number($(this).attr("angulomax").replace(",",".")); 
    var angulomin = Number($(this).attr("angulomin").replace(",",".")); 

    $('#row-reconhecimento').removeClass('hidden');
    $('#row-angulo-abertura').removeClass('hidden');
    $('#gerarproposta').removeClass('disabled');

    var lmin = parseFloat((Number($(this).attr("lentemax"))*10)).toFixed(2);
    var lmax = parseFloat((Number($(this).attr("lentemin"))*10)).toFixed(2);

//console.log(lmin + " - " + lmax);
    $("#lenteC").val(lmin);
    if(angulomax == angulomin && lentemin == lentemax){
      $('#alerta-camera-fixa').removeClass('hidden');
      $("#lenteC").prop('disabled', true);
    }else{
      $('#alerta-camera-fixa').addClass('hidden');
      $("#lenteC").prop('disabled', false);
      $("#lenteC").attr('max',lmax);
      $("#lenteC").attr('min',lmin);
    }
    $('#canvas').removeClass('hidden');

    draw(largura, profundidade, distancia, resolucao, lentemax, lentemin, sensor, angulomax, angulomin);
    
    $(document).scrollTop( $("#seuprojeto").offset().top );
  });

 $('.btn-proposta').click(function(){
    alert('Função ainda não disponível. Será desenvolvida em breve. Desculpe o transtorno.');

 }); 
 $('#gerarproposta').click(function(){
    $("#propostacomercial").removeClass("hidden");
    $("#passo6").removeClass("hidden");
    $("#dadosproposta").removeClass("hidden");
    $("#botoesproposta").removeClass("hidden");
    atualizaDadosProposta($('#cameraselecionada').val());
    console.log($("#propostacomercial").offset().top);
    $(document).scrollTop( $("#propostacomercial").offset().top );
    
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

    //$('#row-distancia').removeClass("hidden");
    //$('#msg-distancia').html("Clique na imagem para saber a distância da câmera...");
//document.getElementById("msg-distancia").innerHTML = texto;

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
          data["texto"] + "<br><span class='textoexplicativo'>Aqui você pode visualizar o ângulo de cobertura de cada câmera selecionada. Após escolher a câmera você ainda pode gerar uma proposta para seu cliente.</span>"
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
        texto = "<br><br>"+ texto + "<br> Você poderá adicionar quantas câmeras quiser em seu projeto.<br><br> Aqui você poderá editar o texto da proposta montando da melhor maneira que desejar para atender as necessidades do seu cliente. Você poderá: <ul><li> Editar os campos para preencher os preços adicionar logo da sua empresa</li><li>Descrever os produtos e instalação</li><li>Adicionar o nome do cliente</li><li>Informar o prazo de validade da proposta</li><li>Incluir opções de valores</li><li>Personalisar cada proposta de acordo com o seu cliente</li></ul><br><br><br>";
        //texto += "<br /> Aqui vai o texto da proposta".
        $("#dadosproposta").html(texto);
      }
    });
    return false;
  }
});

