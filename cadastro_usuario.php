<?php
session_start();

// Se o usu�rio n�o estiver logado e tentar acessar a p�gina diretamente pela url
// o mesmo ser� redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula']; 
?>

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
        <a href="menu.php" role="button" class="btn btn-success btn-sm" style="margin-left: 25px">Voltar</a>
      </div>
      
      <br>
      
      <h1><strong>Cadastrar Usu�rio</strong></h1>
      
      <form action="inserir_usuario.php" method="post">
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
        <div class="form-group">
          <label>N�vel de acesso</label>
          <select name="nivelUsuario" class="form-control">
            <option value="3">Funcion�rio</option>
            <option value="1">Gerente</option>
            <option value="2">Supervisor</option>
          </select>
        </div>
        <div style="text-align: right">
          <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
        </div>
      </form>
    </div>
    
    
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>
