<link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <script src='./js/index.js'></script>
<div class="header">
            <div class="title home"><button class="home"><a href="index.php">Turves Tube</a></button></div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php" class="active">Home</a>
                    </li>
                    <li><a href="poster.php">Carregar video</a></li>
                    <li>
                        <a href="login.php"><?php
                        if(!isset($_SESSION["logado"])){
                            echo "";
                        }else{
                            echo $_SESSION['user_name'];
                        }
                        
                        ?></a>
                    </li>
                    <li>
                        <a href="./logout.php">logout</a>
                    </li>
                    <li><a href="signup.php">Registar</a>
                    </li>
                </ul>

            </nav>
            <div class="form-search">
                <form method="post">
                    <input type="text" name="search" placeholder="Pesquise aqui..." role="textbox" id="search">
                </form>
            </div>
        </div>
        