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
    <script src="criaProjetoMVP.js"></script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div  class="titulo">
  <div class="container">
    <div class="form-group">
        <div class="col-sm-4" style="width: 350px !important;">
            <img src="img/logo_fundo_claro3.png" alt="Smiley face" width="340" height="65">
        </div>
        <div class="col-sm-6">
            <h2>Projetos de Segurança</h2>
        </div>
    </div>
    <div class="form-group">
        <span class="col-sm-5"style="float: center;">Descubra qual o projeto de câmeras ideal para seu estabelecimento.</span>
        <span class="col-sm-3"style="float: right; font-style: italic;">Versão 1.6 Beta - 23/07/2018</span>    </div>
  </div>
</div>

<?php
  include("cameraservice.php");

  $largura = (empty($_POST['largura']))?"":$_POST["largura"];
  $comprimento = (empty($_POST['comprimento']))?"":$_POST["comprimento"];
  $profundidade = (empty($_POST['profundidade']))?"":$_POST["profundidade"];

  $deteccao = (empty($_POST['deteccao']))?"":"checked";
  $classificacao = (empty($_POST['classificacao']))?"":"checked";
  $identificacao = (empty($_POST['identificacao']))?"":"checked";
  $reconhecimento = (empty($_POST['reconhecimento']))?"":"checked";
  $distancia = (empty($_POST['distancia']))?"":$_POST["distancia"];

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

 // print_r($_POST);
  ?>

