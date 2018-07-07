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
    <script src="index.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <h2>CamPlanner - Projetos de Segurança</h2>
    <!--<h3>Dimensionamento de Projetos de Segurança</h3>-->

    <div class="form-group">
        <span >Descubra qual o projeto de câmeras ideial para seu estabelecimento.</span>
        <span style="float: right; font-style: italic;">Versão 1.0.2 - 08/07/2018</span>
    </div>   
  </div>
</nav>




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
  
  $cameraselecionada = (empty($_POST['cameraselecionada']))?"":$_POST["cameraselecionada"];
//echo "camera selecionada: [" . $cameraselecionada . "]";
  $cameraselecionadanome = (empty($_POST['cameraselecionadanome']))?"":$_POST["cameraselecionadanome"];

  //print_r($_POST);
  ?>

<div class="jumbotron">
    
    <form class="form-horizontal" id="formprincipal" action="index.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="largura" >Largura (metros):</label>
            <div class="col-sm-1">
                <input type="text" maxlength="5" class="form-control number" id="largura" placeholder="0,00" name="largura" value="<?=$largura?>">
            </div>
           <!-- <label class="control-label col-sm-2" for="largura">Comprimento (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="comprimento" placeholder="0,00" name="comprimento" value="<?=$comprimento?>">
            </div> --> 

            <label class="control-label col-sm-2" for="largura">Profundidade (metros):</label>
            <div class="col-sm-1">
                <input type="text" maxlength="5" class="form-control number" id="profundidade" placeholder="0,00" name="profundidade" value="<?=$profundidade?>">
            </div>
        </div>

        <div class="form-group">
            
            <label class="control-label col-sm-2 " for="grau-reconhecimento" >Grau de Reconhecimento:</label>
            
            <span data-toggle="tooltip" title="Explicação sobre DCRI..." class="glyphicon glyphicon-question-sign" alt="asdfsa" ></span>
            
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
            
        </div>


      
        <div class="form-group">
            <label class="control-label col-sm-2" for="tipo">Tipo de Câmera:</label>
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
            <label class="control-label col-sm-2" for="tipo">Carcterísticas:</label>
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
            <label class="control-label col-sm-2" for="tipo"></label>
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
            <label class="control-label col-sm-2" for="tipo"></label>
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
                <button type="submit" id="dimensionar" value="dimensionar" class="btn btn-default">Dimensionar Projeto</button>
            </div>
        </div>
        <input type="hidden" id="cameraselecionada" name="cameraselecionada" value="<?=$cameraselecionada?>">
        <input type="hidden" id="cameraselecionadanome" name="cameraselecionadanome" value="<?=$cameraselecionadanome?>">

    </form>
    <hr>


<?php if(!empty($_POST)){

    $caracteristicas=[];
    $caracteristicas["ip"] = (empty($_POST['ip']))?0:1;
    $caracteristicas["analogica"] = (empty($_POST['analogica']))?0:1;
    $caracteristicas["deteccaodemovimento"] = (empty($_POST['deteccaodemovimento']))?0:1;
    $caracteristicas["deteccaodeface"] = (empty($_POST['deteccaodeface']))?0:1;
    $caracteristicas["reconhecimentofacial"] = (empty($_POST['reconhecimentofacial']))?0:1;
    $caracteristicas["reconhecimentodeplaca"] = (empty($_POST['reconhecimentodeplaca']))?0:1;
    $caracteristicas["cercavirtual"] = (empty($_POST['cercavirtual']))?0:1;
    $caracteristicas["linhavirtual"] = (empty($_POST['linhavirtual']))?0:1;
    $caracteristicas["abandonodeobjeto"] = (empty($_POST['abandonodeobjeto']))?0:1;
    $caracteristicas["retiradadeobjeto"] = (empty($_POST['retiradadeobjeto']))?0:1;
    $caracteristicas["entradadealarme"] = (empty($_POST['entradadealarme']))?0:1;
    $caracteristicas["microfone"] = (empty($_POST['microfone']))?0:1;

    $graureconhecimento=[];
    $graureconhecimento["deteccao"] = (empty($_POST['deteccao']))?0:1;
    $graureconhecimento["classificacao"] = (empty($_POST['classificacao']))?0:1;
    $graureconhecimento["identificacao"] = (empty($_POST['identificacao']))?0:1;
    $graureconhecimento["reconhecimento"] = (empty($_POST['reconhecimento']))?0:1;

    $largura = $_POST['largura'];
    $profundidade = $_POST['profundidade'];


    $service = new CameraService();
    $cameras = $service->getCameras($caracteristicas, $graureconhecimento, $largura, $profundidade);

     ?>
    <h3>Seu Projeto</h3>
    <br>



    <div class="row">
        <div class="col-sm-2"   ">
            <div class="row" style="height: 30px;font-weight: bold">Câmeras Encontradas</div>
            <?php foreach ($cameras as $c){ ?>
                    <div class="row">
                        <span class="camera <?=($cameraselecionada==$c["id"])?"negrito":""?>" nomecamera="<?php echo $c["modelo"]. " / ". $c["tipo"]?>" id="camera_<?=$c["id"]?>" value="<?=$c["id"]?>">
                            <?php echo " - ".$c["modelo"]. " / " . $c["tipo"];?>
                        </span>
                    </div>
            <?php } ?>
        </div>
        <div class="col-sm-10" >
            <?php if (!empty($cameraselecionada)){ ?>
                <!--<div class="row" style="height: 30px;font-weight: bold;"> - <?php echo $cameraselecionadanome; ?></div>-->
                <div class="row imagemprojeto">
                    <img src="img/exemplo.jpg" width="600px" height="300px" id="imagemprojeto" value="bbbb">
                </div>
           <?php } else { 
                    if (count($cameras) > 0){ ?>
                        <div class="row imagemprojeto" id="imagemprojeto">Selecione uma câmera para visualizar o projeto.</div>
                    <?php }else{ ?>
                        <div class="row imagemprojeto" id="imagemprojeto">Não encontramos nenhuma câmera com a combinação de características selecionadas.</div>
                    <?php } ?>    
           <?php }?>
        </div>
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
