<!DOCTYPE html>
<html lang="en">
<head>
    <title>CamPlanner - Projetos de Segurança</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="faleconosco.js"></script>
    <script src="criaProjetoMVP.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div  class="titulo">
  <div class="container">
    <div class="form-group">
        <div class="col-sm-4"> 
            <img src="img/logo_fundo_claro3.png" alt="Smiley face" width="340" height="65">
        </div>
        <div class="col-sm-6">
            <h2>Projetos de Segurança</h2>
        </div>
    </div>
    <div class="form-group">
        <span class="col-sm-6"style="float: center;">Descubra qual o projeto de câmeras ideal para seu estabelecimento.</span>
        <span class="col-sm-3"style="float: right; font-style: italic;">Versão 1.5 Beta - 19/07/2018</span>
    </div>   
  </div>
</div>

<div class="container" style="padding-top: 15px">
	<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			Envie um comentário, estaremos sempre prontos para responder o mais rápido possível. 
		    <br />A Equipe Camplanner agradece. <br /><br />
		</div>
		
	</div>
    
    <form class="form-horizontal" id="formprincipal" action="enviarfaleconosco.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="nome" >Nome:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nome"  name="nome" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email" >E-mail:</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email"  name="email" value="">
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-sm-2" for="nome" >Assunto:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="assunto"  name="assunto" value="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nome" >Comentário:</label>
            <div class="col-sm-8">
				<textarea class="form-control" rows="5" id="mensagem" name="mensagem"></textarea>            
			</div>
        </div>
        <div class="form-group">
            <div class="col-sm-10" style="text-align: right;">
            	<button type="button" id="voltar" value="voltar" class="btn btn-default"> Voltar</button>
				<button type="submit" id="enviar" value="enviar" class="btn btn-warning"> Enviar</button>
			</div>
        </div>
        <div class="form-group">
        	<div class="col-sm-2">
        	</div>
        	<?php 

        	  $mensagem = (empty($_POST['mensagem']))?"":$_POST["mensagem"];
        	  $erro = (empty($_POST['erro']))?"":$_POST["erro"];

        	if($mensagem!="" && $erro=="sim"){ ?>
        		<div class="alert alert-danger col-sm-8">
  					<strong>Erro!</strong> <?=$mensagem?>
				</div>
			<?php }?>
			<?php if($mensagem!="" && $erro=="nao"){ ?>
        		<div class="alert alert-success col-sm-8">
  					<strong>Sucesso!</strong> <?=$mensagem?>
				</div>
			<?php }?>
        </div>
    </form>
</div>
