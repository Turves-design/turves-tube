<div class="php">
<?php
session_start();
@require "./includes/db.php";

if(isset($_POST['login'])){
    $userName = mysqli_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['pass']);

    $sql = ("SELECT * FROM users where user_email = '$userName' AND pass = '$pass'");
    $resultado = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($resultado);


    if(mysqli_num_rows($resultado)> 0){     
            $_SESSION['logado'] = true;
            $_SESSION['user_name'] = $dados['user_name'];
            header("Location: ./index.php");
   
    }
    else{
        echo "usuario nao existe";
    }
}

?>
</div>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Iniciar sessão - Turves Tube</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
</head>

<body>
    <div class="conteiner">
        <?php  include "./includes/header.php" ?>
        <div class="form-group">
            <form name="sign-up" class="sign-up-form" onsubmit="validate()" method="POST">
                <div class="field">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" placeholder="Insira o seu e-mail" required>
                </div>
                <div class="field">
                    <label for="pass">Senha: </label>
                    <input type="password" name="pass" id="pass" placeholder="Insira uma senha" required>
                </div>
             
                <div class="field">
                    <input type="submit" value="login" name="login">
                </div>

                <div class="field have-an-account">
                    <p> <a href="./signup.php">Faça uma conta</a></p>
                </div>
            </form>
        </div>
        <?php include "./includes/footer.php"?>
    </div>
</body>

</html>