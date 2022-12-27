<?php 
session_start();
@require './includes/db.php';


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$videoFile = $pdo -> query("SELECT * FROM videos WHERE idvideos = '$id'");
	$video = $videoFile ->fetch(PDO::FETCH_ASSOC);

	$video_Name = $video['title'];
	$video_desc = $video['description'];
	$video_author = $video['video_by'];
	$video_data = $video['date'];
	$video_likes = $video['likes'];
	$video_unlikes = $video['unlikes'];
	$video_views = $video['views'];

}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $video_Name . ' - Playing'?></title>
</head>
<body>
	<div class="conteiner">
	<?php @include "./includes/header.php";?>
	<div class="content">
	<div class="video">
 <video class="video" src="<?php echo $video['path_videos']; ?>" autoplay controls></video>
                        <h3 class="video-title"><?php echo $video_Name;?></h3>
                        <div class="video-details">
                            <div class="author details">
                                <div class="author-profile"></div>
                                <div class="author-chanell">
                                    <p class="profile name"><a href="#profile-url"><?php echo $video_author; ?></a></p>
                                    <p class="follwers">230M followers</p>

                                </div>
                            </div>
                        </div>
						<div class="video-desc">
						<fieldset>
							<legend><?php echo $video_views . ' visualizações , '.$video_data;?></legend>
							<fieldset>
							<p><?php echo $video_desc; ?></p>
							</fieldset>
							
						</fieldset>
						</div>
                    </div>
					</div>
					<?php @include "./includes/footer.php";?>
	

	</div>
</body>
</html>