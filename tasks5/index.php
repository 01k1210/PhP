<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: profile.php');
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
    <!-- форма авторизации -->
        <form action="signin.php" method="post" >
            <h1>Авторизация:</h1>
            <?php
            if(isset($_SESSION['message'])){
                echo '<p class="massage"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?> 
            <label for="login">Логин</label>
            <input  name="login" type="text">
            <label for="password">Пароль</label>
            <input name="password" type="password">
            <input type="submit">
            <p>У вас ешё нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a></p>
        </form>
</body>
</html>
