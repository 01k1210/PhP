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
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <h1>Регистрация:</h1>

            <?php
            if(isset($_SESSION['message'])){
                echo '<p class="massage"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?> 
            <label for="login">Логин</label>
            <input name="login" type="text">
            <label for="password">Пароль</label>
            <input name="password" type="password">
            <label for="password_check">Повторите пароль</label>
            <input name="password_check" type="password">
            <label for="photo">Изображение профиля</label>
            <input name="photo" type="file">
            <label for="telephone">Телефон</label>
            <input name="telephone" type="number">
            <label for="email">Почта</label>
            <input name="email" type="email">
            <input type="submit">
            <p>У вас уже есть аккаунт? - <a href="index.php">Авторизируйтесь!</a></p>
        </form>
</body>
</html>
