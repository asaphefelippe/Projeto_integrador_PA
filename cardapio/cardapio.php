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

<style>
body{
    background-color: #8338ec;
}
</style>
   
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#3a86ff" fill-opacity="1" d="M0,96L48,101.3C96,107,192,117,288,144C384,171,480,213,576,192C672,171,768,85,864,80C960,75,1056,149,1152,186.7C1248,224,1344,224,1392,224L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
<h1 class="cardapioH1">cardápio</h1>


<div class="titulo"> COMIDAS </div>

    <div class="row row-cols-md-4 row-cols-sm-3 row-cols-xs-2">

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
                <h1 class='nomeCardapio'>$nome</h1>
                                
                <p class='nomeCardapio'>R$:$preco</p>
                <a href='telaDeCompra.php?idProduto=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
            </div>";

            echo '</div>'; // acaba a column
            echo '</div>'; // acaba a column
        }
        ?>

    </div>

<div class="titulo"> BEBIDAS </div>

    <div class="row row-cols-md-4  row-cols-xs-2">
        <?php

        foreach ($pdo->query($bebida) as $valores) {

            echo '<div class="col p-3">';
            echo '<div class=" efeito-hover p-3 h-100">';

            $nomeB =  utf8_encode($valores['nome']);
            $precoB =  utf8_encode($valores['preco']);
            $imgB =  base64_encode($valores['imagem']);
            $codigo = $valores['codigo'];
            $imagemB = '<img class= "img-fluid cupomIMG" src="data:image/jpeg;base64,' . base64_encode($valores['imagem']) . '" />';
            echo   $textoB = "<div class='row'> $imagemB<h1 class='nomeCardapio'>$nomeB</h1>
                    <p class='nomeCardapio'>R$:$precoB</p>
                    <a href='telaDeCompra.php?idBebida=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
                    </div>";
            echo '</div>'; // acaba a column
            echo '</div>'; // acaba a column
        }
        ?>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#3a86ff" fill-opacity="1" d="M0,256L48,213.3C96,171,192,85,288,69.3C384,53,480,107,576,160C672,213,768,267,864,250.7C960,235,1056,149,1152,117.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>



<div>
    <a href="#" id="subir">Topo</a>
</div>