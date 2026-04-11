<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 405,
            'message' => 'Method Not Allowed'
        ]
    ]);
    exit;
}

$headers = getallheaders();

if (!isset($headers['csrf_token'])) {
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 403,
            'message' => 'Forbidden'
        ]
    ]);
    exit;
}

require '../../conf/index.php';
require '../index.php';
$userController = new UserController($pdo);