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
    <script src="criaProj.js"></script>

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
            <!--<h3>Dimensionamento de Projetos de Segurança</h3>-->
        </div>
    </div>
    <div class="form-group">
        <span class="col-sm-6"style="float: center;">Descubra qual o projeto de câmeras ideal para seu estabelecimento.</span>
        <span class="col-sm-2"style="float: right; font-style: italic;">Versão 1.3 - Beta</span>
    </div>   
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
        <div class="form-group">
            <label class="control-label col-sm-2" for="largura" >Largura (metros):</label>
            <div class="col-sm-1">
                <input type="text" maxlength="5" class="form-control number" id="largura" placeholder="0,00" name="largura" value="<?=$largura?>">
            </div>
           <!-- <label class="control-label col-sm-2" for="largura">Comprimento (metros):</label>
            <div class="col-sm-1">
                <input type="money" class="form-control number" id="comprimento" placeholder="0,00" name="comprimento" value="<?=$comprimento?>">
            </div> --> 

            <label class="control-label col-sm-2" for="profundidade">Profundidade (metros):</label>
            <div class="col-sm-1">
                <input type="text" maxlength="5" class="form-control number" id="profundidade" placeholder="0,00" name="profundidade" value="<?=$profundidade?>">
            </div>
        </div>

        <div class="form-group">
            
            <label class="control-label col-sm-2 " for="grau-reconhecimento" >Grau de Reconhecimento:</label>
            
            <!--<span data-toggle="tooltip" title="DCRI" class="glyphicon glyphicon-question-sign" alt="asdfsa" ></span>-->
            
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
                    <label><input type="checkbox" name="reconhecimento" <?=$reconhecimento?>>Reconhecimento</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="identificacao" <?=$identificacao?>>Identificação</label>
                </div>
            </div>
            
        </div>

        <div class="form-group">
            
            <label class="control-label col-sm-2" for="distancia-grau-reconhecimento" >Distância Grau de Reconhecimento:</label>
            

            <div class="col-sm-1">
                <input type="text" maxlength="5" class="form-control number" id="distancia" placeholder="0,00" name="distancia" value="<?=$distancia?>">
            </div>

            <div class="col-sm-1">
              <a href="#demo" class="btn btn-info btn-sm" data-toggle="collapse">?</a>
            </div>

            <div class="col-sm-8">
              <div id="demo" class="collapse justify explicacao">

                <b>DCRI:</b> 
                    <br/><b> - Detecção: </b> é tudo que é possível ver na imagem.

                    <br/><b> - Classificação: </b> é quando é possível distinguir entre humano, animal e objeto o que está na imagem. 

                    <br/><b> - Reconhecimento: </b> é quando é possível identificar cores/tipos de vestimentas e se existe algum objeto com a pessoa. Nesse grau é possível reconhecer a pessoa se você já conhece ela.

                    <br/><b> - Identificação: </b> é quando você consegue visualizar claramente o rosto da pessoa a ponto de lembrar caso não a conheça a pessoa.
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
            <label class="control-label col-sm-2" for="tipo">Características:</label>
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
                <h3>Seu Projeto</h3>
            </div>
         </div>
        <div class="container" style="padding-top: 15px">
            <div class="row">
            <div class="col-sm-2"   ">
                <div class="row" style="height: 30px;font-weight: bold">Câmeras Encontradas</div>
                <?php foreach ($cameras as $c){ ?>
                        <div class="row">
                            <span class="camera <?=($cameraselecionada==$c["id"])?"negrito":""?>" 
                                  nomecamera="<?php echo $c["modelo"]. " / ". $c["tipo"]?>" 
                                  id="camera_<?=$c["id"]?>" 
                                  value="<?=$c["id"]?>"
                                  resolucao="<?=$c["resolucaomaxima"]?>"
                                  lente="<?=$c["lente"]?>"
                                  sensor="<?=$c["sensor"]?>"
                                  angulo="<?=$c["angulo"]?>"
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
                    <div class="col-sm-2" >
                        <button type="submit" id="gerarproposta" value="gerarproposta" class="btn btn-default disabled">Gerar Proposta</button>
                    </div>
                </div>
                 <div class="row">
                    <hr>
                </div>
                <div class="row imagemprojeto" id="imagemprojeto">
                              
                </div>
                <canvas id="canvas" width="1000" height="850"></canvas>
                <br><br><br>
            </div>
        </div>
        

        <script>
            $(document).scrollTop( $("#seuprojeto").offset().top );
        </script>

    </div>
<?php }//print_r($_POST);?>

    <div class="titulo hidden" id="propostacomercial" >
        <div class="container">
            <h3>Proposta Comercial</h3>
        </div>
        <div class="container">
            <hr>
             <div id="dadosProposta" >
             </div>

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque viverra felis ac sem mollis finibus. Aliquam sit amet mollis leo. Phasellus suscipit, nisi vitae dictum egestas, ante risus viverra nibh, at tincidunt massa sapien sit amet libero. Cras ut vulputate massa. Nulla consectetur suscipit tellus. Morbi non porttitor risus, et tristique massa. Cras semper eros magna, at dapibus mi sodales ut. Suspendisse arcu ipsum, tincidunt pretium congue vitae, venenatis mattis felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent vel magna tristique, tempus quam eget, vulputate lacus. Etiam risus ipsum, malesuada vitae nisl non, venenatis tincidunt neque.

