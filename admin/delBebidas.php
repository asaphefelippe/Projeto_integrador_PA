<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}

include_once('../inc/banco.php');
if(isset($_GET['id'])){
    echo  "<script>alert('Voce realmente quer deletar esse produto?');</script>";
}
if (isset($_GET['id'])) {
    echo  "<script>alert('Voce realmente quer deletar esse produto?');</script>";
    $codigo = $_GET['id'];

    $sql = $pdo->prepare("DELETE FROM bebidas WHERE codigo = $codigo");

    if ($sql->execute(array($codigo))) {
        if ($sql->rowCount() > 0) {
            header('location:listBebidas.php');
        }
    }
}
?>