<?php
session_start();
/*die() Nao deixa executa oque ta em baixo dele*/
if (!isset($_SESSION['ADMIN']) || !$_SESSION['ADMIN']) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
if (isset($_POST['enviar'])) {
    $values1['acumulos'] = 0;
    $values2['acumulos'] = 0;
    $values3['acumulos'] = 0;
    $values4['acumulos'] = 0;
    $values5['acumulos'] = 0;
    $codigo = $_POST['codigo'];


    //*Infos aluno
    include_once('../inc/banco.php');
    $pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');

    $sql = $pdo->prepare("SELECT * FROM alunospa WHERE codigo = '$codigo'");


    if ($sql->execute()) {

        $info = $sql->fetchALL();

        foreach ($info as $key => $values) {
            echo 'acumulos do aluno ' . $values['acumulo']  . '<br>';
            $nom = $values['nome'];
            $cod = $values['codigo'];
        }
    }
    //* COMIDAAS

    $comida1 = $_POST['comida1'];
    $comida2 = $_POST['comida2'];
    $comida3 = $_POST['comida3'];
    $comida4 = $_POST['comida4'];
    $comida5 = $_POST['comida5'];
    include_once('../inc/banco.php');

    $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo IN ('$comida1','$comida2','$comida3', '$comida4','$comida5')");

    if (isset($_POST['comida1'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida1");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values1) {
            echo $values1['acumulos'];
            echo 'Nome : ' . $values1['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida2'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida2");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values2) {
            echo $values2['acumulos'];
            echo 'Nome : ' . $values2['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida3'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida3");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values3) {
            echo $values3['acumulos'];
            echo 'Nome : ' . $values3['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida4'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida4");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values4) {
            echo $values4['acumulos'];
            echo 'Nome : ' . $values4['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida5'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida5");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values5) {
            echo $values5['acumulos'];
            echo 'Nome : ' . $values5['nome'] . '<br>';
        }
    }
}
if (isset($_POST['enviar'])) {
    $soma = $values['acumulo'] + $values1['acumulos'] + $values2['acumulos'] + $values3['acumulos'] + $values4['acumulos'] + $values5['acumulos'];
    echo $soma;
    include_once('../inc/banco.php');

    $sql = $pdo->prepare("UPDATE alunospa SET acumulo=? WHERE codigo=?");
    if ($sql->execute(array($soma, $codigo))) {
        header("Refresh:3");
    } else {
        echo 'Dados não cadastrado';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
<<<<<<< HEAD

</head>
<body>
    <Form method="POST">
=======
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <h1 class="h1Login">tela login</h1>
    <div class="adm2">
    <Form method="POST" class="adm py-5">
>>>>>>> 191c817c0c9c3f9cca7f41c7baf57831cfccc88d
        <input type="text" name="codigo" placeholder="NOME DO CLIENTE"><br>
        <br>
        <input type="text" name="comida1" placeholder="CODIGO DA COMIDA"><br>
        <input type="text" name="comida2" placeholder="CODIGO DA COMIDA"><br>
        <input type="text" name="comida3" placeholder="CODIGO DA COMIDA"><br>
        <input type="text" name="comida4" placeholder="CODIGO DA COMIDA"><br>
        <input type="text" name="comida5" placeholder="CODIGO DA COMIDA"><br>
        <br>
        <button type="submit" class="btn btn-info botao" name="enviar"> enviar</button>
        <!--<input type="submit" value="enviar" name="enviar" class="botao"> -->
    </Form>
<<<<<<< HEAD
=======
    </div>
</head>

<body>

>>>>>>> 191c817c0c9c3f9cca7f41c7baf57831cfccc88d
</body>

</html>