$(function() {


  $('#voltar').click(function(){
    $('#formprincipal').attr("action", "index.php");
    $('#formprincipal').attr("method", "get");
    $('#formprincipal').submit();
  });
});