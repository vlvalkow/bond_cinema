<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    [
        'title' => 'Lorem',
    ],
    [
        'title' => 'Ipsum',
    ],
    [
        'title' => 'Dolor',
    ],
    [
        'title' => 'Sit',
    ],
    [
        'title' => 'Amet',
    ],
]);
