<?php

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("location:login.php");
}

if ($_SESSION['logado']) {
    $email = $_SESSION['email'];
    include('inc/banco.php');
    $sql = $pdo->prepare("SELECT * FROM alunospa WHERE email = '$email'");

    if ($sql->execute()) {

        $info = $sql->fetchALL();

        foreach ($info as $key => $values) {

            $acu = $values['acumulo'];
            $nom = $values['nome'];
            $cod = $values['codigo'];
        }
    }
} else {
    $_SESSION['logado'] = false;
    $email = "";
    $acu = "";
    $nom = "";
    $cod = "";
}

include_once(dirname(__FILE__) . '/inc/header.php');
?>

<script>
    //menu// 

    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0.px";
    }


    //rodas giratorias//

    var mostrarHover = function() {
        divBordaConteudo = document.getElementById('conteudo');
        divBordaConteudoLala = document.getElementById('lala');

        divBordaConteudo.style.display = "none";
        divBordaConteudoLala.style.display = "block";
    }


    var mostrarConteudo = function() {
        divBordaConteudo = document.getElementById('conteudo');
        divBordaConteudoLala = document.getElementById('lala');

        divBordaConteudo.style.display = "block";
        divBordaConteudoLala.style.display = "none";
    }

    // botao voltar ao topo//

    $(document).ready(function() {
        $('#subir').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
            return false;
        });
    });
</script>

<script>
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
<header>
    <img src="assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="img">
</header>
<div class="inicial">
    <div class="container-bolas">
        <div class="column">
            <a href="#sobreNos">
                <div class="borda">

                    <div class="borda-giro"> </div>

                    <div class="borda-conteudo">
                        <h1 class="fonteBola1">sobre nós</h1>
                        <div class="borda-conteudo-lala">
                            <h1 class="fonteBola">venha saber mais sobre a historia do Modern Canteen</h1>
                        </div>
                    </div>

                </div>
            </a>
            <a href="#fotos">
                <div class="borda" id="#fotos">
                    <div class="borda-giro"> </div>
                    <div class="borda-conteudo">
                        <div>
                            <h1 class="fonteBola1">fotos</h1>
                            <div class="borda-conteudo-lala">
                                <h1 class="fonteBola">acesse nossa galeria de fotos</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
            <a href="#pontos">
                <div class="borda">
                    <div class="borda-giro"> </div>
                    <div class="borda-conteudo">
                        <h1 class="fonteBola1">pontos</h1>
                        <div class="borda-conteudo-lala">
                            <h1 class="fonteBola">venha saber como funciona o sistema de pontos </h1>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#localizacao">
                <div class="borda">
                    <div class="borda-giro"></div>
                    <div class="borda-conteudo">
                        <h1 class="fonteBola1">localização</h1>
                        <div class="borda-conteudo-lala">
                            <h1 class="fonteBola">conheça nossa localiação</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>


<div class="sobreNos" id="sobreNos">

    <h1 class="fonte2"> SOBRE NÓS </h1>
    <p class="fonte3">As primeiras cafeterias, conhecidas como Kaveh Kanes, surgiram em Meca, na Arábia Saudita, no
        final do século
        XV e início do século XVI. Os Kaveh Kanes eram locais onde se podia passar a tarde conversando, ouvindo
        música e tomando café, uma vez que Meca era um centro religioso e a religião muçulmana proibia o consumo de
        bebidas alcoólicas. Logo o café passou a ser apreciado nas regiões próximas, como Constantinopla e Síria, e
        as cafeterias se espalharam pelo Oriente. As cafeterias eram locais luxuosos onde ocorriam encontros de
        negócios e de lazer.

        A partir de 1615, os comerciantes italianos levaram o café da Arábia para a Europa e a bebida café
        conquistou o paladar dos europeus. Em Veneza, surgiram as Botteghe del Caffé, locais onde ocorriam encontros
        sociais e se tomava café, ouvindo música. Na Europa, as cafeterias desenvolveram-se durante o século XVII e
        se tornaram cenário de encontro de artistas, escritores, aristocratas, políticos e revolucionários.

        Diz-se que a Revolução Francesa foi planejada ao redor das mesas de uma cafeteria. Era uma bebida apreciada
        por pessoas famosas, como Johann Sebastian Bach, que compôs, em 1732, a Cantata ao Café.
    </p>
    <img src="assets/images/transferir.jpg" alt="" class="confeiteiros">
