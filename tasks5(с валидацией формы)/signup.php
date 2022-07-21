<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once 'linkSQL.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    if(isset($_FILES['picture']['name'])){
        $path = 'uploads/' . time() . $_FILES['picture']['name'];
        move_uploaded_file($_FILES['picture']['tmp_name'], $path);
    }

    if(!isset($path)){
        $path = null;
    }
    else{
        $tb_users = "INSERT INTO tb_usersJS(login, password, email, telephone, photo)VALUES (:login, :password, :email, :telephone, :photo)";
        $data = [ 
            'login' => $login,
            'password' => $password,
            'email' =>  $email,
            'telephone'=> $telephone,
            'photo'=> $path
            ];
        
        $statement = $connection->prepare($tb_users);
        $result = $statement->execute($data);
    }

    echo "Вы успешно зарегистрированы!";
}

