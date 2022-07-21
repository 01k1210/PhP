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
    <!-- форма регистрации -->
        <form  name="registr" action="signup.php" method="post" enctype="multipart/form-data">
            <h1>Регистрация:</h1>
            <label for="login">Логин</label>
            <input required minlength="3" maxlength="20" name="login" type="text">
            <span class="check_log"></span>

            <label for="password">Пароль</label>
            <input required minlength="6" maxlength="30" name="password" type="password">
            <span></span>

            <label for="password_check">Повторите пароль</label>
            <input required name="password_check" type="password">
            <span class="check_out"></span>

            <label for="photo">Изображение профиля</label>
            <input name="photo" type="file">
            <span class="out"></span>

            <label for="telephone">Телефон</label>
            <input name="telephone" type="number">
            <span></span>

            <label for="email">Почта</label>
            <input required name="email" type="email">
            <span></span>
            <input type="submit">
            <p>У вас уже есть аккаунт? - <a href="index.php">Авторизируйтесь!</a></p>
        </form>
        <script src="script.js"></script>
</body>
</html>
