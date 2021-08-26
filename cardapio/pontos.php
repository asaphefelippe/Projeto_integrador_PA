<?php
session_start();
$email = $_SESSION['email'];

include(dirname(__FILE__) . '/../inc/banco.php');
$sql = $pdo->prepare("SELECT * FROM alunospa WHERE email = '$email'");

if ($sql->execute()) {

    $info = $sql->fetchALL();

    foreach ($info as $key => $values) {

        $acu = $values['acumulo'];
        $nom = $values['nome'];
        $cod = $values['codigo'];
    }
}
?>



<script>
    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0.1px";
    }
    var slideIndex = [1, 1];
    var slideId = ["mySlides1", "mySlides2"]
    showSlides(1, 0);
    showSlides(1, 1);

    function plusSlides(n, no) {
        showSlides(slideIndex[no] += n, no);
    }

    function showSlides(n, no) {
        var i;
        var x = document.getElementsByClassName(slideId[no]);
        if (n > x.length) {
            slideIndex[no] = 1
        }
        if (n < 1) {
            slideIndex[no] = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no] - 1].style.display = "block";
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
                <div> <a href="pontos.php"> <img src="../assets/images/marca-x.png" alt="" class="marca"> </a> </div>
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


<h1 class="TituloPontos">pontos Modern Canteen</h1>
<div class="ContainerPontos">


    <div class="PontRec">
        <?php if ($_SESSION['logado']) : ?>
            <h1>pontuações e recompensas de: <?php echo $nom ?></h1>
        <?php else : $_SESSION['logado'] = "";
        endif

        ?>
        <?php if ($_SESSION['logado']) : ?>

            <h4 class="Codigo"> Olá <?php echo $nom ?> você tem <?php echo $acu ?> pontos, seu codigo é : <?php echo $cod ?>

            <?php else : $_SESSION['logado'] = "";
        endif

            ?>
            </h4>
    </div>


    
  

    <div class="Recompensas">
        <h1>recompensas</h1>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="cardapio/assets/images/3pãesdequeijo.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (2).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (3).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (4).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (5).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (6).png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cardapio/assets/images/3pães de queijo (7).png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>