<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');

$sql = $pdo->prepare('SELECT * FROM comidas');


if($sql->execute()){
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach($info as $key => $values){
        echo '<div class="echoADM">codigo: '. utf8_encode($values['codigo']).'<br>';
        echo 'nome: '. utf8_encode($values['nome']).'<br>';
        echo 'acumulos dados: '. utf8_encode($values['acumulos']).'<br>';
        echo 'Gastar pontos: '. utf8_encode($values['gastarP']).'<br> </div>';

        echo "<a href='delComida.php?id=".$values['codigo']."'>(-)</a>";
        echo "<a href='altComida.php?id=".$values['codigo']."'>Alterar</a>";
        
        echo '<hr>';
    }

}
include_once('../inc/menuBoot.php');
?>
<style>
body{
    background-color:#ff006e; 
}
</style>
<div>

<link rel="stylesheet" href="../assets/css/estilo.css">
</div>
