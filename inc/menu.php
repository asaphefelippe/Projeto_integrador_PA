<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header("location:login.php");
}

if (@$_SESSION['logado']) {
    include('inc/banco.php');
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = '$email'");

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

?>
<script>
    var mostrarSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "0px";
    }
    var escondeSub = function() {
        subMenu = document.querySelector('#subMenu');
        subMenu.style.left = "-100%";
    }
</script>
<nav>
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
            <div>
                <img src="assets/images/Desenho-Coxinha-PNG.png" alt="" class="png">
            </div>
            <div>
                <a href="#" onclick="escondeSub();"> <img src="assets/images/marca-x.png" alt="" class="marca"> </a>
            </div>
            <div class="toptop">
                <?php 
                if($_SESSION['logado']){
                    echo '<a href="?logout=true" class="signin">sair</a>';
                }else{
                    echo '<a href="login.php" class="signin">entrar</a>';
                    echo '<a href="cadastro.php" class="signin">cadastrar</a>';
                }
                ?>
            </div>
            <a href="index.php" class="inicialMenu">inicial </a>
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
</nav>
<div class="lala">
    <div class="menu" id="menu" onclick="mostrarSub()">
        <img src="assets/images/botao-de-menu-de-tres-linhas-horizontais.png" alt="" class="icon">
        <div class="Ola">
            <?php
            if (@$_SESSION['logado']) : ?>
                <?php echo '<h4 class="phpOlaNome">Olá, ' . $nom . ' </h4> <p> seu codigo é : ' . $cod . '</p>'?>
                <?php else : $_SESSION['logado'] = "";
            endif

                ?>
                </h4>
        </div>
    </div>
</div>