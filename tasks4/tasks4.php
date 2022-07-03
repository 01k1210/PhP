<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'file.txt';
    $arr_from_file = file($filename, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    // var_dump($arr_from_file);
    foreach($arr_from_file as $string){
        $newarray = explode(':',$string);
        // var_dump( $newarray);
        if($_POST['login'] ===  $newarray[0]){
        //    header("Location: tasks4.php");
        echo "Пользователь с таким логином:$newarray[0] уже существует";
           exit();
        }
    }
    file_put_contents($filename, PHP_EOL . join(':', $_POST), FILE_APPEND);
    echo"Вы успешно зарегистрированы";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks4</title>
</head>
<body>
    <form action="tasks4.php" method="post">
        <div>
            <h3>Форма регистрации</h3>
            <p>Введите логин:</p><input require minlength="6" name="login" type="text">
            <p>Введите пароль:</p><input require minlength="4" minlength="6" name="password" type="password">
            <input type="submit" value="Регистрация">
        </div>
    </form>
</body>
</html>