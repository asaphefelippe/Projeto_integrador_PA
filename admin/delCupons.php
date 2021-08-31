<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM cupons WHERE codigo = $codigo");

    if ($sql->execute(array($codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'Aluno excluido com sucesso';
            header('location:listCupons.php');
        }
    }
}
