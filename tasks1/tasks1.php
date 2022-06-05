<?php
// ЗАДАНИЯ К 7 ИЮНЯ (вторник):

// ЗАДАЧА 1
// создать новый массив из элементов массива $users, среди увлечений которых есть 'Фотография'
$users = [
    [
        'id' => 1,
        'name' => 'Александр',
        'age' => 46,
        'hobbies' => ['Чтение', 'Фотография']
    ],
    [
        'id' => 2,
        'name' => 'Ирина',
        'age' => 33,
        'hobbies' => ['Музыка', 'Фотография', 'Путешествия']
    ],
    [
        'id' => 3,
        'name' => 'Алексей',
        'age' => 28,
        'hobbies' => ['История', 'Реконструкция']
    ],
    [
        'id' => 4,
        'name' => 'Евгений',
        'age' => 26,
        'hobbies' => ['Спорт']
    ],
    [
        'id' => 5,
        'name' => 'Оксана',
        'age' => 22,
        'hobbies' => ['Спорт', 'Фотография']
    ],
];
$new_Users = [];
foreach ($users as $us){
    if (array_search('Оксана',$us) !== false){
       $new_Users[]= $us;
    }
};
var_dump($new_Users);
// $a1 = array('country' => array('Russia', 'Ukraine', 'Belarus'));
// var_dump($a1);

// ЗАДАЧА 2
// Дан массив $tours. Увеличить стоимость каждого тура на 10%. Стоимость австралийских туров на 12%
$tours = [
    [
        'id' => 1,
        'city' => 'Лондон',
        'price' => 3600,
        'country' => 'Великобритания'
    ],
    [
        'id' => 2,
        'city' => 'Осло',
        'price' => 2800,
        'country' => 'Норвегия'
    ],
    [
        'id' => 3,
        'city' => 'Сидней',
        'price' => 4100,
        'country' => 'Австралия'
    ],
    [
        'id' => 4,
        'city' => 'Канберра',
        'price' => 3900,
        'country' => 'Австралия'
    ]
];
foreach($tours as &$tour){
    if(array_search('Австралия',$tour) !== false){
        $tour['price'] = $tour['price'] + ($tour['price'] * (12 / 100));
    } else{
            $tour['price'] = $tour['price'] + ($tour['price'] * (10 / 100));
    }
};
var_dump($tours);

// ЗАДАЧА 3. Сгенерировать html на основе данных массива $items
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'https://picsum.photos/id/36/200/300',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'https://picsum.photos/id/36/200/300',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'https://picsum.photos/id/36/200/300',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task1</title>
</head>
<body>
<?php foreach($items as $item): ?>
<div>
    <h3><?= $item['title']?></h3>
    <p><?= $item['price']?></p>
    <img src="<?= $item['img']?>" alt="<?= $item['title']?>">
    <div style="background-color: aqua">
        Описание товара:
        <span>
        <?php foreach($item['description'] as $p): ?>
            <p><?= $p?></p>
            <?php endforeach; ?>
        </span>
    </div>
</div>
    <?php endforeach; ?>
</body>
</html>