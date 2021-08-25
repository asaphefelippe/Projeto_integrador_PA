<?php
session_start();
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

$pts = "pts";
?>


<div class="laranja">
    <div class="login container">
        <div class="login2 row">
            <div class="login3 col-4">
                <h1><?php echo "<div class='comida'> $comida <div class='pontos2'>$pontos$pts </div> </div> " ?></h1>
                <?php echo $imagem ?>
                <p class="codigo"> codigo: <?php echo  $cod ?> </p>
            </div>
        </div>
    </div>

    </body>

    </html>