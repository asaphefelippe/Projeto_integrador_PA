<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');

$codigo = "";

//Pega o url para ver qual o codigo da comida que retorno da pagina listbebidas.php
if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
}
// se o botao com o NAME : atualizar for setado entao executa
if (isset($_POST['atualizar'])) {

    // pega o nome e o preço que foi inserido no formulario
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    //prepara o banco para fazer as alterações setadas no formulario
    $sql = $pdo->prepare("UPDATE bebidas SET codigo=$codigo,nome=$nome,preco=$preco WHERE codigo=$codigo");
    // executa
    if ($sql->execute(array($codigo, $nome, $preco, $codigo))) {
        // testa para ver se alguma linha foi afetada e retorna para o admin se os dados foram ou NÃO cadastrados       
        if ($sql->rowCount() > 0) {
            echo 'Dados cadastrado';
        } else {
            echo 'erro ao cadastrar dados';
        }
    }
}
include_once('../inc/menuBoot.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar registros</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<style>
    body {
        background-color: #fb5607;
    }
</style>

<body>
    <div class="centerADM">
        <form action="" method="POST" class="formADM">
            Codigo: <input type="text" name="codigo" disabled value=<?php echo $codigo ?>>
            <br />
            NOME: <input type="text" name="nome" required>
            <br />
            PREÇO: <input type="text" name="preco" required>
            <input type="submit" name="atualizar" value="Atualizar">
        </form>
    </div>
</body>

</html>