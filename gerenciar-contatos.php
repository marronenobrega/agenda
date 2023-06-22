<?php
    include_once('config.php');

    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        MySql::deletar('tb_agenda.contatos',$idExcluir);
        MySql::redirect('gerenciar-contatos.php');
    }
?>

<div class="gerenciar-contatos">
    <a href="index.php">Voltar</a>
    
     <table>
        <tr>
            <td>Nome do Cliente</td>
            <td>Email</td>
            <td>Data de Nascimento</td>
            <td>CPF</td>
            <td>Telefone</td>   
            <td>Editar</td>
            <td>Deletar</td>
        </tr>
        <?php
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_agenda.contatos` ORDER BY id DESC");
        $sql->execute();
        $contatos = $sql->fetchAll();

        foreach ($contatos as $key => $value) {

    ?>
        <tr>
            <td> <?php echo $value['nome']; ?></td>
            <td> <?php echo $value['email']; ?></td>
            <td> <?php echo $value['nascimento']; ?></td>
            <td> <?php echo $value['cpf']; ?></td>
            <td> <?php echo $value['telefone']; ?></td>   
            <td><a href="editar.php?id=<?php echo $value['id']; ?>">Editar</td>
            <td><a href="gerenciar-contatos.php?excluir=<?php echo $value['id']; ?>">Deletar</td>

        <?php } ?>     
        </tr>
        <br />
        <br />

           
</div>