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
        <form name="index" action="signin.php" method="post" >
            <h1>Авторизация:</h1>
            <label for="login">Логин</label>
            <input required minlength="3" maxlength="20"  name="login" type="text">
            <span></span>
            <label for="password">Пароль</label>
            <input required minlength="6" maxlength="30" name="password" type="password">
            <span></span>
            <input type="submit">
            <p>У вас ешё нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a></p>
        </form>
        <script src="script(1).js"></script>
</body>
</html>
