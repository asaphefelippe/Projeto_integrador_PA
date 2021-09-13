<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/menuBoot.php');
include_once('../inc/banco.php');
//seleciona todos os usuários que estão no banco de dados
$sql = $pdo->prepare('SELECT * FROM clientes');

//executa
if($sql->execute()){
        //vai no banco de dados e procura:
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);
//busca as informações e mostra para o admin a lista de usuários retornados na variavel $values
    foreach($info as $key => $values){
        echo "<div style='margin-left:300px;'>";
        echo '<div class="echoADM">nome: '.$values['nome'].'<br>';
        echo 'email: '.$values['email'].'<br>';
        echo 'senha: '.$values['senha'].'<br>';
        echo 'acumulos: '.$values['acumulo'].'<br>';
        echo 'Codigo: '.$values['codigo'].'<br>';
        echo 'Is_Admin: '.$values['is_admin'].'<br></div>';

        echo "<a href='delUsuario.php?id=".$values['codigo']."'>(-)</a>";
        echo "<a href='altUsuario.php?id=".$values['codigo']."'>Alterar</a>";
        
        echo '<hr style="color:blue">';
        echo "</div>";
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