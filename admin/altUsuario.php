    <?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');

$codigo = "";
$acumulos = "";
if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    
}

/*da ultima aula*/
if (isset($_POST['atualizar'])) {
    //$codigo = $_POST['codigo'];
    $codigo = $_GET['id'];
    $acumulo = $_POST['acumulos'];

    $sql = $pdo->prepare("UPDATE alunospa SET codigo=$codigo,acumulo=$acumulo WHERE codigo=$codigo");
    if ($sql->execute(array($codigo, $acumulo, $codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'Dados cadastrado';
            header('location:listUsuario.php');
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

body{
    background-color: #fb5607;
}
</style>
<body>

    <div class="altUsuario py-5">
        <form action="" method="POST" class="altUsuario2">
            Codigo: <input type="text" name="codigo" disabled value= <?php echo $codigo ?> >
            <br />
            Acumulos: <input type="text" name="acumulos" required>
            <br />
            <input type="submit" name="atualizar" value="Atualizar">
        </form>
    </div>
</body>

</html>