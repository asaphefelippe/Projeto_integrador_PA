<?php
include_once(dirname(__FILE__) . '/../inc/header.php');
include_once(dirname(__FILE__) . '/../inc/banco.php');
//verifica se a variavel foi setada caso seja é armazenada dentro de outra variavel
$idCupons = isset($_GET['idCupuns']) ? $_GET['idCupons'] : false;
//pega o id da comida que o client escolheu
$codigo = $_GET['idCupons'];
//seleciona no banco de dados dos cupons qual cupon corresponde
$sql = "SELECT * FROM cupons WHERE codigo = '$codigo'";

$prepar = $pdo->prepare($sql);

$prepar->execute();
//pesquisa no banco de dados todas as informações que foram retornada do $sql
foreach ($pdo->query($sql) as $values) {
    //armazena todas as informções em variaveis
    $nome1 =  utf8_encode($values['nome1']);
    $nome2 =  utf8_encode($values['nome2']);
    $nome3 =  utf8_encode($values['nome3']);
    $nome4 =  utf8_encode($values['nome4']);
    $nome5 =  utf8_encode($values['nome5']);
    $nome6 =  utf8_encode($values['nome6']);
    $quantidade1 = utf8_encode($values['quantidade1']);
    $quantidade2 = utf8_encode($values['quantidade2']);
    $quantidade3 = utf8_encode($values['quantidade3']);
    $quantidade4 = utf8_encode($values['quantidade4']);
    $quantidade5 = utf8_encode($values['quantidade5']);
    $quantidade6 = utf8_encode($values['quantidade6']);
    $num_comb = utf8_encode($values['numero_comb']);
    $preco =  utf8_encode($values['preco']);
    $codigo =  utf8_encode($values['codigo']);

    $img =  $values['imagem'];
    $pontos = $values['acumulos'];
            //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome1 != null) {
        $nome1 = "<div><p>↠$quantidade1 $nome1</p></div>";
    } else {
        $nome1 = "<div></div>";
    }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome2 != null) {
        $nome2 = "<div><p>↠$quantidade2 $nome2</p></div>";
    } else {
        $nome2 = "<div></div>";
    }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome3 != null) {
        $nome3 = "<div><p>↠$quantidade3 $nome3</p></div>";
    } else {
        $nome3 = "<div></div>";
    }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome4 != null) {
        $nome4 = "<div><p>↠$quantidade4 $nome4</p></div>";
    } else {
        $nome4 = "<div></div>";
    }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome5 != null) {
        $nome5 = "<div><p>↠$quantidade5 $nome5</p></div>";
    } else {
        $nome5 = "<div></div>";
    }
        //verifica se a variavel foi setada caso sim cria uma tag HTML
    if ($nome6 != null) {
        $nome6 = "<div><p>↠$quantidade6 $nome6</p></div>";
    } else {
        $nome6 = "<div></div>";
    }
}
// caso o cliente não esteja logado não aparece os pontos para ele
// if (!$_SESSION['logado']) {
//     $pts = "";
//     $pontos = "";
// }
?>

<style>
    body {
        background-color: #fb5607;
    }
</style>
<a href="cupons.php" class="letraMenu"> voltar</a>
<div class="laranja">
    <div class="container">
        <div class="login2 row">
            <div class="login3 col-4">
                <?php
                echo "<div> 

                    $nome1
                    $nome2
                    $nome3
                    $nome4
                    $nome5
                    $nome6
                    </div>";
                if ($_SESSION['logado']) {
                    echo "</div> <div class='pontos5'>$pontos</div>
                    <p class='login3' style='text-align:center'>codigo: $codigo</p>";
                }else{
                    echo "";
                }
                ?>
            </div>
        </div>
    </div>
</div>