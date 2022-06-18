<?php
$instruments = require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
    <?php foreach($instruments as $instrument): ?>
        <div>
            <h3><?=$instrument['title']?></h3>
            <img style="width: 300px;" src="images/<?=$instrument['image']?>" alt="">
            <p><?=$instrument['price']?>Rub.</p>
            <?php if($instrument['count'] === 0): ?>
                <p style="color: red">Товара нет в наличии</p>
                <?php else :?>
                    <p>Остаток на складе: <?=$instrument['count']?>шт.</p>
                    <button class="open" data-id="<?=$instrument['id']?>">Подробнее</button>

                    <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <section id="modal">
    <div class="modal-wrap">
    </div>
   </section>
   <div class="input-wrap">
    <p>Поск по сайту:</p>
    <input name="name" type="text">
    <button class="btn">Найти</button>
   </div>



   
   <script src="scripts.js"></script>
</body>
</html>