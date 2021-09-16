<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)

if (!isset($_SESSION['ADMIN']) || !$_SESSION['ADMIN']) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
//se o botao de NAME: enviar for setado entao executa:

if (isset($_POST['enviar'])) {
    //valores começa setados como zero para nao ter erros caso eles nao sejam setados no formulario

    $values1['acumulos'] = 0;
    $values2['acumulos'] = 0;
    $values3['acumulos'] = 0;
    $values4['acumulos'] = 0;
    $values5['acumulos'] = 0;
    //pega o codigo
    $codigo = $_POST['codigo'];


    //*----------------------------------------->I N F O   A L U N O S<-----------------------------------------
    include_once('../inc/banco.php');
    $pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');
    //prepara o banco para busca as informações do codigo fornecido
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE codigo = '$codigo'");


    if ($sql->execute()) {

        $info = $sql->fetchALL();
        //pega as informações do ID fornecido
        foreach ($info as $key => $values) {
            echo 'acumulos do aluno : ' . $values['acumulo']  . '<br>';
            $nom = $values['nome'];
            $cod = $values['codigo'];
        }
    }
    //* COMIDAAS
    //Pega as informações setadas no formulario informações das comidas
    $comida1 = $_POST['comida1'];
    $comida2 = $_POST['comida2'];
    $comida3 = $_POST['comida3'];
    $comida4 = $_POST['comida4'];
    $comida5 = $_POST['comida5'];
    include_once('../inc/banco.php');
    // prepara o banco para pesquisar os status das comidas.
    $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo IN ('$comida1','$comida2','$comida3', '$comida4','$comida5')");
    // Se o codigo da comida for maior que 100 cai neste if OBS: todas comidas acima de codigo 100 sao cupons
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
    // Se o codigo da comida for maior que 100 cai neste if OBS: todas comidas acima de codigo 100 sao cupons
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
    // Se o codigo da comida for maior que 100 cai neste if OBS: todas comidas acima de codigo 100 sao cupons
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
    // Se o codigo da comida for maior que 100 cai neste if OBS: todas comidas acima de codigo 100 sao cupons
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
    // Se o codigo da comida for maior que 100 cai neste if OBS: todas comidas acima de codigo 100 sao cupons
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
    // caso a comida1 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida1'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida1");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values1) {
            echo 'client vai ganhar ' . $values1['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values1['nome'] . '<br>';
        }
    }
    // caso a comida2 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida2'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida2");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values2) {
            echo 'client vai ganhar ' . $values2['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values2['nome'] . '<br>';
        }
    }
    // caso a comida3 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida3'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida3");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values3) {
            echo 'client vai ganhar ' . $values3['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values3['nome'] . '<br>';
        }
    }
    // caso a comida4 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida4'])) {


        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida4");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values4) {
            echo 'client vai ganhar ' . $values4['acumulos'] . ' pontos por esta comida<br>';
            echo 'Nome : ' . $values4['nome'] . '<br>';
        }
    }
    // caso a comida5 seja setada no formulario entao busca no banco de dados e mostra para o admin
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
//se o botão enviar for setado
if (isset($_POST['enviar'])) {
    // pega o valor de acumulos que o cliente tem e soma pelo valor das comidas inseridas
    $soma = $values['acumulo'] + $values1['acumulos'] + $values2['acumulos'] + $values3['acumulos'] + $values4['acumulos'] + $values5['acumulos'];
    echo '<strong>' . $values['nome'] . ' ficou com ' . $soma . ' pontos</strong>';
    include_once('../inc/banco.php');
    //Pega as informações do cliente e coloca a soma
    $sql = $pdo->prepare("UPDATE clientes SET acumulo=? WHERE codigo=?");
    if ($sql->execute(array($soma, $codigo))) {
        //reseta a pagina em 5segundos
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
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>

</head>

<body id="mundo" class="body">
    <div class="centerADM">
        <Form method="POST" class="formADM">
            <!-- <div class="espaco-adm"> -->
                <input type="text" name="codigo" placeholder="NOME DO CLIENTE" required><br>
                <br>
                <input type="text" name="comida1" placeholder="CODIGO DA COMIDA"><br>
                <input type="text" name="comida2" placeholder="CODIGO DA COMIDA"><br>
                <input type="text" name="comida3" placeholder="CODIGO DA COMIDA"><br>
                <input type="text" name="comida4" placeholder="CODIGO DA COMIDA"><br>
                <input type="text" name="comida5" placeholder="CODIGO DA COMIDA"><br>
                <br>
                <button type="submit" class="btn btn-info email buttonCadastro" name="enviar"> enviar</button>
        </Form>
    </div>
</body>

</html>