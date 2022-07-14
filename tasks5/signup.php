<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    session_start();
    require_once 'linkSQL.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    if($password === $password_check){
        $path = 'uploads/' . time() . $_FILES['photo']['name'];
        if(!move_uploaded_file($_FILES['photo']['tmp_name'], $path)){
            $_SESSION['message'] = "Ошибка при загрузке файлов";
            header('Location: register.php');
        }
        //Проверка на совпадение логина, перед записью в БД
        $chech_us = "SELECT login FROM tb_users WHERE login = :login";
        $statement = $connection->prepare($chech_us);
        $us = [
            'login' =>  $login,
        ];
        $statement->execute($us);
        $result =  $statement->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            $_SESSION['message'] = "Пользователь с таким логином: $login уже существует ";
            header('Location: register.php');
        }
        else {
            $tb_users = "INSERT INTO tb_users(login, password, email, telephone, photo)VALUES (:login, :password, :email, :telephone, :photo)";
            $data = [ //обязательно важна последовательность
               'login' => $login,
               'password' => $password,
               'email' =>  $email,
               'telephone'=> $telephone,
               'photo'=> $path
            ];
    
            $statement = $connection->prepare($tb_users);
            $result = $statement->execute($data);
            $_SESSION['message'] = "Авторизация прошла успешно";
            header('Location: index.php');
        }



    }else{
        $_SESSION['message'] = "введённые пароли не свопадают";
        header('Location: register.php');
    }
}

?>