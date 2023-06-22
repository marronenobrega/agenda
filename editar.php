<?php
    session_start();
    include_once('config.php');

    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $pessoa = MySql::select('tb_agenda.contatos','id = ?', array($id));
    }else{
        echo 'Você precisa passar o parametro ID';
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
</head>
<body>
    <section class="box-agenda">
    <form method="post">

        <?php
            if(isset($_POST['acao'])){
                if(MySql::atualizar($_POST)){
                    echo 'O Contato foi atualizado com sucesso! <br /> <br />';
                    $pessoa = MySql::select('tb_agenda.contatos','id = ?', array($id));

                }else{
                    echo 'Campos vázios não são permitidos <br /> <br />';
                    
                }
            }


        ?>



        <input type="text" name="nome" value= "<?php echo $pessoa['nome']; ?>" placeholder="Nome... "> 
        <br />
        <br />
        <input type="email" name="email" value="<?php echo $pessoa['email']; ?>" placeholder="email...">
        <br />
        <br />
        <input id="nasc" type="text" name="nascimento" value="<?php echo $pessoa['nascimento']; ?>" placeholder="Data de Nascimento...">
        <br />
        <br />
        <input id="cpf" type="text" name="cpf" value="<?php echo $pessoa['cpf']; ?>" placeholder="CPF...">
        <br />
        <br />
        <input id="telefone" type="text" name="telefone" value="<?php echo $pessoa['telefone']; ?>" placeholder="Telefone (xx) xxxxx-xxxx">
        <br />
        <br />
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="hidden" name="nome_tabela" value="tb_agenda.contatos"/>
        <input type="submit" name="acao" value="Atualizar">
        <br />
        <br />
   
    </form>
    </section>

    <a href="gerenciar-contatos.php">Gerenciar Contatos</a>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/mask.js"></script>

</body>
</html>