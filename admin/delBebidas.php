<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}

include_once('../inc/banco.php');
//pega o id retornado da pagina listbebidas.php
if (isset($_GET['id'])) {
    //aparece um alerta na tela perguntando se tem certeza que deseja deletar o item
    echo  "<script>alert('Voce realmente quer deletar esse produto?');</script>";
    //pega o id do item
    $codigo = $_GET['id'];
    //prepara o banco
    $sql = $pdo->prepare("DELETE FROM bebidas WHERE codigo = $codigo");
    //executa o PREPAR e deleta
    if ($sql->execute(array($codigo))) {
        if ($sql->rowCount() > 0) {
            header('location:listBebidas.php');
        }
    }
}
