<!DOCTYPE html>
<html lang="pt-BR"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <title>Cadastro de Usu�rio</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>

  <body>
    <div class="container" style="width: 400px; margin-top: 40px">
      
      <div style="text-align: right">
        <a href="index.php" role="button" class="btn btn-success btn-sm" style="margin-left: 25px">Voltar</a>
      </div>
      
      <br>
      
      <h1><strong>Cadastrar Usu�rio</strong></h1>
      
      
      <form action="inserir_usuario_externo.php" method="post">
        <div class="form-group">
          <label>Nome Usu�rio</label>
          <input type="text" name="nomeusuario" class="form-control" required="required" 
                 autocomplete="off"
                 placeholder="Nome completo do usu�rio">
        </div>
        <div class="form-group">
          <label>Matr�cula Usu�rio</label>
          <input type="text" name="matriculausuario" class="form-control" required="required" 
                 autocomplete="off"
                 placeholder="Matr�cula do usu�rio">
        </div>
        
        <div style="text-align: right">
          <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
    
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>

