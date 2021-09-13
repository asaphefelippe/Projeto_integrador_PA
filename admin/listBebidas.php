<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)

if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/menuBoot.php');
include_once('../inc/banco.php');
//seleciona todas as bebidas que estao no banco de dados
$sql = $pdo->prepare('SELECT * FROM bebidas');

//executa
if ($sql->execute()) {
    //vai no banco de dados e procura:
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);
//busca as informações e mostra para o admin a lista de bebidas retornados na variavel $values
    foreach ($info as $key => $values) {
        echo "<div style='margin-left:300px;'>";
        echo '<div class="echoADM">codigo: ' . utf8_encode($values['codigo']) . '<br>';
        echo 'nome: ' . utf8_encode($values['nome']) . '<br>';
        echo 'preço: ' . utf8_encode($values['preco']) . '<br>';


        echo "<a href='delBebidas.php?id=" . $values['codigo'] . "'>(-)</a>";
        echo "<a href='altBebidas.php?id=" . $values['codigo'] . "'>Alterar</a>";

        echo '<hr>';
        echo '</div>';
        echo "</div>";
    }
}

?>
<style>
    body {
        background-color: #ff006e;
    }
</style>
<div>

    <link rel="stylesheet" href="../assets/css/estilo.css">
</div>