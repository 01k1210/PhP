<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    session_start();
    require_once 'linkSQL.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tb_usersJS WHERE login = :login AND password = :password";
    $statement = $connection->prepare($sql); //подготовленный запрос
    // выполнение подготовленного запроса 
    $data=[
        'login' =>  $login,
        'password' => $password
    ];

    $statement->execute($data);
    $result =  $statement->fetchAll(PDO::FETCH_ASSOC);

    // при совпадение логина из БД
    if(!isset($result[0]['login']) && !isset($result[0]['password'])){
        $result[0]['login'] = null;
        $result[0]['password'] = null;
    }
    if($login === $result[0]['login'] && $password === $result[0]['password']){
        $_SESSION['user'] = [
            "login" => $result[0]['login'],
            "telephone" => $result[0]['telephone'],
            "email" => $result[0]['email'],
            "img" => $result[0]['photo']
        ];
        echo "Вы успешно авторизированы!";
    }
    else{
        echo "Неверный Логин или пароль";
    }
}
