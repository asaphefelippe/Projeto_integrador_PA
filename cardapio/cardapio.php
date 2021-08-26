<?php
session_start();
include_once(dirname(__FILE__) . '/../inc/banco.php');


$result = "SELECT * FROM comidas";

$res = $pdo->query($result);

$count = $res->fetchAll();


//echo "There are" . $count . " machine.";  -----------------------------------------PARA TESTES-----------------------------------------





/*<div class="row">  
<img src="data:image/jpeg;base64,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" alt="">
<h1>coxinha</h1>
<p>R$:2,00</p>
<button class="botaoComprar">comprar</button>
</div> -------------------------------------------- Exemplo--------------------------------------------*/

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

<div class="">
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
            ///$imagem = '<img src="data:image/jpeg;base64,' . base64_encode($values['imagem']) . '" />';
            $imagem = '<img class="img-fluid" src="data:image/png;base64,' . base64_encode($values['imagem']) . '">';
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