<?php
session_start();
$response = [
    'login' => isset($_SESSION['login']) && isset($_SESSION['usr'])
];

echo json_encode($response);
?>
