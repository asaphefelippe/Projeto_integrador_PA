<?php

include_once(dirname(__FILE__) . '/inc/banco.php');


if (isset($_POST['enviar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $retry = md5($_POST['retry']);
    $senha = md5($_POST['senha']);

    //$pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');

    $result = "SELECT * FROM alunospa WHERE email = '$email'";

    $res = $pdo->query($result);

    $count = $res->fetchColumn();

    echo " Linha afetada " . $count;
    if ($count == "") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $retry = md5($_POST['retry']);
        $senha = md5($_POST['senha']);

        if ($retry == $senha) {

            echo 'Conta criada';
            //$pdo = new PDO('mysql:host=localhost:3308;dbname=pi', 'root', '');


            $sql = "INSERT INTO alunospa (email,senha,nome) VALUES ('$email' , '$senha', '$nome')";

            $teste =     $pdo->prepare($sql);

            $teste->execute();
            print_r($teste->errorInfo());
        } else {
            echo " verifique a senha ";
        }
    } else {
        echo ' Esse email ja esta sendo ultilizado ';
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<style>
    body {
        background-color: #fb5607;
    }
</style>

<body>

    <div class="login-1Cadastro">
        <img src="assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="imgLogin">
        <form action="" method="POST">
            <div class="loginCadastro">
                <div>
                    <label for="nome" class="email">nome</label>
                    <br>
                    <input type="text" name="nome" />
                </div>

                <div>
                    <label for="sobrenome" class="email">sobrenome</label>
                    <br>
                    <input type="text" name="sobrenome" />
                </div>

                <div>
                    <label for="telefone" class="email">telefone</label>
                    <br>
                    <input type="text" name="telefone" />
                </div>



                <div>
                    <label for="email" class="email">email</label>
                    <br>
                    <input type="text" name="email" />
                </div>


                <div>
                    <label for="senha" class="email">senha</label>
                    <br>
                    <input type="text" name="senha" />
                </div>

                <div>
                    <label for="confirmar" class="email"> confirmar senha</label>
                    <br>
                    <input type="text" name="retry" />
                </div>

                <div class="button">
                    <br>
                    <button type="submit" class="email buttonCadastro" name="enviar">cadastrar</button>
                </div>
        </form>
        <br>
        <div class="flexCadastro">
            <p class="JaTemConta">já tem conta?</p>
            <p><a href="login.php" class="aCadastro "> ir para login</a></p>
        </div>





    </div>
    </div>
</body>

</html>