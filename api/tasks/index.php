<?php

// Recupero l'indirizzo del file che simula il database
$database_path = __DIR__ . '/../../database/tasks.json';

// leggo il contenuto di Json
$json_data = file_get_contents($database_path);

// lo converto in un array
$tasks = json_decode($json_data, true);

// Controlliamo se abbiamo qualcosa in post
$new_task = $_POST['task'] ?? null;
if ($new_task) {
    $tasks[] = $new_task;

    $json_tasks = json_encode($tasks);
    file_put_contents($database_path, $json_tasks);

    // Avviso chi mi riceve che la risposta è risposta è in json
    header('Content-Type: application/json');

    echo $new_task;
} else {
    // Avviso chi mi riceve che la risposta è risposta è in json
    header('Content-Type: application/json');

    //Converto in Json
    echo json_encode($tasks);
}
