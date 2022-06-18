<?php

if($_SERVER['REQUEST_METHOD'] !== 'GET'){
    echo json_encode([
        'error'=>'Недопустимый http метод'
    ]);
}

$instrument_id = (int) $_GET['id'];
if(!isset($instrument_id)){
    echo json_encode([
        'error'=>'id не передан'
    ]);
}

$instruments = require_once 'data.php';
foreach ($instruments as $key) {
    if($key['id'] === $instrument_id){
        $inst = $key;
        break;
    }
}
if(!isset($inst)){
    echo json_encode([
        'error'=>'инструмент не был найден'
    ]);
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
<?php

if($_SERVER['REQUEST_METHOD'] !== 'GET'){
    echo json_encode([
        'error'=>'Недопустимый http метод'
    ]);
}

$instrument_id = (int) $_GET['id'];
if(!isset($instrument_id)){
    echo json_encode([
        'error'=>'id не передан'
    ]);
}

$instruments = require_once 'data.php';
foreach ($instruments as $key) {
    if($key['id'] === $instrument_id){
        $inst = $key;
        break;
    }
}
if(!isset($inst)){
    echo json_encode([
        'error'=>'инструмент не был найден'
    ]);
}
echo json_encode($inst);