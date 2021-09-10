<?php
include_once(dirname(__FILE__) . '/../inc/header.php');
include_once(dirname(__FILE__) . '/../inc/banco.php');

$idProd = isset($_GET['idProduto']) ? $_GET['idProduto'] : false;
$idBebida = isset($_GET['idBebida']) ? $_GET['idBebida'] : false;


// -----------------------------------------> COMIDAS <-----------------------------------------
if ($idProd) {
    $codigo = $_GET['idProduto'];
    $sql = "SELECT * FROM comidas WHERE codigo = '$codigo'";

    $prepar = $pdo->prepare($sql);

    $prepar->execute();

    foreach ($pdo->query($sql) as $produto) {
        $comida = utf8_encode($produto['nome']);
        $preco = utf8_encode($produto['preco']);
        $imagem = utf8_encode($produto['imagem']);
        $cod = utf8_encode($produto['codigo']);
        $pontos = $produto['acumulos'];
        $imagem = '<img src="data:image/png;base64,' . base64_encode($produto['imagem']) . '">';
        $pts = "pts";
        if (!$_SESSION['logado']) {
            $pts = "";
            $pontos = "";
        }
    }
}

// -----------------------------------------> BEBIDAS <-----------------------------------------
if ($idBebida) {
    $codigo = $_GET['idBebida'];

    $sql = "SELECT * FROM bebidas WHERE codigo = '$codigo'";

    $prepar = $pdo->prepare($sql);

    $prepar->execute();

    foreach ($pdo->query($sql) as $produto) {
        $comida = utf8_encode($produto['nome']);
        $preco = utf8_encode($produto['preco']);
        $imagem = utf8_encode($produto['imagem']);
        $cod = utf8_encode($produto['codigo']);
        if (@$pontos == "") {
            $pontos = "";
            $pts = "";
        }


        $imagem = '<img class= "tamanho" src="data:image/png;base64,' . base64_encode($produto['imagem']) . '">';
    }
}

//$pts = "pts";



?>
<a href="cardapio.php" class="letraMenu"> voltar</a>
<style>
    body {
        background-color: #fb5607;
    }
</style>

<div class="laranja d-flex p-5 align-items-center align-center justify-content-center">
    <div class=" telaDeCompraPontos text-black text-center shadow-lg p-5">
        <h1><?php echo "<span class='  position-relative' > $comida <span class='pontos2'>$pontos $pts</span> </span> " ?></h1>
        <?php echo $imagem ?>
        <?php if ($_SESSION['logado']) {
            echo "<p> codigo: <?php echo  $cod ?> </p>";
        } ?>
    </div>

</div>