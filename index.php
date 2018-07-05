<!DOCTYPE html>
<html lang="en">
<head>
    <title>CamProjetc - Projetos de Segurança</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>CamProject</h2>
    <h3>Dimensionamento de Projetos de Segurança</h3>
    <span>Descubra qual o projeto de câmeras ideial para seu estabelecimento.</span>
    <hr>

    <br/ >
    <form class="form-horizontal" action="/action_page.php">
        <div class="form-group">
            <label class="control-label col-sm-3" for="largura">Largura (metros):</label>
            <div class="col-sm-1">
                <input type="largura" class="form-control number" id="largura" placeholder="0,00" name="largura">
            </div>
            <label class="control-label col-sm-3" for="largura">Comprimento (metros):</label>
            <div class="col-sm-1">
                <input type="comprimento" class="form-control number" id="comprimento" placeholder="0,00" name="comprimento">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="grau-reconhecimento">Grau de Reconhecimento:</label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Detecção</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">???????</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Identificação</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Reconhecimento</label>
                </div>
            </div>
        </div>


      <br/ >
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo">Tipo de Câmera:</label>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">IP</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Analógica</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo">Carcterísticas:</label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Detecção de Movimento:</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Detecção de Face</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Reconhecimento Facial</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Reconhecimento de Placa</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Cerca Virtual</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Linha Virtual</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Abandono de Objeto</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tipo"></label>
            <div class="col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Retirada de Objeto</label>
                </div>
            </div>
        </div>

<br>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" class="btn btn-default">Dimensionar Projeto</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>