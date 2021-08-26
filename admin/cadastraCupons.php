<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
if (isset($_POST['enviar'])) {
    $statusMsg = "";

    if (!empty($_FILES["imagem"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["imagem"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
            include_once('../inc/banco.php');

            
            $nome1 = $_POST['nome1'];
            $nome1 = $_POST['nome2'];
            $nome1 = $_POST['nome3'];
            $nome1 = $_POST['nome4'];
            $nome1 = $_POST['nome5'];
            $nome1 = $_POST['nome6'];
            $quantidade1 = $_POST['quantidade1'];
            $quantidade1 = $_POST['quantidade2'];
            $quantidade1 = $_POST['quantidade3'];
            $quantidade1 = $_POST['quantidade4'];
            $quantidade1 = $_POST['quantidade5'];
            $quantidade1 = $_POST['quantidade6'];
            $preco = $_POST['preco'];
            $acumulos = $_POST['acumulos'];
            $sql = "INSERT INTO comidas (nome,acumulos,gastarP,imagem,preco) VALUES ('$nome' , '$acumulos', '$gastarP' , '$imgContent','$preco')";
            $exe = $pdo->prepare($sql);
            $exe->execute();

            /*if( $exe->execute()){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }*/
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
    echo $statusMsg;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<style>
    body {
        background-color: #fb5607;
    }
</style>

<body>

    <div class="login-1Cadastro">
        <img src="../assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="imgLogin">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="loginCadastro">
                <div>
                    <label for="nome" class="">Quantidade</label>
                    <br>
                    <input type="text" name="quantidade1" />
                </div>
                <div>
                    <label for="nome" class="">comida1</label>
                    <br>
                    <input type="text" name="nome1" />
                </div>
                <div>
                    <label for="nome" class="">Quantidade2</label>
                    <br>
                    <input type="text" name="quantidade2" />
                </div>
                <div>
                    <label for="nome" class="">comida2</label>
                    <br>
                    <input type="text" name="nome2" />
                </div>
                <div>
                    <label for="nome" class="">Quantidade3</label>
                    <br>
                    <input type="text" name="quantidade3" />
                </div>
                <div>
                    <label for="nome" class="">comida3</label>
                    <br>
                    <input type="text" name="nome3" />
                </div>
                <div>
                    <label for="nome" class="">Quantidade4</label>
                    <br>
                    <input type="text" name="quantidade4" />
                </div>
                <div>
                    <label for="nome" class="">comida4</label>
                    <br>
                    <input type="text" name="nome4" />
                </div>
                <div>
                    <label for="nome" class="">Quantidade5</label>
                    <br>
                    <input type="text" name="quantidade5" />
                </div>
                <div>
                    <label for="nome" class="">comida5</label>
                    <br>
                    <input type="text" name="nome5" />
                </div>
                <div>
                    <label for="nome" class="">Quantidade6</label>
                    <br>
                    <input type="text" name="quantidade6" />
                </div>
                <div>
                    <label for="nome" class="">comida6</label>
                    <br>
                    <input type="text" name="nome6" />
                </div>

                <div>
                    <label for="telefone" class="">Preço</label>
                    <br>
                    <input type="text" name="preco" />
                </div>

                <div>
                    <label for="sobrenome" class="">quantos pontos o cliente ganha</label>
                    <br>
                    <input type="text" name="acumulos" />
                </div>
                <!-- O P C I O N A L -->
                <div>
                    <label for="telefone" class="">quantos pontos gasta</label>
                    <br>
                    <input type="text" name="gastarP" />
                </div>
                <!-- O P C I O N A L -->
                <div>
                    <label for="imagem" class="">imagem</label>
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
    </div>
</body>

</html>