<?php

$todoName = $_POST['todo_name'];
$todoName = trim($todoName);

if($todoName) {
    if(empty($todoName)) {

    } else {
        if(file_exists('todo.json')) {
            $json = file_get_contents('todo.json');
            $jsonArray = json_decode($json, true);
        } else {
            $jsonArray = [];
        }
        $jsonArray[$_POST['todo_name']] = ['completed' => false];

        file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
    }

}

header('Location: main.php');
?>