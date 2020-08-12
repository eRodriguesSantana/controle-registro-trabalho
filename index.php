<!DOCTYPE html>
<html lang="pt-BR"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>Acesso ao Registro de Ponto</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
      #tamanho{
        width: 350px;
      }
    </style>
  </head>

  <body>
    <div class="container" id="tamanho" style="margin-top: 100px; border-radius: 20px; border: 2px solid #f3f3f3">
      <div style="padding: 15px">
        <center>
          <img src="img/finger_digital.png" width="100px" height="100px">
        </center>
        <form action="index1.php" method="post">
          <div class="form-group">
            <label>Matricula</label>
            <input type="number" name="matricula" class="form-control" 
                   placeholder="Informe sua matr�cula"
                   autocomplete="off"
                   required="required">
          </div>
        
          <div style="text-align: right">
            <button type="submit" class="btn btn-sm btn-success">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  <center>
      <div style="margin-top: 10px">
        <p>Voc� n�o possui cadastro? Clique <a href="cadastro_usuario_externo.php">aqui</a></p>
      </div>
  </center>
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>
