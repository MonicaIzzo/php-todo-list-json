<?php

// Dati di base

$database_path = __DIR__ . '/../../database/tasks.json';

$json_data = file_get_contents($database_path);

$tasks = json_decode($json_data, true);

// Avviso che la risposta è in json
header('Content-Type: application/json');

//Converto in Json
echo json_encode($tasks);
