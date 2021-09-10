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


?>



<style>

body{
    background-color: #fb5607;
}

</style>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">

  <path fill="#ffbe0b" fill-opacity="1" d="M0,32L48,74.7C96,117,192,203,288,213.3C384,224,480,160,576,160C672,160,768,224,864,240C960,256,1056,224,1152,192C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
<h1 class="cardapioH12">pontos</h1>

    <div class="row row-cols-md-4  row-cols-sm-3 row-cols-xs-2">

        <?php
        foreach ($pdo->query($result) as $values) {
            echo '<div class="col p-3">';
            echo '<div class=" efeito-hover1 p-3 h-100">';
            
            $nome =  utf8_encode($values['nome']);
            $preco =  utf8_encode($values['preco']);
            $img =  utf8_encode($values['imagem']);
            $codigo =  utf8_encode($values['codigo']);
            $gastaP = utf8_encode($values['gastarP']);
            $pontos = $values['acumulos'];
            $pts = "pts";
            if (!$_SESSION['logado']) {
                $pontos = "";
                $pts = "";
            }
            
            ///$imagem = '<img src="data:image/jpeg;base64,' . base64_encode($values['imagem']) . '" />';
            
            $imagem = '<img class="fotosP izza img-fluid"  src="data:image/png;base64,' . base64_encode($values['imagem']) . '">';
            echo   $texto = "
            <div class='pontos'>
                $pontos$pts   
            </div> 
            <div class='text-center' style='min-height:300px'> $imagem  </div>
            <div class='desc text-center'>
            <div class=''>
                <h1 class='pontosh1p'>$nome</h1>
            <p class='pontosP'>pontos : $gastaP  </p>
          </div>
                <a href='telaDeCompraPontos.php?idProduto=" . $codigo . "'><button class='botaoComprar'>retirar pontos</button></a>
            </div>";

            echo '</div>'; // acaba a column
            echo '</div>'; // acaba a column
        }
        ?>

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#ffbe0b" fill-opacity="1" d="M0,192L48,208C96,224,192,256,288,229.3C384,203,480,117,576,90.7C672,64,768,96,864,133.3C960,171,1056,213,1152,202.7C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>

<div>
    <a href="#" id="subir">Topo</a>
</div>
    
  


