<?php
header('Content-Type: application/json');

// Recupero l'indirizzo del file che simula il database
$database_path = __DIR__ . '/../../database/tasks.json';

// leggo il contenuto di Json
$json_data = file_get_contents($database_path);

// lo converto in un array
$tasks = json_decode($json_data, true);

// Controlliamo se abbiamo qualcosa in post
$task_text = $_POST['task'] ?? null;
if ($task_text) {
    $new_task = ['text' => $task_text, 'done' => false, 'id' => count($tasks) + 1];

    $tasks[] = $new_task;

    $json_tasks = json_encode($tasks);
    file_put_contents($database_path, $json_tasks);


    echo json_encode($new_task);
} else {
    //Converto in Json
    echo json_encode($tasks);
}
