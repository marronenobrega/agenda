<?php 
    include_once('config.php');
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nascimento = $_POST['nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        if($nome == ''){
            echo 'O nome está vázio!';
        }else if($email == ''){
            echo 'O email está vázio!';
        }else if($nascimento == ''){
            echo 'A data de nascimento está vázia!';
        }else if($cpf == ''){
            echo 'O CPF está vázio!';
        }else if($telefone == ''){
            echo 'O telefone está vázio!';
        }else{
            $sql = \MySql::conectar()->prepare("INSERT INTO `tb_agenda.contatos` VALUES (null,?,?,?,?,?)");
					$sql->execute(array($nome,$email,$nascimento,$cpf,$telefone));
                     echo 'Contato Cadastrado com Sucesso';
            }    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <section class="box-agenda">
    <form method="post">
        <input type="text" name="nome" placeholder="Nome...">
        <br />
        <br />
        <input type="email" name="email" placeholder="E-mail...">
        <br />
        <br />
        <input id="nasc" type="text" name="nascimento" placeholder="Data de Nascimento...">
        <br />
        <br />
        <input id="cpf" type="text" name="cpf" placeholder="CPF...">
        <br />
        <br />
        <input id="telefone" type="text" name="telefone" placeholder="Telefone (xx) xxxxx-xxxx">
        <br />
        <br />
        <input type="submit" name="acao" value="cadastrar">
    </form>
    </section>

    <a href="gerenciar-contatos.php">Visualizar Contatos</a>
    
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/mask.js"></script>


</body>
</html>