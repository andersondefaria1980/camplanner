function confirmInput() {
    largura = document.forms[0].largura.value;
    alert("Hello " + largura + "! You will now be redirected to www.w3Schools.com");
} 
$(function() {

  $('#largura').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  $('#profundidade').maskMoney({ decimal: ',', thousands: '', precision: 2 });
  
  $('.camera').click(function(){
    $('#cameraselecionada').val($(this).attr("value"));
    $('#cameraselecionadanome').val($(this).attr("nomecamera"));

    $('#formprincipal').submit();
  });

  $('#dimensionar').click(function(){
  	$('#cameraselecionada').val("");
  });

  $('[data-toggle="tooltip"]').tooltip();   

})
