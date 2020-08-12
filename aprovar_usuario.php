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
    <title>Aprovar Usu�rio</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://kit.fontawesome.com/8786c39b09.js"></script>
  </head>

  <body>
    <div class="container" style="margin-top: 40px; width: 1000px">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1>Usu�rios Pendentes de Aprova��o</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="adicionar_ponto.php" role="button" class="btn btn-success">Registrar Ponto</a>
            <a class="nav-item nav-link active" href="menu.php" role="button" class="btn btn-primary" style="margin-left: 25px">Voltar</a>
            <a class="nav-item nav-link active" href="sair.php" role="button" class="btn btn-danger" style="margin-left: 25px">Sair</a>
          </div>
        </div>
      </nav>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nome usu�rio</th>
            <th scope="col">Matr�cula usu�rio</th>
            <th scope="col">N�vel usu�rio</th>
            <th scope="col">Status usu�rio</th>
            <th scope="col">A��o</th>
          </tr>
        </thead>          
          <?php
            include "conexao.php";

            $sql = "SELECT * FROM `usuarios` WHERE status = 'Inativo'";
            $busca = mysqli_query($conn, $sql);

            while ($array = mysqli_fetch_array($busca)){
              $id_usuario = $array['id_usuario'];
              $nome_usuario = $array['nome_usuario'];
              $matricula_usuario = $array['matricula_usuario'];
              $nivel_usuario = $array['nivel_usuario'];
              $status = $array['status'];
          ?>
              <tr>
                <td><?php echo $nome_usuario; ?></td>
                <td><?php echo $matricula_usuario; ?></td>
                <td><?php echo $nivel_usuario; ?></td>
                <td><?php echo $status; ?></td>
                <td>
                  <a class="btn btn-secondary btn-sm" href="_aprovar_usuario.php?id=<?php echo $id_usuario; ?>&nivel=3" 
                    role="button"><i class="fas fa-thumbs-up"></i>&nbsp;Funcion�rio
                  </a>
                  <a class="btn btn-success btn-sm" href="_aprovar_usuario.php?id=<?php echo $id_usuario; ?>&nivel=1" 
                    role="button"><i class="fas fa-thumbs-up"></i>&nbsp;Gerente
                  </a>
                  <a class="btn btn-warning btn-sm" href="_aprovar_usuario.php?id=<?php echo $id_usuario; ?>&nivel=2" 
                    role="button"><i class="fas fa-thumbs-up"></i>&nbsp;Supervisor
                  </a>
                  <a class="btn btn-danger btn-sm" href="_deletar_usuario.php?id=<?php echo $id_usuario; ?>" 
                    role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir
                  </a>
                </td>
      <?php } ?>
              </tr>
      </table>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>    
    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>

</html>


