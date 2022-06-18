<?php
$files = $_FILES;
var_dump(__DIR__);
// var_dump($files);
for($index = 0; $index < count($files['picture']['error']); $index +=1){
    $file_error = $files['picture']['error'][$index];
    $file_size = $files['picture']['size'][$index];
    $file_name = $files['picture']['name'][$index];
    $file_type = $files['picture']['type'][$index];
    $tmp_name = $_FILES['picture']['tmp_name'][$index];
// var_dump($file_error,  $file_size, $file_name, $file_type, $tmp_name);

if($file_error === 0 &&  $file_size <= 200000 && $file_type === 'image/png' || $file_type === 'image/jpeg'){
    echo 'файл прошёл все проверки' . $file_name;
    $file_name = microtime() . $file_name;
    $move_result = move_uploaded_file($tmp_name,  "images/$file_name");
    if ($move_result) echo "Файл $file_name успешно загружен";
}

elseif($file_error !== 0){
    echo 'Ошибка в загрузке файла' . $file_name;
    } 

elseif($file_size >200000){
    echo 'Ошибка в размере файла' . $file_name ;
    } 


elseif($file_type !== 'image/png' && $file_type !== 'image/jpeg'){
        echo 'Ошибка в типе файла' . $file_name;
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks3</title>
</head>
<body>
    <form action="tasks3.php" method="post" enctype="multipart/form-data">
        <div style="display:flex; align-items: center">
            <p style="margin-right: 20px">Выбор файла:</p>
            <input multiple name="picture[]" accept="image/*" type="file">
        </div>
        <input type="submit" value="Отправить файл"/>
    </form>
</body>
</html>