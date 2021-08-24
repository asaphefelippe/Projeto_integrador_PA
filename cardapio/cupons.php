<script>
    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0.1px";
    }
</script>


<div class="menu" id="menu" onclick="mostrarSub()">
    <img src="../assets/images/botao-de-menu-de-tres-linhas-horizontais.png" alt="" class="icon">
</div>

<nav>
    <div class="lala">
        <div class="submenu" id="subMenu">
            <div class="direita">
                <div class="padding">
                    <a href="cupons.php" class="letraMenu"> cupons</a>
                </div>
                <div class="padding">
                    <a href="#contato" class="letraMenu">contato </a>
                </div>

            </div>


            <div>
                <div> <img src="../assets/images/Desenho-Coxinha-PNG.png" alt="" class="png"> </div>
                <div> <a href="cupons.php"> <img src="../assets/images/marca-x.png" alt="" class="marca"> </a> </div>
                <div style="margin-top:25px;"> <a href="../index.php" class="letraMenu"> inicial</a></div>
            </div>



            <div class="esquerda">
                <div class="padding">
                    <a href="pontos.php" class="letraMenu"> pontos</a>
                </div>
                <div class="padding">
                    <a href="cardapio.php" class="letraMenu"> cardápio</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<header>
    <img src="../assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="img">
</header>

<div class="titulo"> CUPONS</div>


<?php
/*---------------------------------------------------------------------------------------------------------> INICIO PHP <---------------------------------------------------------------------------------------------------------*/
include_once(dirname(__FILE__) . '/../inc/banco.php');

$result = "SELECT * FROM cupons";

$res = $pdo->query($result);

$count = $res->fetchAll();

foreach ($pdo->query($result) as $values) {
    echo '<div class="col p-3">';
    echo '<div class=" efeito-hover p-3 h-100">';

    $nome1 =  '<h1>' . utf8_encode($values['nome1']) . '</h1><br>';
    $nome2 =  utf8_encode($values['nome2']) . '<br>';
    $nome3 =  utf8_encode($values['nome3']) . '<br>';
    $nome4 =  utf8_encode($values['nome4']) . '<br>';
    $nome5 =  utf8_encode($values['nome5']) . '<br>';
    $nome6 =  utf8_encode($values['nome6']) . '<br>';
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
    $pontos = $values['acumulo'];
    $pts = "pts";
    ///$imagem = '<img src="data:image/jpeg;base64,' . base64_encode($values['imagem']) . '" />';
    $imagem = '<img class="img-fluid cupomIMG" src="data:image/png;base64,' . base64_encode($values['imagem']) . '">';
    echo   $texto = "
            <div class='pontos'>
                $pontos$pts   
            </div> 
            <div class='text-center'>$imagem  </div>
            <div class='desc text-center'>

                <h1>$nome1</h1>
                <h1>$nome2</h1>
                <h1>$nome3</h1>
                <h1>$nome4</h1>
                <h1>$nome5</h1>
                <h1>$nome6</h1>


                                
                <p>R$:$preco</p>
                <a href='telaDeCompra.php?idProduto=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
            </div>";

    echo '</div>'; // acaba a column
    echo '</div>'; // acaba a column
}
?>

<div class="container1 row row-cols-4" style="margin-left: 0px;">
    <div class="cupom">
        <img src="cardapio/assets/images/bolinhafanta.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/coxinhacoca.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/coxinhaFanta.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/kibesuco.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/paoqjSweps.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/pastelGuarana.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco"> 6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/pqcfanta.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>


    <div class="cupom">
        <img src="cardapio/assets/images/salsichasweps.jpg" alt="" class="cupomIMG">
        <h1 class="comidas">combo</h1>
        <p class="preco">6,00</p>
        <button class="botaoComprar">comprar</button>
    </div>
</div>