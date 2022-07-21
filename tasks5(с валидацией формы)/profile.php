<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks5</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <h5><?=$_SESSION['user']['login']?></h5>
        <img style="width: 300px" src="<?=$_SESSION['user']['img']?>" alt="">
        <p><?=$_SESSION['user']['telephone']?></p>
        <a href="#"><?=$_SESSION['user']['email']?></a>
        <a href="exit.php">Выход</a>
    </div>
</body>
</html>