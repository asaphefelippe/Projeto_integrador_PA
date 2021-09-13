<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<style>
    body {
        background-color: #ff006e;
    }
</style>
<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/menuBoot.php');
include_once('../inc/banco.php');

$sql = $pdo->prepare('SELECT * FROM cupons');


if ($sql->execute()) {
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach ($info as $key => $values) {
        echo "<div style='margin-left:300px;'>";
        echo '<br>';
        echo 'Codigo: ' . $values['codigo'] . '<br>';
        echo 'Numero Do Combo: ' . $values['numero_comb'] . '<br>';
        echo '<div class="echoADM">nome1: ' . $values['nome1'] . '<br></div>';
        echo '<div class="echoADM">nome2: ' . $values['nome2'] . '<br></div>';
        echo '<div class="echoADM">nome3: ' . $values['nome3'] . '<br></div>';
        echo '<div class="echoADM">nome4: ' . $values['nome4'] . '<br></div>';
        echo '<div class="echoADM">nome5: ' . $values['nome5'] . '<br></div>';
        echo '<div class="echoADM">nome6: ' . $values['nome6'] . '<br></div>';
        echo '<div class="echoADM">quantidade1: ' . $values['quantidade1'] . '<br></div>';
        echo '<div class="echoADM">quantidade2: ' . $values['quantidade2'] . '<br></div>';
        echo '<div class="echoADM">quantidade3: ' . $values['quantidade3'] . '<br></div>';
        echo '<div class="echoADM">quantidade4: ' . $values['quantidade4'] . '<br></div>';
        echo '<div class="echoADM">quantidade5: ' . $values['quantidade5'] . '<br></div>';
        echo '<div class="echoADM">quantidade6: ' . $values['quantidade6'] . '<br></div>';
        echo '<div class="echoADM">preço: ' . $values['preco'] . '<br></div>';
        echo 'acumulos: ' . $values['acumulo'] . '<br>';
        echo 'Gastar Pontos: ' . $values['gastarP'] . '<br></div>';
        echo "<a href='delCupons.php?id=" . $values['codigo'] . "'>(-)</a>";
        echo "<a href='altCupons.php?id=" . $values['codigo'] . "'>Alterar</a>";

        echo '<hr style="color:blue">';
        echo "</div>";
    }
}


?>