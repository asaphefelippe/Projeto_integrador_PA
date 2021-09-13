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
    //pega o id do item
    $codigo = $_GET['id'];
    //prepara o banco
    $sql = $pdo->prepare("DELETE FROM cupons WHERE codigo = $codigo");
    //executa o PREPAR e deleta

    if ($sql->execute(array($codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'Aluno excluido com sucesso';
            header('location:listCupons.php');
        }
    }
}
