<div class="php">
<?php
include "./includes/db.php";
session_start();

if(isset($_SESSION['logado'])){
    header("location: home.php");
}
setcookie("login", $_SESSION['logado'], 40000000);


?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>TurvesTube - Home</title>
    <script src="./js/index.js"></script>
</head>

<body>
    <div class="conteiner">
        <?php include ("./includes/header.php")?>

        <section class="content-panel">
            <fieldset class="content-panel-title">
                <legend>
                    <h3>Vídeos Recentes</h3>
                </legend>
                <section class="categories">
                    <button class="btn category">All</button>
                    <button class="btn category">Músicas</button>
                    <button class="btn category">Filmes</button>
                    <button class="btn categorie">Desenhos animados</button>
                </section>
                <div class="videos list">
                    <?php foreach ($video as $vid): ?>
                    <li class="video">
                        <a href="<?php echo './player_page.php?id=' . $vid['idvideos'];  ?>"><video src="<?php echo $vid['path_videos']; ?>"
                            id="video" contenteditable="false" width="300%" height="200px"></video></a>
                            <a href="<?php echo './player_page.php?id=' . $vid['idvideos'];  ?>">  <h3 class="video-title"><?php echo $vid['title'];?></h3></a>
                      
                        <div class="video-details">
                            <div class="author details">
                                <div class="author-profile"></div>
                                <div class="author-chanell">
                                    <p class="profile name"><a href="#profile-url"><?php echo $vid['video_by'] ?></a></p>
                                    <p class="follwers">230M followers</p>

                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach ?>
                </div>
            </fieldset>
        </section>
      <?php include ("./includes/footer.php") ?>
    </div>

</body>

</html>