</div>


<div class="FundoBranco">
    <img src="assets/images/paoQueijo.png" alt="">
    <div>
        <h1 class="PaoTitulo">Modern Canteen</h1>
        <div class="Pao">
            <p class="PaoParagra">Fui em busca de felicidade</p>
            <p class="PaoParagra1">voltei com</p>
            <p class="PaoParagra2">um pão de queijo</p>
        </div>
    </div>
    <img src="assets/images/paoQueijo.png" alt="">
</div>



<div class="fotos" id="fotos">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="fotosCa" src="assets/images/fotos (1).jpg" alt="Primeiro Slide">
    </div>
    <div class="carousel-item">
      <img class="fotosCa" src="assets/images/fotos(2).jpg" alt="Segundo Slide">
    </div>
    <div class="carousel-item">
      <img class="fotosCa" src="assets/images/fotos(3).jpg" alt="Terceiro Slide">
    </div>
  
  <div class="AntPro">
  <a class="carousel-control-prev" style="margin-left: 20%"; href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  
  <a class="carousel-control-next"  style="margin-right: 20%";href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
  
</div>

</div>


<div class="imgRoda">

</div>



<div class="localizacao" id="localizacao">
    <h1 class="fonte5">LOCALIZAÇÃO</h1>
    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14306.50717950108!2d-48.85367!3d-26.306196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x661bda354760a096!2sFaculdade%20Senac%20Joinville!5e0!3m2!1spt-BR!2sbr!4v1626718827764!5m2!1spt-BR!2sbr" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

</div>

<?php
if (isset($_POST['enviar'])) {

    $nome = $_POST['name'];
    $emailF = $_POST['email'];
    $msg = $_POST['msg'];

    $sql = new PDO("mysql:host=localhost:3308;dbname=pi", "root", "");
    $pdo = "INSERT INTO formfooter (cod,nome,email,mensagem) VALUES (null,'$nome' , '$email', '$msg')";

    $exe = $sql->prepare($pdo);

    $exe->execute();
}


?>

<!-- <footer>
        <div class="footer2" id="contato">
            <form action="" method="POST">
                <div>
                    <label for="name" class="letrasFO">Nome:</label>
                    <br>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="email" class="letrasFO">E-mail:</label>
                    <br>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label for="msg" class="letrasFO">Mensagem:</label>
                    <br>
                    <input type="mensagem" name="mensagem" required>
                </div>
                
                <div class="button">
                    <button type="submit" name="enviar">Enviar sua mensagem</button>
                </div>
            </form>
        </div>

        <div class="footer2">
            <h1 class="letrasFO">redes sociais</h1>
            <div class="pagamento">
       <a href="https://pt-br.facebook.com/FaculdadeSenacJoinville/">         <img src="assets/images/facebook.png" alt="" class="imgRedes"> </a>
            <a href="https://www.instagram.com/senacjoinville/">   <img src="assets/images/instagram.png" alt="" class="imgRedes"> </a> 
           <a href="">     <img src="assets/images/whatsapp.png" alt="" class="imgRedes"> </a>
            </div>
        </div>


        <div class="footer2">
            <h1 class="letrasFO">formas de pagamentos</h1>
            <div class="pagamento">
                <img src="assets/images/visa.png" alt="" class="imgPagamento">
                <img src="assets/images/paypal.png" alt="" class="imgPagamento">
                <img src="assets/images/forma-de-pagamento.png" alt="" class="imgPagamento">
                <img src="assets/images/pagamento-com-cartao-de-credito.png" alt="" class="imgPagamento">
            </div>
        </div>



        <div class="footer2">
            <img src="assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="imgF">
        </div>



    </footer>
    <div>
        <a href="#" id="subir">Topo</a>
    </div> -->
<?php

include_once(dirname(__FILE__) . "/inc/footer.php");

?>
</body>

</html>