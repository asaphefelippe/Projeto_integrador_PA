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

    $sql = $pdo->prepare("SELECT * FROM clientes WHERE codigo = '$codigo'");


    if ($sql->execute()) {

        $info = $sql->fetchALL();

        foreach ($info as $key => $values) {
            echo 'acumulos do aluno : ' . $values['acumulo']  . '<br>';
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
    if ($comida1 > 100) {
        if (isset($_POST['comida1'])) {
            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida1");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values1) {
                echo 'Combo numero : ' . $values1['numero_comb'] . ' client vai ganha ' . $values1['acumulos'] . ' pontos por este combo <br>';
                echo '<strong>Nele sera incluindo : </strong><br>';
                echo 'Nome1 : ' . $values1['nome1'] . '<br>';
                echo 'Nome2 : ' . $values1['nome2'] . '<br>';
                echo 'Nome3 : ' . $values1['nome3'] . '<br>';
                echo 'Nome4 : ' . $values1['nome4'] . '<br>';
                echo 'Nome5 : ' . $values1['nome5'] . '<br>';
                echo 'Nome6 : ' . $values1['nome6'] . '<br>';

            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida2'])) {


            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida2");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values2) {
                echo 'Combo numero : ' . $values2['numero_comb'] . ' client vai ganha ' . $values2['acumulos'] . ' pontos por este combo <br>';
                echo '<strong>Nele sera incluindo : </strong><br>';
                echo 'Nome1 : ' . $values2['nome1'] . '<br>';
                echo 'Nome2 : ' . $values2['nome2'] . '<br>';
                echo 'Nome3 : ' . $values2['nome3'] . '<br>';
                echo 'Nome4 : ' . $values2['nome4'] . '<br>';
                echo 'Nome5 : ' . $values2['nome5'] . '<br>';
                echo 'Nome6 : ' . $values2['nome6'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida3'])) {


            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida3");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values3) {
                echo 'Combo numero : ' . $values3['numero_comb'] . ' client vai ganha ' . $values3['acumulos'] . ' pontos por este combo <br>';
                echo '<strong>Nele sera incluindo : </strong><br>';
                echo 'Nome1 : ' . $values3['nome1'] . '<br>';
                echo 'Nome2 : ' . $values3['nome2'] . '<br>';
                echo 'Nome3 : ' . $values3['nome3'] . '<br>';
                echo 'Nome4 : ' . $values3['nome4'] . '<br>';
                echo 'Nome5 : ' . $values3['nome5'] . '<br>';
                echo 'Nome6 : ' . $values3['nome6'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida4'])) {


            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida4");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values4) {
                echo 'Combo numero : ' . $values4['numero_comb'] . ' client vai ganha ' . $values4['acumulos'] . ' pontos por este combo <br>';
                echo '<strong>Nele sera incluindo : </strong><br>';
                echo 'Nome1 : ' . $values4['nome1'] . '<br>';
                echo 'Nome2 : ' . $values4['nome2'] . '<br>';
                echo 'Nome3 : ' . $values4['nome3'] . '<br>';
                echo 'Nome4 : ' . $values4['nome4'] . '<br>';
                echo 'Nome5 : ' . $values4['nome5'] . '<br>';
                echo 'Nome6 : ' . $values4['nome6'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida5'])) {


            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida5");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values5) {
                echo 'Combo numero : ' . $values5['numero_comb'] . ' client vai ganhar ' . $values5['acumulos'] . ' pontos por este combo <br>';
                echo '<strong>Nele sera incluindo : </strong><br>';
                echo 'Nome1 : ' . $values5['nome1'] . '<br>';
                echo 'Nome2 : ' . $values5['nome2'] . '<br>';
                echo 'Nome3 : ' . $values5['nome3'] . '<br>';
                echo 'Nome4 : ' . $values5['nome4'] . '<br>';
                echo 'Nome5 : ' . $values5['nome5'] . '<br>';
                echo 'Nome6 : ' . $values5['nome6'] . '<br>';
            }
        }
    }
    if (isset($_POST['comida1'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida1");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values1) {
            echo 'client vai ganhar ' . $values1['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values1['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida2'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida2");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values2) {
            echo 'client vai ganhar ' . $values2['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values2['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida3'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida3");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values3) {
            echo 'client vai ganhar ' . $values3['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values3['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida4'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida4");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values4) {
            echo 'client vai ganhar ' . $values4['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values4['nome'] . '<br>';
        }
    }
    if (isset($_POST['comida5'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida5");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values5) {
            echo 'client vai ganhar ' . $values5['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values5['nome'] . '<br>';
        }
    }
}
if (isset($_POST['enviar'])) {
    $soma = $values['acumulo'] + $values1['acumulos'] + $values2['acumulos'] + $values3['acumulos'] + $values4['acumulos'] + $values5['acumulos'];
    echo '<strong>' . $values['nome'] . ' ficou com ' . $soma . ' pontos</strong>';
    include_once('../inc/banco.php');

    $sql = $pdo->prepare("UPDATE clientes SET acumulo=? WHERE codigo=?");
    if ($sql->execute(array($soma, $codigo))) {
        header("Refresh:5");
    } else {
        echo 'Dados não cadastrado';
    }
}
include_once('../inc/menuBoot.php');
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>

</head>

<body>
    <Form method="POST">
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
</body>

</html>