<?php
session_start();
/*die() Nao deixa executa oque ta em baixo dele*/
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)

if (!isset($_SESSION['ADMIN']) || !$_SESSION['ADMIN']) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
//se o botao de NAME: enviar for setado entao executa:
if (isset($_POST['enviar'])) {
    //valores começa setados como zero para nao ter erros caso eles nao sejam setados no formulario
    $values1['gastarP'] = 0;
    $values2['gastarP'] = 0;
    $values3['gastarP'] = 0;
    $values4['gastarP'] = 0;
    $values5['gastarP'] = 0;
    //pega o codigo
    $codigo = $_POST['codigo'];
    //*----------------------------------------->I N F O   A L U N O S<-----------------------------------------
    include_once('../inc/banco.php');
    // $pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');
    //prepara o banco para busca as informações do codigo fornecido
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE codigo = '$codigo'");
    if ($sql->execute()) {
        $info = $sql->fetchALL();
        //pega as informações do ID fornecido
        foreach ($info as $key => $values) {
            $acu = $values['acumulo'];
            $nom = $values['nome'];
            $cod = $values['codigo'];
            echo 'O aluno(a) ' . $values['nome'] . ' tem ' . $values['acumulo'] . ' pontos acumulados.<br>';
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
                echo 'Este cupom custa ' . $values1['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values1['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values1['nome2'] . '<br>';
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
                echo 'Este cupom custa ' . $values2['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values2['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values2['nome2'] . '<br>';
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
                echo 'Este cupom custa ' . $values3['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values3['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values3['nome2'] . '<br>';
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
                'Este cupom custa ' . $values4['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values4['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values4['nome2'] . '<br>';
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
                'Este cupom custa ' . $values5['gastarP'] . ' pontos<br>';
                echo '<strong> Nele contem : <br></strong>';
                echo 'Nome do produto1 : ' . $values5['nome1'] . '<br>';
                echo 'Nome do produto2 : ' . $values5['nome2'] . '<br>';
            }
        }
    }
    // caso a comida1 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida1'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida1");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values1) {
            echo '    O cliente está comprando ' . $values1['nome'] . ' e perderá: ' . $values1['gastarP'] . 'pontos<br>';
        }
    }
    // caso a comida2 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida2'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida2");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values2) {
            echo '   O cliente está comprando ' . $values2['nome'] . ' e perderá: ' . $values2['gastarP'] . 'pontos<br>';
        }
    }
    // caso a comida3 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida3'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida3");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values3) {
            '   O cliente está comprando ' . $values3['nome'] . ' e perderá: ' . $values3['gastarP'] . 'pontos<br>';
        }
    }
    // caso a comida4 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida4'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida4");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values4) {
            echo '     O cliente está comprando' . $values4['nome'] . ' e perderá: ' . $values4['gastarP'] . 'pontos<br>';
        }
    }
    // caso a comida5 seja setada no formulario entao busca no banco de dados e mostra para o admin
    if (isset($_POST['comida5'])) {
        $sql = $pdo->prepare("SELECT * FROM comidas WHERE codigo = $comida5");
        $sql->execute();
        $info = $sql->fetchAll();
        foreach ($info as $key => $values5) {
            echo '   O cliente está comprando' . $values5['nome'] . ' e perderá: ' . $values5['gastarP'];
            echo 'Nome : ' . $values5['nome'] . '<br>';
        }
    }
    // pega o valor de acumulos que o cliente tem e subtrai pelo valor das comidas inseridas
    $soma =  $values['acumulo'] - $values1['gastarP'] - $values2['gastarP'] - $values3['gastarP'] - $values4['gastarP'] - $values5['gastarP'];
    // caso soma seja setado então mostra isso para o adm
    if (isset($soma)) {
        echo '   cliente ' . $values['nome'] . ' ficou com : ' . $soma . ' pontos<br>';
    }
    include_once('../inc/banco.php');
    // verifica se o cliente tem pontos suficientes
    if ($soma >= 0) {
        echo '<strong style="color: green;">dados cadastrados</strong>';
        //prepara o banco para alterar o valor de pontos na conta do cliente
        $sql = $pdo->prepare("UPDATE cliente SET acumulo=? WHERE codigo=?");
        //executa
        if ($sql->execute(array($soma, $codigo))) {
            //reseta a pagina em 3segundos
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
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Document</title>
</head>

<body id="mundo" class="body">
    <div class="centerADM">
        <Form method="POST" class="formADM">
            <input type="text" name="codigo" placeholder="NOME DO CLIENTE" required><br>
            <br>
            <input type="text" name="comida1" placeholder="CODIGO DA COMIDA"><br>
            <input type="text" name="comida2" placeholder="CODIGO DA COMIDA"><br>
            <input type="text" name="comida3" placeholder="CODIGO DA COMIDA"><br>
            <input type="text" name="comida4" placeholder="CODIGO DA COMIDA"><br>
            <input type="text" name="comida5" placeholder="CODIGO DA COMIDA"><br>
            <br>
            <button type="submit" class="btn btn-info email buttonCadastro" name="enviar"> enviar</button>
    </div>
    </Form>
</body>

</html>