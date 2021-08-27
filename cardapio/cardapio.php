<?php
session_start();
include_once(dirname(__FILE__) . '/../inc/banco.php');
/*if ($_SESSION['logado']) {
    echo "Voce esta logado";
}else{
    echo "voce nao esta logadoo";
}------------------------------------------------------------------------------------PARA TESTE------------------------------------------------------------------------------------*/
$result = "SELECT * FROM comidas";

$res = $pdo->query($result);

$count = $res->fetchAll();


//echo "There are" . $count . " machine.";  -----------------------------------------PARA TESTES-----------------------------------------


include_once(dirname(__FILE__) . '/../inc/menu.php');

include_once(dirname(__FILE__) . '/../inc/banco.php');

$bebida = "SELECT * FROM bebidas";

$resultado = $pdo->query($bebida);

$contador = $resultado->fetchAll();


?>

<header>
    <img src="assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="logo">

</header>

<div class="titulo"> COMIDAS </div>

    <div class="row row-cols-4">

        <?php
        foreach ($pdo->query($result) as $values) {
            echo '<div class="col p-3">';
            echo '<div class=" efeito-hover p-3 h-100">';
            
            $nome =  utf8_encode($values['nome']);
            $preco =  utf8_encode($values['preco']);
            $img =  utf8_encode($values['imagem']);
            $codigo =  utf8_encode($values['codigo']);
            $pontos = $values['acumulos'];
            $pts = "pts";
            if (!$_SESSION['logado']) {
                $pontos = "";
                $pts = "";
            }
            ///$imagem = '<img src="data:image/jpeg;base64,' . base64_encode($values['imagem']) . '" />';
            $imagem = '<img class="fotosPizza" src="data:image/png;base64,' . base64_encode($values['imagem']) . '">';
            echo   $texto = "
            <div class='pontos'>
                $pontos$pts   
            </div> 
            <div class='text-center'>$imagem  </div>
            <div class='desc text-center'>
                <h1>$nome</h1>
                                
                <p>R$:$preco</p>
                <a href='telaDeCompra.php?idProduto=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
            </div>";

            echo '</div>'; // acaba a column
            echo '</div>'; // acaba a column
        }
        ?>

    </div>

<div class="titulo"> BEBIDAS </div>
<div class="">
    <div class="row row-cols-4">
        <?php

        foreach ($pdo->query($bebida) as $valores) {

            echo '<div class="col p-3">';
            echo '<div class=" efeito-hover p-3 h-100">';

            $nomeB =  utf8_encode($valores['nome']);
            $precoB =  utf8_encode($valores['preco']);
            $imgB =  base64_encode($valores['imagem']);
            $codigo = $valores['codigo'];
            $imagemB = '<img class= "img-fluid cupomIMG" src="data:image/jpeg;base64,' . base64_encode($valores['imagem']) . '" />';
            echo   $textoB = "<div class='row'> $imagemB<h1>$nomeB</h1>
                    <p>R$:$precoB</p>
                    <a href='telaDeCompra.php?idBebida=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
                    </div>";
            echo '</div>'; // acaba a column
            echo '</div>'; // acaba a column
        }
        ?>
    </div>
</div>




<div>
    <a href="#" id="subir">Topo</a>
</div>