<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
include_once('../inc/banco.php');


//Pega o url para ver qual o codigo da comida que retorno da pagina listcupons.php 
if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    // puxa o id do cupon
    $sql = $pdo->prepare("SELECT * FROM cupons WHERE codigo='$codigo'");
    if ($sql->execute()) {
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);
        //tras as informações do id do cupon
        foreach ($info as $key => $values) {

            $nome1 =    utf8_encode($values['nome1']);
            $nome2 =    utf8_encode($values['nome2']);
            $nome3 =    utf8_encode($values['nome3']);
            $nome4 =    utf8_encode($values['nome4']);
            $nome5 =    utf8_encode($values['nome5']);
            $nome6 =    utf8_encode($values['nome6']);
            $quantidade1 =  utf8_encode($values['quantidade1']);
            $quantidade2 =  utf8_encode($values['quantidade2']);
            $quantidade3 =  utf8_encode($values['quantidade3']);
            $quantidade4 =  utf8_encode($values['quantidade4']);
            $quantidade5 =  utf8_encode($values['quantidade5']);
            $quantidade6 =  utf8_encode($values['quantidade6']);
            $num_comb = utf8_encode($values['numero_comb']);
            $preco =    utf8_encode($values['preco']);
            $codigo =   utf8_encode($values['codigo']);
            $img =  $values['imagem'];
            $gastarP =  $values['gastarP'];
            $acumulos = $values['acumulos'];
        }
    }
} else {
    $nome1 = "";
    $nome2 = "";
    $nome3 = "";
    $nome4 = "";
    $nome5 = "";
    $nome6 = "";
    $quantidade1 = "";
    $quantidade2 = "";
    $quantidade3 = "";
    $quantidade4 = "";
    $quantidade5 = "";
    $quantidade6 = "";
    $num_comb = "";
    $preco = "";
    $codigo = "";
    $gastarP = "";
    $acumulos = "";
}


// se o botao com o NAME : atualizar for setado entao executa

if (isset($_POST['atualizar'])) {

    if (!empty($_FILES["imagem"]["name"])) {
        echo "TESTER2" . $codigo;
        // Get file info 
        $fileName = basename($_FILES["imagem"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            echo "TESTER3" . $codigo;
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
        }
    }
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    include_once('../inc/banco.php');
    if (!isset($imgContent)) {
        $imgContent = "";
    }
    $numb_comb = $_POST['numb_comb'];
    $nome1 = $_POST['nome1'];
    $nome2 = $_POST['nome2'];
    $nome3 = $_POST['nome3'];
    $nome4 = $_POST['nome4'];
    $nome5 = $_POST['nome5'];
    $nome6 = $_POST['nome6'];
    $quantidade1 = $_POST['quantidade1'];
    $quantidade2 = $_POST['quantidade2'];
    $quantidade3 = $_POST['quantidade3'];
    $quantidade4 = $_POST['quantidade4'];
    $quantidade5 = $_POST['quantidade5'];
    $quantidade6 = $_POST['quantidade6'];
    $preco = $_POST['preco'];
    $acumulos = $_POST['acumulo'];
    $gastarP = $_POST['gastarP'];
    $codigo = $_POST['codigo'];
    echo "TESTER4" . $codigo;
    $sql2 =  $pdo->prepare("UPDATE cupons SET numero_comb='$numb_comb',preco='$preco',acumulo='$acumulos',nome1='$nome1',nome2='$nome2',nome3='$nome3',nome4='$nome4',nome5='$nome5',nome6='$nome6',quantidade1='$quantidade1',quantidade2='$quantidade2',quantidade3='$quantidade3',quantidade4='$quantidade4',quantidade5='$quantidade5',quantidade6='$quantidade6',imagem='$imgContent',gastarP='$gastarP' WHERE codigo ='$codigo'");
    if ($sql2->execute()) {
        echo "CAIU NO EXECUTE";
    }
    if ($sql2->rowCount() > 0) {
        echo 'Dados cadastrado';
    } else {
        echo 'erro ao cadastrar dados';
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
    <?php
    if (!$codigo == "") {
        $disable = "disabled";
    } else {
        $disable = "";
    }

    ?>
    <div class="altUsuario py-5">
        <form action="" method="POST" class="altUsuario2" enctype="multipart/form-data">
            Codigo: <input type="text" name="codigo" <?php $disable ?> value=<?php echo $codigo ?>>
            <input type="text" name="nome1" placeholder="nome1" value=<?php echo $nome1 ?>>
            <input type="text" name="nome2" placeholder="nome2" value=<?php echo $nome2 ?>>
            <input type="text" name="nome3" placeholder="nome3" value=<?php echo $nome3 ?>>
            <input type="text" name="nome4" placeholder="nome4" value=<?php echo $nome4 ?>>
            <input type="text" name="nome5" placeholder="nome5" value=<?php echo $nome5 ?>>
            <input type="text" name="nome6" placeholder="nome6" value=<?php echo $nome6 ?>>
            <input type="text" name="quantidade1" placeholder="quantidade1" value=<?php echo $quantidade1 ?>>
            <input type="text" name="quantidade2" placeholder="quantidade2" value=<?php echo $quantidade2 ?>>
            <input type="text" name="quantidade3" placeholder="quantidade3" value=<?php echo $quantidade3 ?>>
            <input type="text" name="quantidade4" placeholder="quantidade4" value=<?php echo $quantidade4 ?>>
            <input type="text" name="quantidade5" placeholder="quantidade5" value=<?php echo $quantidade5 ?>>
            <input type="text" name="quantidade6" placeholder="quantidade6" value=<?php echo $quantidade6 ?>>
            <input type="text" name="numb_comb" placeholder="numero do combo" value=<?php echo $num_comb ?>>
            <input type="text" name="preco" placeholder="preço" value=<?php echo $preco ?>>
            <input type="text" name="acumulo" placeholder="acumulos" value=<?php echo $acumulos ?>>
            <input type="text" name="gastarP" placeholder="Gastar Pontos" value=<?php echo $gastarP ?>>
            <input type="file" name="imagem">
            <input type="submit" name="atualizar" value="Atualizar">
        </form>
    </div>
</body>

</html>