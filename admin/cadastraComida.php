<?php
session_start();
if (!isset($_SESSION['ADMIN']) || $_SESSION['ADMIN'] == false) {
    echo 'voce nao pode acessar essa pagina';
    die();
}
if (isset($_POST['enviar'])) {
    $statusMsg = "";

    $nome = $_POST['nome'];
    $acumulos = $_POST['acumulos'];
    $gastarP = $_POST['gastarP'];


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
            $preco = $_POST['preco'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
<?php include_once('../inc/menuADM.php') ?>
    <div class="login-1Cadastro">
        <img src="../assets/images/90d6eed98ed84924b651223770e85165.png" alt="" class="imgLogin">
        <form action="" method="POST" enctype="multipart/form-data">
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
                    <label for="sobrenome" class="">Quantos pontos o cliente ganha:</label>
                    <br>
                    <input type="text" name="acumulos" />
                </div>

                <div>
                    <label for="telefone" class="">Quantos pontos gasta:</label>
                    <br>
                    <input type="text" name="gastarP" />
                </div>
                <div>
                    <label for="imagem" class="">Quantos pontos gasta:</label>
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