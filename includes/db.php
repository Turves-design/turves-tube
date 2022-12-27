<?php

$conn = mysqli_connect('localhost','root','','app');
$pdo = new PDO("mysql:host=localhost;dbname=app;","root", '');

$videos = $pdo ->query("SELECT * FROM videos");
$video = $videos->fetchAll(PDO::FETCH_ASSOC);



?>