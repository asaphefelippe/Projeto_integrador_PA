<?php
include_once(dirname(__FILE__) . '/../inc/header.php');
include_once(dirname(__FILE__) . '/../inc/banco.php');
// identifica qual variavel foi setada e é armazenada em outra variavel
$idProd = isset($_GET['idProduto']) ? $_GET['idProduto'] : false;
$idBebida = isset($_GET['idBebida']) ? $_GET['idBebida'] : false;

$email = $_SESSION['email'];

$cliente="SELECT * FROM clientes WHERE email='$email'";

$informacoes = $pdo->query($cliente);

foreach($pdo->query($cliente) as $informacoesF)
// -----------------------------------------> COMIDAS <-----------------------------------------
// caso a variavel idProduto seja setada então executa
if ($idProd) {
    //pega o id que veio da pagina cardapio
    $codigo = $_GET['idProduto'];
    //pesquisa no banco qual comida é 
    $sql = "SELECT * FROM comidas WHERE codigo = '$codigo'";

    $prepar = $pdo->prepare($sql);
    //executa
    $prepar->execute();
    //pesquisa no banco de dados e tras as informações 
    foreach ($pdo->query($sql) as $produto) {
        //armazena os resultados em variaveis
        $comida = utf8_encode($produto['nome']);
        $preco = utf8_encode($produto['preco']);
        $imagem = utf8_encode($produto['imagem']);
        $cod = utf8_encode($produto['codigo']);
        $pontos = $produto['acumulos'];
        $imagem = '<img src="data:image/png;base64,' . base64_encode($produto['imagem']) . '">';
        $pts = "pts";
        //verifica se o cliente esta logado, caso nao esteja nao aparece os pontos
        if (!$_SESSION['logado']) {
            $pts = "";
            $pontos = "";
        }
    }
}

// -----------------------------------------> BEBIDAS <-----------------------------------------
// recebe o id da bebida
if ($idBebida) {
    //recebe da url a id da bebida
    $codigo = $_GET['idBebida'];

    //pesquisa no banco qual bebida é 
    $sql = "SELECT * FROM bebidas WHERE codigo = '$codigo'";

    $prepar = $pdo->prepare($sql);

    $prepar->execute();
    //pesquisa no banco de dados e tras as informações 
    foreach ($pdo->query($sql) as $produto) {
        $comida = utf8_encode($produto['nome']);
        $preco = utf8_encode($produto['preco']);
        $imagem = utf8_encode($produto['imagem']);
        $cod = utf8_encode($produto['codigo']);
        //verifica se o cliente esta logado, caso nao esteja nao aparece os pontos
        if (@$pontos == "") {
            $pontos = "";
            $pts = "";
        }
        // armazena a imagem em uma variavel
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
        <h1><?php echo "<span class='position-relative' style='left:40px;  font-weight: bold;' > $comida <span class='pontos2'>$pontos $pts</span> </span> " ?></h1>
        <?php echo $imagem ?>
        <!-- verifica se o client esta logado caso nao esteja não aparece -->
        <?php if ($_SESSION['logado']) {
            echo "<p style='color:white'> codigo: $cod </p>";
            echo "<p style='color:white'> Ola," . $informacoesF['nome'] . " seu codigo como cliente é: <strong>" . $informacoesF['codigo'] . "</strong>";
        } ?>
    </div>
</div>