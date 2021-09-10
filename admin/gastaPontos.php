<?php
session_start();
/*die() Nao deixa executa oque ta em baixo dele*/
if (!isset($_SESSION['ADMIN']) || !$_SESSION['ADMIN']) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
if (isset($_POST['enviar'])) {
    $values1['gastarP'] = 0;
    $values2['gastarP'] = 0;
    $values3['gastarP'] = 0;
    $values4['gastarP'] = 0;
    $values5['gastarP'] = 0;

    $codigo = $_POST['codigo'];
    //*Infos aluno
    include_once('../inc/banco.php');
    $pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');

    $sql = $pdo->prepare("SELECT * FROM clientes WHERE codigo = '$codigo'");

    if ($sql->execute()) {
        $info = $sql->fetchALL();
        foreach ($info as $key => $values) {
            $acu = $values['acumulo'];
            $nom = $values['nome'];
            $cod = $values['codigo'];
            echo 'O aluno(a) ' . $values['nome'] . ' tem ' . $values['acumulo'] . ' pontos acumulados.<br>';
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
                echo 'Este cupom custa ' . $values1['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values1['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values1['nome2'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida2'])) {
            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida2");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values2) {
                echo 'Este cupom custa ' . $values2['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values2['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values2['nome2'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida3'])) {
            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida3");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values3) {
                echo 'Este cupom custa ' . $values3['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values3['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values3['nome2'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida4'])) {
            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida4");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values4) {
                'Este cupom custa ' . $values4['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values4['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values4['nome2'] . '<br>';
            }
        }
    }
    if ($comida1 > 100) {
        if (isset($_POST['comida5'])) {
            $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo = $comida5");
            $sql->execute();
            $info = $sql->fetchAll();
            foreach ($info as $key => $values5) {
                'Este cupom custa ' . $values5['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values5['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values5['nome2'] . '<br>';
            }
        }
    }
    if (isset($_POST['comida1'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida1");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values1) {
            echo '    O cliente está comprando ' . $values1['nome'] . ' e perderá: ' . $values1['gastarP'] . 'pontos<br>';
        }
    }
    if (isset($_POST['comida2'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida2");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values2) {
            echo '   O cliente está comprando ' . $values2['nome'] . ' e perderá: ' . $values2['gastarP'] . 'pontos<br>';
        }
    }
    if (isset($_POST['comida3'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida3");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values3) {
            '   O cliente está comprando ' . $values3['nome'] . ' e perderá: ' . $values3['gastarP'] . 'pontos<br>';
        }
    }
    if (isset($_POST['comida4'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida4");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values4) {
            echo '     O cliente está comprando' . $values4['nome'] . ' e perderá: ' . $values4['gastarP'] . 'pontos<br>';
        }
    }
    if (isset($_POST['comida5'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida5");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values5) {
            echo '   O cliente está comprando' . $values5['nome'] . ' e perderá: ' . $values5['gastarP'];
            echo 'Nome : ' . $values5['nome'] . '<br>';
        }
    }
    $soma =  $values['acumulo'] - $values1['gastarP'] - $values2['gastarP'] - $values3['gastarP'] - $values4['gastarP'] - $values5['gastarP'];

    if (isset($soma)) {
        echo '   cliente ' . $values['nome'] . ' ficou com : ' . $soma . ' pontos<br>';
    }
    include_once('../inc/banco.php');

    if ($soma >= 0) {
        echo '<strong style="color: green;">dados cadastrados</strong>';
        $sql = $pdo->prepare("UPDATE cliente SET acumulo=? WHERE codigo=?");
        if ($sql->execute(array($soma, $codigo))) {
            header("Refresh:3");
        }
    } else {
        echo '<strong style="color: red;">Pontos Insuficiente</strong>';
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
    </Form>
</body>
</html>