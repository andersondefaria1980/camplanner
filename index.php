<!DOCTYPE html>
<html lang="en">
<head>
    <title>CamPlanner - Projetos de Segurança</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<script>
function confirmInput() {
    largura = document.forms[0].largura.value;
    alert("Hello " + largura + "! You will now be redirected to www.w3Schools.com");
} 
</script>

<?php
  include("cameraservice.php");

  $largura = (empty($_POST['largura']))?"":$_POST["largura"];
  $comprimento = (empty($_POST['comprimento']))?"":$_POST["comprimento"];
  $profundidade = (empty($_POST['profundidade']))?"":$_POST["profundidade"];

  $deteccao = (empty($_POST['deteccao']))?"":"checked";
  $classificacao = (empty($_POST['classificacao']))?"":"checked";
  $identificacao = (empty($_POST['identificacao']))?"":"checked";
  $reconhecimento = (empty($_POST['reconhecimento']))?"":"checked";

  $ip = (empty($_POST['ip']))?"":"checked";
  $analogica = (empty($_POST['analogica']))?"":"checked";

  $deteccaodemovimento = (empty($_POST['deteccaodemovimento']))?"":"checked";
  $deteccaodeface = (empty($_POST['deteccaodeface']))?"":"checked";
  $reconhecimentofacial = (empty($_POST['reconhecimentofacial']))?"":"checked";
  $reconhecimentodeplaca = (empty($_POST['reconhecimentodeplaca']))?"":"checked";
  $cercavirtual = (empty($_POST['cercavirtual']))?"":"checked";
  $linhavirtual = (empty($_POST['linhavirtual']))?"":"checked";
  $abandonodeobjeto = (empty($_POST['abandonodeobjeto']))?"":"checked";
  $retiradadeobjeto = (empty($_POST['retiradadeobjeto']))?"":"checked";
  $entradadealarme = (empty($_POST['entradadealarme']))?"":"checked";
  $microfone = (empty($_POST['microfone']))?"":"checked";

  //print_r($_POST);
  ?>

<div class="container">
    <h2>CamPlanner - Projetos de Segurança</h2>
    <!--<h3>Dimensionamento de Projetos de Segurança</h3>-->
    <div class="form-group">
        <div class="col-sm-6">
            <span >Descubra qual o projeto de câmeras ideial para seu estabelecimento.</span>
        </div>
        
    </div>
    <br>
    <hr>

    <br/ >
    <form class="form-horizontal" action="index.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3" for="largura" >Largura (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="largura" placeholder="0,00" name="largura" value="<?=$largura?>">
            </div>
           <!-- <label class="control-label col-sm-2" for="largura">Comprimento (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="comprimento" placeholder="0,00" name="comprimento" value="<?=$comprimento?>">
            </div> --> 

            <label class="control-label col-sm-2" for="largura">Profundidade (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="profundidade" placeholder="0,00" name="profundidade" value="<?=$profundidade?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="grau-reconhecimento">Grau de Reconhecimento:</label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="deteccao" <?=$deteccao?>>Detecção</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="classificacao" <?=$classificacao?>>Classificação</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="identificacao" <?=$identificacao?>>Identificação</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="reconhecimento" <?=$reconhecimento?>>Reconhecimento</label>
                </div>
            </div>
            <div class="col-sm-1">
               <span class="glyphicon glyphicon-question-sign">
            </div>
        </div>


      <br/ >
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo">Tipo de Câmera:</label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="ip" <?=$ip?>>IP</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="analogica" <?=$analogica?>>Analógica</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo">Carcterísticas:</label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="deteccaodemovimento" <?=$deteccaodemovimento?>>Detecção de Movimento</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="deteccaodeface" <?=$deteccaodeface?>>Detecção de Face</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="reconhecimentofacial" <?=$reconhecimentofacial?>>Reconhecimento Facial</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="reconhecimentodeplaca" <?=$reconhecimentodeplaca?>>Reconhecimento de Placa</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="cercavirtual" <?=$cercavirtual?>>Cerca Virtual</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="linhavirtual" <?=$linhavirtual?>>Linha Virtual</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="abandonodeobjeto" <?=$abandonodeobjeto?>>Abandono de Objeto</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="retiradadeobjeto" <?=$retiradadeobjeto?>>Retirada de Objeto</label>
                </div>
            </div>
        </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="entradadealarme" <?=$entradadealarme?>>Entrada de Alarme</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="microfone" <?=$microfone?>>Microfone</label>
                </div>
            </div>
        </div>
<br>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-3"  >
                <a href="index.php">
                   <button type="button" value="limpar" class="btn btn-default">Limpar Dados</button>
                </a>
            </div>
            <div class="col-sm-6"  >
                <button type="submit" value="dimensionar" class="btn btn-default">Dimensionar Projeto</button>
            </div>
        </div>
    </form>
    <hr>


<?php if(!empty($_POST)){

$caracteristicas=[];
    

$service = new CameraService();
$cameras = $service->getCameras();

//print_r($cameras);

 ?>
    <h3>Seu Projeto</h3>
    <br>




        <div class="col-sm-12" style="text-align: center" >
            <img src="img/exemplo.jpg" width="800px" height="400px" id="imagemprojeto" value="bbbb">
        </div>
    
    
        <div class="col-sm-12" style="text-align: center">
          <br>
          <hr>
        </div>
    
    <script>
        //alert($("#largura").val());
    $("#largura").focus();
    $(document).scrollTop( $("#imagemprojeto").offset().top );
    </script>

<?php }//print_r($_POST);?>
</div>

</body>
</html>