<div class="container" style="padding-top: 15px">
    
    <form class="form-horizontal" id="formprincipal" action="index.php" method="post">
        <div class="form-group passo1">
            <div class="col-sm-1">
                <span class="btn-basic btn right"  for="largura" >PASSO 1</label>
            </div>
            <label class="control-label col-sm-3"  for="largura" >Largura do ambiente (metros):</label>
            <div class="col-sm-1">
                <input style="width:65px !important" type="number" step="1" min="0" max="999" class="form-control number" id="largura" placeholder="0" name="largura" value="<?=$largura?>">
            </div>
           <!-- <label class="control-label col-sm-2" for="largura">Comprimento (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="comprimento" placeholder="0,00" name="comprimento" value="<?=$comprimento?>">
            </div> --> 

            <label class="control-label col-sm-3" for="profundidade">Profundidade do ambiente (metros):</label>
            <div class="col-sm-1">
                <input style="width:65px !important" type="number" step="1" min="0" max="999" class="form-control number" id="profundidade" placeholder="0" name="profundidade" value="<?=$profundidade?>">
            </div>

            <!--<label class="control-label col-sm-2" for="distancia-grau-reconhecimento" >Distância Grau de Reconhecimento:</label>
            <div class="col-sm-1">
                <input type="number" step="1" min="0" max="999" class="form-control number" id="distancia" placeholder="0" name="distancia" value="<?=$distancia?>">
            </div>
            <div class="col-sm-1">
              <a href="#demo" class="btn btn-primary btn-sm" data-toggle="collapse">?</a>
            </div>
-->
            <div class="col-sm-2">
            </div>
            <div class="col-sm-1">
                <span class="btn-primary btn right proximo"  for="largura" id="proximo1">Próximo</label>
            </div>
           
        </div>


            <div id="demo" class="collapse justify explicacao">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                

                <b>DCRI:</b> 
                    <br/><b> - Detecção: </b> é tudo que é possível ver na imagem.

                    <br/><b> - Classificação: </b> é quando é possível distinguir entre humano, animal e objeto o que está na imagem. 

                    <br/><b> - Reconhecimento: </b> é quando é possível identificar cores/tipos de vestimentas e se existe algum objeto com a pessoa. Nesse grau é possível reconhecer a pessoa se você já conhece ela.

                    <br/><b> - Identificação: </b> é quando você consegue visualizar claramente o rosto da pessoa a ponto de lembrar caso não a conheça a pessoa.
              </div>
    </div>
      

      
        <div class="form-group passo2 hidden">
            <div class="col-sm-1">
                <span class="btn-basic btn right"  for="largura" >PASSO 2</label>
            </div>
            <label class="control-label col-sm-2" for="tipo">Tipo de Câmera:</label>
            <div class="col-sm-1">
                <div class="checkbox">
                    <label><input type="checkbox" name="ip" <?=$ip?>>IP</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="analogica" <?=$analogica?>>Analógica</label>
                </div>
            </div>
            <div class="col-sm-5">
            </div>
            <div class="col-sm-1">
                <span class="btn-primary btn right proximo"  for="largura" id="proximo2">Próximo</label>
            </div>
        </div>

        <div class="form-group passo3 hidden">
            <div class="col-sm-1">
                <span class="btn-basic btn right"  for="largura" >PASSO 3</label>
            </div>
            <label class="control-label col-sm-2" for="tipo">Características desejáveis:</label>
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

            <div class="col-sm-1">
                <span class="btn-primary btn right proximo"  for="largura" id="proximo3">Próximo</label>
            </div>
        </div>
        <div class="form-group passo3 hidden">
            <div class="col-sm-1">
            </div>
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
            <div class="col-sm-2 ">
                <div class="checkbox">
                    <label><input type="checkbox" name="retiradadeobjeto" <?=$retiradadeobjeto?>>Retirada de Objeto</label>
                </div>
            </div>
        </div>
          <div class="form-group passo3 hidden">
            <div class="col-sm-1">
            </div>
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
        <div class="form-group passo4 hidden">
            <div class="col-sm-1">
                <span class="btn-basic btn right"  for="largura" >PASSO 4</label>
            </div>
            <div class="col-sm-2">
                <a href="index.php">
                   <button style="float:right;" type="button" value="limpar" class="btn btn-default ">Limpar Dados</button>
                </a>
            </div>
            <div class="col-sm-7">
                <span class="textoexplicativo">Agora que você seleciou as características você pode dimensionar seu projeto clicando no botão ao lado...</span>
            </div>
            <div class="col-sm-2" >
                <button type="submit" style="float: right;" id="dimensionar" value="dimensionar" class="btn btn-primary">Dimensionar Projeto</button>
            </div>
            
        </div>
        <input type="hidden" id="cameraselecionada" name="cameraselecionada" value="<?=$cameraselecionada?>">
        <input type="hidden" id="cameraselecionadanome" name="cameraselecionadanome" value="<?=$cameraselecionadanome?>">

    </form>
    </div>


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
    $graureconhecimento["distancia"] = (empty($_POST['distancia']))?"":$_POST['distancia'];

    //$largura = $_POST['largura'];
    //$profundidade = $_POST['profundidade'];

    $service = new CameraService();
    $cameras = $service->getCameras($caracteristicas, $graureconhecimento, $largura, $profundidade);

     ?>
        <div class="titulo" id="seuprojeto">
            <div class="container">
                <h2>Seu Projeto</h2>
            </div>
        </div>
        <div class="container" style="padding-top: 15px">
            <div class="row">
            <div class="col-sm-2"   ">
                <div class="row">
                    <div class="col-sm-1">
                        <span class="btn-basic btn right"  for="largura" >PASSO 5</label>
                    </div>
                </div>
                <?php foreach ($cameras as $c){ ?>
                        <div class="row">
                            <span class="camera <?=($cameraselecionada==$c["id"])?"negrito":""?>" 
                                  nomecamera="<?php echo $c["modelo"]. " / ". $c["tipo"]?>" 
                                  id="camera_<?=$c["id"]?>" 
                                  value="<?=$c["id"]?>"
                                  resolucao="<?=$c["resolucaomaxima"]?>"
                                  lentemax="<?=$c["lentemaximo"]?>"
                                  lentemin="<?=$c["lenteminimo"]?>"
                                  sensor="<?=$c["sensor"]?>"
                                  angulomax="<?=$c["angulomaximo"]?>"
                                  angulomin="<?=$c["angulominimo"]?>"
                            >
                                <?php echo " - ".$c["modelo"]. " / " . $c["tipo"];?>
                            </span>
                        </div>
                <?php } ?>
            </div>
            <div class="col-sm-10" >    
                <div class="row" >
                    <div class="col-sm-8" id="dadosCameraSelecinoada" >
                        <?php if (count($cameras) > 0){ ?>        
                            Selecione uma câmera para visualizar o projeto e gerar a porposta.
                        <?php }else{ ?>
                            Não encontramos nenhuma câmera com a combinação de características selecionadas.
                        <?php } ?> 
                    </div>
                    <div class="col-sm-2" ></div>
                    <div class="col-sm-2" >
                        <button type="submit" id="gerarproposta" value="gerarproposta" class="btn btn-primary disabled">Gerar Proposta</button>
                    </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row hidden" id="row-reconhecimento">
            
                    <label class="control-label col-sm-2 " for="grau-reconhecimento" >Grau de Reconhecimento:</label>
                    
                    <div class="col-sm-1">
                        <span class="btn btn-primary btn-sm" id="exp-rec">?</span>
                    </div>
                    <!--<span data-toggle="tooltip" title="DCRI" class="glyphicon glyphicon-question-sign" alt="asdfsa" ></span>-->
                    
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label><input type="checkbox" id="deteccao" name="deteccao" checked>Detecção</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label><input type="checkbox" id="classificacao" name="classificacao" checked>Classificação</label>
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label><input type="checkbox" id="reconhecimento" name="reconhecimento" checked>Reconhecimento</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label><input type="checkbox" id="identificacao" name="identificacao" checked>Identificação</label>
                        </div>
                    </div>
            
                </div>
                <div class="row hidden textoexplicativo" id="row-explicacao-reconhecimento">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <b>DCRI:</b> 
                            <br/><b> - Detecção: </b> é tudo que é possível ver na imagem.

                            <br/><b> - Classificação: </b> é quando é possível distinguir entre humano, animal e objeto o que está na imagem. 

                            <br/><b> - Reconhecimento: </b> é quando é possível identificar cores/tipos de vestimentas e se existe algum objeto com a pessoa. Nesse grau é possível reconhecer a pessoa se você já conhece ela.

                            <br/><b> - Identificação: </b> é quando você consegue visualizar claramente o rosto da pessoa a ponto de lembrar caso não a conheça a pessoa.
                    </div>
                </div>
                <div class="row hidden" id="row-angulo-abertura" style="margin-bottom: 15px">
                    <!--<label class="control-label col-sm-2" >Percentual ângulo abertura:</label>
                    <div class="col-sm-1">
                        <input class="form-control" style="width:65px !important" type="number" name="abertura" id="mAbertura" min="0" maxlength="100" step="1" value="100">
                    </div>
                    <div class="col-sm-1" style="padding-top: 7px;margin-left: -13px;font-weight: bold; width: 50px">
                        %
                    </div>
                -->
                <label class="control-label col-sm-2">Lente:</label>
                    <div class="col-sm-1">
                        <input class="form-control" style="width:70px !important" type="number" name="lenteC" id="lenteC" min="0" max="100" maxlength="5" step="0.1">
                    </div>
                   <div class="col-sm-3" id="alerta-camera-fixa" style=" font-style: italic;">
                        Câmera com lente Fixa não pode variar o ângulo de abertura!
                   </div>
                   <div class="col-sm-2" >
                        <button type="button" id="rotDir" value="rotDir" class="btn btn-warning">Rotacionar 10°</button>
                    </div>
                    <div class="col-sm-2" >
                        <button type="button" id="rotEsq" value="rotEsq" class="btn btn-warning">Rotacionar -10°</button>
                    </div>
                </div>
                <div class="row hidden" id="row-distancia">

                    <div class="alert alert-info col-sm-10" id="msg-distancia">
                        Clique na imagem para saber a distância da câmera...
                    </div>
                </div>
                
                <canvas class="hidden" id="canvas" width="1000" height="1000"></canvas>
                <br><br><br>
            </div>
        </div>
        

        <script>
             $('.passo2').removeClass('hidden');
             $('.passo3').removeClass('hidden');
             $('.passo4').removeClass('hidden');
             $('.proximo').addClass('hidden');
             $(document).scrollTop( $("#seuprojeto").offset().top );

        </script>

    </div>
<?php }//print_r($_POST);?>

    <div class="titulo hidden" id="propostacomercial" >
        <div class="container">
            <h2>Proposta Comercial</h2>
        </div>
        <!--</div class="container row">
            <div class="col-sm-1">
                <span class="btn-basic btn right"  for="largura" >PASSO 6</label>
            </div>
        <div>-->
    </div>
    <div class="container hidden" id="passo6" style="padding-top: 15px">
            <div class="row">
            <div class="col-sm-2">
                <div class="row">
                    <div class="col-sm-1">
                        <span class="btn-basic btn right"  for="largura" >PASSO 6</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dadosproposta"  class="container hidden">    
    </div>

    <div id="botoesproposta"  class="container hidden" style="text-align: right;">
        <hr>
        <button type="submit" id="gerarpdf" value="gerarpdf" class="btn btn-danger btn-proposta">Gerar PDF</button>
        <button type="submit" id="gerarword" value="gerarword" class="btn btn-primary btn-proposta">Gerar WORD</button>
        <button type="submit" id="enviarporemail" value="enviarporemail" class="btn btn-success btn-proposta">Enviar por EMAIL</button>


        <br>
        <br>
    </div>

<div class="footer titulo">
    <form id="formprincipal" action="faleconosco.php" method="post">
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">A Camplanner é uma startup formada por colaboradores Intelbras. Envie críticas, sujestões e dúvidas clicando no botão "Fale conosco". <b>Seja um dos primeiros a receber nossa novidades. Informe PRE-COMPRA no assunto se você tem interesse!</b></div>
            <div class="col-sm-2">
                <button type="submit" id="faleconosco" value="faleconosco" class="btn btn-warning">Fale conosco</button>
            </div>
        </div>
    </form>
</div>
 
 </div>
</body>
</html>
