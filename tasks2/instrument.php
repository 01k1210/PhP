<?php
$instrument_id = (int) $_GET['id'];
$instruments = require_once 'data.php';
foreach ($instruments as $key) {
    if($key['id'] === $instrument_id){
        $inst = $key;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks2</title>
</head>
<body>
    <h3><?=$inst['title']?></h3>
    <img src="images/<?=$inst['image']?>" alt="<?=$inst['title'] ?>">
    <p><?=$key['description']?></p>
    <p>Цена: <?=$key['price']?>Rub.</p>

</body>
</html>