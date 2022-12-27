<?php

@include './includes/db.php';
session_start();

if(isset($_POST['submit'])){

   $name = mysqli_escape_string($conn, $_POST['name']);
    $last_name = mysqli_escape_string($conn, $_POST['last-name']);
   $email = mysqli_escape_string($conn, $_POST['email']);

   $pass = md5($_POST['pass']);
   $cpass = md5($_POST['cpass']);
   

   $select = " SELECT * FROM users WHERE user_email = '$email' && pass = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

     echo 'user already exist!';

   }else{

      if($pass !== $cpass){
            echo "Password nao condezem";
      }else{
         $insert = "INSERT INTO users(user_name,last_name, user_email, pass) VALUES('$name','$last_name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Iniciar sessão - Turves Tube</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <script src='./js/index.js'></script>
</head>

<body>
    <div class="conteiner">
        <?php  include "./includes/header.php" ?>
        <div class="form-group">
            <form name="sign-up" class="sign-up-form" onsubmit="validate()" method="POST">
                <div class="user-data">
                    <div class="field">
                        <label for="name">Nome: </label>
                        <input type="text" name="name" id="name" placeholder="Insira o seu nome..." required>
                    </div>
                    <div class="field">
                        <label for="last-name">Sobrenome: </label>
                        <input type="text" name="last-name" id="last-name" placeholder="insira o seu sobrenome..."
                            required>
                    </div>
                </div>
                <div class="field">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" placeholder="Insira o seu e-mail" required>
                </div>
                <div class="field">
                    <label for="pass">Senha: </label>
                    <input type="password" name="pass" id="pass" placeholder="Insira uma senha" required>
                </div>
                <div class="field">
                    <label for="cpass">Confirme sua senha: </label>
                    <input type="password" name="cpass" id="cpass" placeholder="Confirme sua senha" required>
                </div>
                <div class="field">
                    <input type="submit" value="Registar" name="submit">
                </div>

                <div class="field have-an-account">
                    <p>Já tens um conta? <a href="./login.php">Faça o login</a></p>
                </div>
            </form>
        </div>
        <?php include "./includes/footer.php"?>
    </div>
</body>

</html>