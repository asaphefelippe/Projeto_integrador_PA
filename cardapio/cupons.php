
<?php
if (!$_SESSION['logado']) {
     echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
     <path fill="#8338ec" fill-opacity="1" d="M0,288L48,256C96,224,192,160,288,154.7C384,149,480,203,576,208C672,213,768,171,864,170.7C960,171,1056,213,1152,240C1248,267,1344,277,1392,282.7L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
   </svg>';
    echo "<style>
    body{
        background-color:#fb5607;
    }
    .error{
        position:absolute;
        width: 100%;
        bottom:0;
    }
    </style>";
    echo "<center>";
    echo "<strong><h5>Essa página só pode ser acessada caso você seja cadastrado</h5></strong>";
    echo "<br>";
    echo "<strong><h5>cadastre-se <a href='cadastro.php'> aqui</a></h5></strong>";
    echo "</center>";
    echo '<div class="error"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#8338ec" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,197.3C384,192,480,192,576,208C672,224,768,256,864,250.7C960,245,1056,203,1152,202.7C1248,203,1344,245,1392,266.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg></div>';
    die();

}
include_once(dirname(__FILE__) . '/../inc/header.php');
include_once(dirname(__FILE__) . '/../inc/menu.php');
?>
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
<style>
    body {
        background-color: #ff006e;
    }
</style>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">

    <path fill="#ffbe0b" fill-opacity="1" d="M0,32L48,74.7C96,117,192,203,288,213.3C384,224,480,160,576,160C672,160,768,224,864,240C960,256,1056,224,1152,192C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>

<h1 class="cardapioH3">cupons</h1>


<?php
/*---------------------------------------------------------------------------------------------------------> INICIO PHP <---------------------------------------------------------------------------------------------------------*/
include_once(dirname(__FILE__) . '/../inc/banco.php');
// consulta o banco sobre os dados registrados na tabela cupons
$result = "SELECT * FROM cupons";
// query consulta os resultados
$res = $pdo->query($result);

$count = $res->fetchAll();

?>
<div class=" row row-cols-md-4 row-cols-sm-3" style="margin-left: 0px;">

    <?php
    // pega os resultados do banco de dados
    foreach ($pdo->query($result) as $values) {
        echo '<div class="col p-3">';
        //echo '<div class=" efeito-hover1 p-3 h-100">';
        //armazena todos os resultados em variaveis 
        $nome1 =    utf8_encode($values['nome1']);
        $nome2 =  utf8_encode($values['nome2']);
        $nome3 =  utf8_encode($values['nome3']);
        $nome4 = utf8_encode($values['nome4']);
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
        $pts = "pts";
        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome1 != null) {
            $nome1 = "<div><h2>↠$nome1</h2></div>";
        } else {
            $nome1 = "<div></div>";
        }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome2 != null) {
            $nome2 = "<div><h2>↠$nome2</h2></div>";
        } else {
            $nome2 = "<div></div>";
        }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome3 != null) {
            $nome3 = "<div><h2>↠$nome3</h2></div>";
        } else {
            $nome3 = "<div></div>";
        }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome4 != null) {
            $nome4 = "<div><h2>↠$nome4</h2></div>";
        } else {
            $nome4 = "<div></div>";
        }

        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome5 != null) {
            $nome5 = "<div><h2>↠$nome5</h2></div>";
        } else {
            $nome5 = "<div></div>";
        }
        //verifica se a variavel foi setada caso sim cria uma tag HTML
        if ($nome6 != null) {
            $nome6 = "<div><h2>↠$nome6</h2></div>";
        } else {
            $nome6 = "<div></div>";
        }
        // verifica se a pessoa que esta acessando a pagina esta logada os pontos aparecem caso contrario NÃO
        if ($_SESSION['logado']) {
            $mostrarP = "<div class= 'pontosCupons'>$pontos pts</div>";
        } else {
            $mostrarP = "";
        }
        ///$imagem = '<img src="data:image/jpeg;base64,' . base64_encode($values['imagem']) . '" />';

        //armazena a imagem em uma variavel
        $imagem = '<img class="cupomIMG img-fluid" src="data:image/png;base64,' . base64_encode($values['imagem']) . '">';



        echo $texto2 = "

        <div class='cupom'>
        $mostrarP
        $imagem 
        <h1 class='comidas'>$nome1  $nome2  $nome3  $nome4  $nome5  $nome6 </h1>
        <p class='preco' $preco </p>
        <a href='telaDeCompraCupons.php?idCupons=" . $codigo . "'><button class='botaoComprar'>comprar</button></a>
        </div>";
        echo "</div>";
        //echo "</div>";
    }
    ?>

</div>