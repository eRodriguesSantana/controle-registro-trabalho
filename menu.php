<?php
session_start();

// Se o usuário não estiver logado e tentar acessar a página diretamente pela url
// o mesmo será redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$sql = "SELECT nivel_usuario FROM usuarios WHERE matricula_usuario = $matricula and status='Ativo'";
$buscar = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($buscar);
$nivel = $arr['nivel_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR"> 
  <head>
    <meta charset="utf-8">
    <title>Opções</title>
    <link rel="stylesheet" href="css/bootstrap.css">   
  </head>

  <body>
    <div class="container" style="margin-top: 100px">
      <div class="row">       
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adicionar Registro de Ponto</h5>
              <p class="card-text">Opção para gravar marcações diárias dentro do expediente de trabalho.</p>
              <!--<a href="adicionar_ponto.php?mat=<?php echo $matricula; ?>" class="btn btn-primary">Adicionar Registro</a>-->
              <a href="adicionar_ponto.php" class="btn btn-primary">Adicionar Registro</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listar Registros de Pontos</h5>
              <p class="card-text">Opção para visualizar, editar e excluir registros cadastrados por este usuário.</p>
              <a href="listar_pontos.php" class="btn btn-primary">Listar Registros</a>
            </div>
          </div>
        </div>
         <?php
          if(($nivel == 1) || $nivel == 2){
        ?>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aprovar Usuários</h5>
              <p class="card-text">Aprovar usuários cadastrados.</p>
              <a href="aprovar_usuario.php" class="btn btn-primary">Aprovar Usuários</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar/Excluir Ponto</h5>
              <p class="card-text">Alteraração ou exclusão de pontos de funcionários.</p>
              <a href="listar_pontos_funcionarios.php" class="btn btn-primary">Pontos de Funcionários</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adicionar Usuário</h5>
              <p class="card-text">Opção para adicionar usuário com permissão já incluída e com cadastro sem necessidade de aprovação.</p>
              <a href="cadastro_usuario.php" class="btn btn-primary">Adicionar Usuário</a>
            </div>
          </div>
        </div>
          <?php } ?>        
      </div>      
    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>