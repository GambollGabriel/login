<?php 
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8"/> 
    <link rel="shortcut icon" href="favicon.ico" type="image/favicon.ico">
    <title>tela de login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div id="corpo-form">
    <h1>ENTRAR NA X-Geek</h1>
    <form method="POST">
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="Senha" name="senha">
        <input type="submit" value="Acessar">
        <a href="Cadastrar.php">Ainda não é enscrito?<strong>cadastre-se!</strong>
    </form>
</div>
<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    if(!empty($email) && !empty($senha)) 
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->msgErro == "")
        {
          if($u->logar($email,$senha))
          {
             header("location: AreaPrivada.php");
          }
          else
          {
             ?>
             <div class="msg-erro">
               Email e/ou senha estão incorretas!
             </div>
             <?php
          }
        }
      else
      {
         ?>
         <div class="msg-erro">
           <?php echo "Erro: ".$u->msgErro; ?>
         </div>
         <?php 
      }      
    }else
    {  
        ?>
        <div class="msg-erro">
          preencho todos os compos!
        </div>
        <?php
    }
}
?>
</body>
</html>