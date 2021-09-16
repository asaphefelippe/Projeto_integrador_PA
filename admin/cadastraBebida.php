<?php
session_start();
// Para verificar se a session admin foi setada ou foi retornada como TRUE caso contrario a pessoa nao podera ter acesso a essa pagina (Segurança)
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
// se o botao com o NAME : enviar for setado entao executa
if (isset($_POST['enviar'])) {
    $statusMsg = "";
    // pega o nome e o preço que foi inserido no formulario

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    //verifica se a imagem foi inserida
    if (!empty($_FILES["imagem"]["name"])) {
        // caso tenha sido inserida pega a imagem e o formato dela
        $fileName = basename($_FILES["imagem"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // testa o formato que a imagem veio e ve se é compativel
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // se a imagem for compativel cria uma variavel para a imagem
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));

            include_once('../inc/banco.php');
            //prepara o banco para inseri os valores que veio do formulario
            $sql = "INSERT INTO bebidas (nome,imagem,preco) VALUES ('$nome' , '$imgContent','$preco')";

            $exe = $pdo->prepare($sql);
            //envia as informaões para o banco
            $exe->execute();
        } else {
            // caso a imagem nao seja dos formatos que foram exigidos essa mensagem sera exibida
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        //se a imagem nao for inserida no formulario
        $statusMsg = 'Please select an image file to upload.';
    }
    echo $statusMsg;
}
include_once('../inc/menuBoot.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</head>

<style>
    body {
        background-color: #fb5607;
    }

    div.login-1Cadastro {
        margin-left: auto;
        margin-right: auto;
        width: 550px;
        height: auto;
    }
</style>

<body>

    <div class="centerADM">
        <form action="" method="POST" class="formADM" enctype="multipart/form-data">
            <div class="loginCadastro">
                <div>
                    <label for="nome" class="">Nome:</label>
                    <br>
                    <input type="text" name="nome" />
                </div>
                <div>
                    <label for="telefone" class="">Preço:</label>
                    <br>
                    <input type="text" name="preco" />
                </div>
                <div>
                    <label for="imagem" class="">Imagem da bebida:</label>
                    <br>
                    <input type="file" name="imagem" />
                </div>
            </div>
            <div class="button">
                <br>
                <button type="submit" class="email buttonCadastro" name="enviar">cadastrar</button>
            </div>
        </form>
        <br>
    </div>
</body>

</html>