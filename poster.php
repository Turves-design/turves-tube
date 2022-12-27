<div class="php">
<?php
session_start();
@require("./includes/db.php");


if (isset($_POST['upload'])) {
    $formatosDeVideo = array('mp4', 'mkv', 'avi', '3gp', 'mpg2');
    $title = mysqli_escape_string($conn, $_POST['title']);
    $description = mysqli_escape_string($conn, $_POST['description']);
    $category = mysqli_escape_string($conn, $_POST['category']);

$extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if(in_array($extensao, $formatosDeVideo)){
    $pasta = 'src/videos/';
    $temp = $_FILES['file']['tmp_name'];
    $nomear = uniqid().".$extensao";

    if(move_uploaded_file($temp, $pasta.$nomear)){
        echo "Upload feito com sucesso";
        $sql = ("SELECT * FROM videos");
        $resultado = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($resultado);
            $name = $_SESSION['user_name'];

        $insert = ("INSERT INTO videos(path_videos, category, title, description, video_by) VALUES('$pasta$nomear', '$category', '$title', '$description', '$name')");
        $result = mysqli_query($conn, $insert);

    }else{
        echo "Falha no upload do ficheiro";
    }
}


}
?>
</div>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Post <?php echo $_SESSION['user_name']?></title>
    </head>
    <body>
       <style type="text/css">
        *{
            color: white;
        }
           .conteiner{
            height: 100%;
            width: 100%;
           }
           .form{
            height: 100%;
            display: flex;
            flex-direction: column;
            width: 100%;
            justify-content: space-between;
           }
       </style>
        <div class="conteiner">
        <?php include "./includes/header.php"; ?> 
        <div class="wrapper">
     <?php if(!isset($_SESSION['logado'])):?>
   
      <div>
<h1>Nao foi possivel carregar formulário de upload😢😢😢</h1>

<p>Se calhar você não tem sessão iniciada porfavor clique no botão abaixo para fazer o login!</p>
<a href="./login.php"></a>
      </div>
        <?php else: ?>
       
            <form class="form" name="video_upload" method="post" enctype="multipart/form-data">
                <fieldset class="conteiner-details"><legend>Video Details</legend>
                    <input type="text" name="title" placeholder="Insira o titulo do video" id="description" required>
                    <textarea name="description" placeholder="Insira a descricao do video" id="description"></textarea>
                    <select class="category" name="category">
                        <option value="Musica">Musica</option>
                        <option value="Filme">Filme</option>
                        <option value="Humor">Humor</option>
                        <option value="LifeStyle">LifeStyle</option>
                        <option value="Documentario">Documentario</option>
                    </select>
                </fieldset>
                <fieldset class="conteiner-video"><legend>Video file</legend>
                    <input type="file" name="file" id="file">
                    <div class="video_preview">
                        
                    </div>
                </fieldset>
                <fieldset class="conteiner-buttons">
                    <button class="btn cancel">Cancel</button>
                    <button class="btn inserir" name="upload" type="submit">Inserir</button>
                </fieldset>
            </form>
        
        <?php endif; ?>
        </div>

        <?php include "./includes/footer.php"; ?>
        </div>

    </body>
</html>