Morbi accumsan nunc ut velit dignissim tincidunt. Morbi ac mauris elit. Ut id enim interdum, egestas turpis et, condimentum lectus. Aliquam erat volutpat. Cras quis pretium nibh. Nullam gravida hendrerit consequat. Aliquam rutrum dui fermentum purus efficitur fermentum. Duis vitae leo dictum, posuere orci et, tincidunt lacus.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam iaculis accumsan metus, eu laoreet ipsum feugiat sit amet. Suspendisse lorem neque, tincidunt vitae mauris nec, feugiat ultrices nunc. Praesent pulvinar vitae eros a accumsan. Fusce tristique ex vel nulla congue, vel molestie lacus aliquet. Mauris at volutpat leo. Fusce nec tempus dolor. Mauris quis auctor sapien, tempus tincidunt nibh.

Mauris et arcu ultricies ipsum vulputate semper id vel mauris. Curabitur sed dolor eget dolor accumsan dignissim. Phasellus vestibulum leo eget efficitur rutrum. Mauris elementum lorem ligula, eget rhoncus odio laoreet vel. Pellentesque dictum finibus nunc, a volutpat sapien tristique ut. Cras id nibh nec nulla fringilla convallis eu et elit. Duis tristique auctor nunc quis fermentum. Donec dignissim leo ipsum, et dictum arcu eleifend vel. Cras dapibus posuere nisi, sit amet sagittis nulla interdum at. Vestibulum blandit nisl eu tortor tempus, in varius dui convallis. Integer at auctor orci. Donec porta risus quis commodo tempor. Pellentesque nec elementum felis, a tempor massa. Nam vehicula, elit vitae fermentum accumsan, erat lacus euismod libero, vitae egestas felis sem non elit. Integer consectetur facilisis ante, vitae lobortis arcu auctor sed.

Integer eget eros fringilla, aliquet purus sit amet, suscipit risus. Aenean non ante at sapien varius commodo. Vivamus egestas neque ac tellus gravida, sed fringilla tortor eleifend. Fusce nulla nisi, gravida ac est a, bibendum porttitor neque. Mauris mattis, nibh et accumsan finibus, nulla ipsum bibendum libero, ac tempus mi sapien vel nunc. In ipsum metus, efficitur at rutrum vehicula, bibendum vitae risus. Maecenas commodo erat nec libero dignissim imperdiet. Nam et sem ut urna convallis sodales. Donec tincidunt feugiat augue, at accumsan enim convallis non. Mauris sagittis tellus eu nulla luctus pellentesque at quis odio.

<hr>
<button type="submit" id="gerarpdg" value="gerarpdg" class="btn btn-default ">Gerar PDF</button>
<button type="submit" id="gerarpdg" value="gerarpdg" class="btn btn-default ">Gerar WORD</button>

<br>
<br>
        </div>

     </div>
</body>
</html>
