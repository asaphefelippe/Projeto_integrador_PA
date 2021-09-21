<?php
// caso a pessoa clique em sair destroi a sessão
if (isset($_GET['logout'])) {
    session_destroy();
    header("location:login.php");
}
include_once('inc/banco.php');
// verifica se o cliente ta logada
if (@$_SESSION['logado']) {
    // armazena email do cliente em uma variavel
    $email = $_SESSION['email'];
    //vai no banco e procura pelo email do client
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = '$email'");

    if ($sql->execute()) {

        $info = $sql->fetchALL();
        // pega as informações do cliente
        foreach ($info as $key => $values) {

            $acu = $values['acumulo'];
            $nom = $values['nome'];
            $cod = $values['codigo'];
        }
    }
} else {
    // se o client nao for logado deixa tudo setado como vazio
    $_SESSION['logado'] = false;
    $email = "";
    $acu = "";
    $nom = "";
    $cod = "";
}

include_once(dirname(__FILE__) . '/inc/header.php');
include_once(dirname(__FILE__) . '/inc/menu.php');
?>

<script>
    //menu

    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0.px";
    }


    //rodas giratorias

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


    <div class="Ola">
        <?php
        //caso o cliente esteja logado entao mostra o "ola,......" caso contrario não
        if (@$_SESSION['logado']) : ?>
            <?php echo '<h4 class="phpOlaNome">Olá, ' . $nom . ' </h4> <p> seu codigo é : ' . $cod . '</p>' ?>
        <?php else : $_SESSION['logado'] = "";
        endif
        ?>
        <a href="<?php echo HOME; ?>"><img src="<?php echo HOME; ?>assets/images/logo.png" alt="" class="logo"></a>
    </div>

</header>
<div class="container-fluid">
    <section class="row -5">
        <div class="col-12">
            <div class="inicial">
                <div class="container-bolas">
                    <div class="column row row-cols-md-4">

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
        </div>
    </section>
</div>
<div class="container-fluid">
    <section class="row -5">
        <div class="sobreNos col-12" id="sobreNos">

            <h1 class="fonte2"> SOBRE NÓS </h1>
            <p class="fonte3">Somos uma equipe formada por 5 integrantes: Asaphe, Beatriz, Heitor, Ian e Emanuel. A ideia do Modern Canteen surgiu quando decidimos que queríamos fazer um site para cantinas, mas que tivesse um diferencial, um sistema dinâmico, que chamasse a atenção do cliente. Então surgiu a ideia de fazer um sistema de cupons e de pontos, assim chamaríamos atenção dos clientes e teríamos benefícios para eles. A partir disso o projeto foi sido desenvolvido.
            </p>
            <img src="assets/images/transferir.jpg" alt="" class="confeiteiros">
        </div>

    </section>
</div>
<div class="container-fluid">
    <section class="row -5 pãoDeQueijo">
        <div class="col-md-4"><img src="assets/images/paoQueijo.png" alt="" class="img-fluid"></div>
        <div class="col-md-4">
            <div>
                <h1 class="PaoTitulo fonte2">MODERN CANTEEN </h1>
                <div class="Pao">
                    <p class="PaoParagra">Fui em busca de felicidade</p>
                    <p class="PaoParagra1">voltei com</p>
                    <p class="PaoParagra2">um pão de queijo</p>
                </div>
            </div>

        </div>
        <div class="col-md-4"><img src="assets/images/paoQueijo.png" alt="" class="img-fluid"></div>

    </section>
</div>


<div class="container-fluid">

    <section class="row -5 fotos" id="fotos">
        <div class="col-md-12">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/slide11.jpg" class="fotosCa">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/slide22.jpg" class="fotosCa">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/slide33.jpg" class="fotosCa">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" style="margin-left: 20%;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" style="margin-right: 20%;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
</div>
<div class="container-fluid">

    <section class="row -5">
        <div class="col-md-12">
            <div class="imgRoda">


            </div>
        </div>
    </section>
</div>


<section class="row -5">
    <div class="col-md-12">
        <div class="localizacao" id="localizacao">
            <h1 class="fonte10">LOCALIZAÇÃO</h1>
            <div class="mapa d-flex">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14306.50717950108!2d-48.85367!3d-26.306196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x661bda354760a096!2sFaculdade%20Senac%20Joinville!5e0!3m2!1spt-BR!2sbr!4v1626718827764!5m2!1spt-BR!2sbr" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </div>
</section>

<section class="row -5">
    <div class="col-md-12">
        <div id="pontos">
            <h1 class="h1pontos fonte2">SISTEMA DE PONTOS</h1>
            <p class="ppontos">o sistema de pontos funciona da seguinte forma: Primeiramente o cliente só terá esse benefício se tiver login em no nosso site. Ao acessar o site, o cliente entrará em nosso cardápio onde todos os produtos terão uma quantia de pontos, a cada produto que o cliente comprar ele acumulará pontos. Esse acumulo de pontos transformará em recompensas. Por exemplo, se o cliente acumulou 30 pontos, ele ganhará uma coxinha.</p>
            <img src="assets/images/fidelidade.png" alt="" class="fidelidade">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#8338ec" fill-opacity="1" d="M0,64L48,101.3C96,139,192,213,288,218.7C384,224,480,160,576,160C672,160,768,224,864,218.7C960,213,1056,139,1152,128C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</section>
<?php
include_once(dirname(__FILE__) . "/inc/footer.php");
?>