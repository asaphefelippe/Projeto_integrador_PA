<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');

$sql = $pdo->prepare('SELECT * FROM alunospa');


if($sql->execute()){
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach($info as $key => $values){
        echo '<div class="echoADM">nome: '.$values['nome'].'<br>';
        echo 'email: '.$values['email'].'<br>';
        echo 'senha: '.$values['senha'].'<br>';
        echo 'acumulos: '.$values['acumulo'].'<br>';
        echo 'Codigo: '.$values['codigo'].'<br>';
        echo 'Is_Admin: '.$values['is_admin'].'<br></div>';

        echo "<a href='delUsuario.php?id=".$values['codigo']."'>(-)</a>";
        echo "<a href='altUsuario.php?id=".$values['codigo']."'>Alterar</a>";
        
        echo '<hr style="color:blue">';
    }

}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<style>

body{
    background-color:#ff006e;
}

</style>
<body>
</body>

</html>