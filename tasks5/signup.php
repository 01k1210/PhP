<?php
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
       var_dump('INSERT', $result);

    }else{
        $_SESSION['message'] = "введённые пароли не свопадают";
        header('Location: register.php');
    }










?>