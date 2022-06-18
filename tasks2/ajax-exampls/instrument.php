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