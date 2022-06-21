<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $files = $_FILES;
    $count = count($files['picture']['error']);
    for($index = 0; $index < $count; $index +=1){
            $file_error = $files['picture']['error'][$index];
            $file_size = $files['picture']['size'][$index];
            $file_name = $files['picture']['name'][$index];
            $file_type = $files['picture']['type'][$index];
            $tmp_name = $_FILES['picture']['tmp_name'][$index];

            if($file_error === 0 &&  $file_size <= 200000 && ($file_type === 'image/png' || $file_type === 'image/jpeg')){
                echo 'файл прошёл все проверки' . $file_name;
                $file_name = microtime() . $file_name;
                $move_result = move_uploaded_file($tmp_name,  "images/$file_name");
                if ($move_result) echo "Файл $file_name успешно загружен";
            }
            
            elseif($file_error !== 0){
                echo 'Ошибка в загрузке файла' . $file_name;
                } 
            
            elseif($file_size >200000){
                echo 'Ошибка в размере файла' . $file_name ;
                } 
            
            
            elseif($file_type !== 'image/png' && $file_type !== 'image/jpeg'){
                    echo 'Ошибка в типе файла' . $file_name;
                } 
}
}