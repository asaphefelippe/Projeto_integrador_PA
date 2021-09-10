<?php
session_start();
$_SESSION['email'] = "";
$_SESSION['logado'] = false;


if (isset($_POST['enviar'])) {

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $pdo = new PDO("mysql:host=localhost:3308;dbname=pi", "root", "");

    $result = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";

    $res = $pdo->query($result);

    $count = $res->fetchColumn();

    //echo "There are" . $count . " machine.";  -----------------------------------------PARA TESTES-----------------------------------------

    foreach ($pdo->query($result) as $values) {
        $admin = $values['is_admin'];
    }
    //echo $admin;                              -----------------------------------------PARA TESTES-----------------------------------------

    if ($count == "") {
        echo 'Senha ou login errado';
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['logado'] = true;
        $logado = $_SESSION['logado'];
        $_SESSION['ADMIN'] = false;
        if ($admin == 1) {
            $_SESSION['ADMIN'] = true;
            header("location:admin/telaADM2.php");
        } else {
            header('location:index.php');
            echo 'Deu bom';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>trabalho p.a</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<script>
function show() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}
</script>
<body>

    <!-- NAO DA PARA COLOCAR INCLUIDE POR CAUSA DO MENU NA TELA DE LOGIN NAO TEM MENU-->

    <style>
        body {
            background-color: #fb5607;
        }
    </style>
    <form action="" method="POST">
        <div class="login-1">
            <img src="assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="imgLogin">
            <div class="login">
                <div>
                    <img src="assets/images/perfil.png" alt="" class="perfil"> <label for="email" class="email">email</label>
                    <br>
                    <input type="text" name="email" required/>
                </div>
                <div>
                    <img src="assets/images/cadeado-trancado.png" alt="" class="cadeado"> <label for="senha" class="email">senha</label>
                    <br>
                    <input type="password" name="senha" id="senha" placeholder="Digite a Senha"  required />
                    <img id="olho" onclick="show()" src="assets/images/olho.png" class="olho">
                </div>
                <div style="padding-left: 45px;"class="button">
                    <br>
                    <button type="submit" class="email buttonLogin aCadastro" name="enviar"> login</button>
                </div>
            </div>

            <div class="flexCadastro">
                <p class="JaTemConta">não tem cadastro?</p>
                <p><a href="cadastro.php" class="aCadastro"> ir para o cadastro</a></p>
            </div>
        </div>
    </form>