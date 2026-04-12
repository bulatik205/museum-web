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

require '../../../autoload.php';

use App\Controllers\UserController;

$userController = new UserController($pdo);
if ($userController->isAuthenticated()) {
    echo json_encode([
        'success' => false,
        'error' => [
            'code' => 409,
            'message' => 'Conflict'
        ]
    ]);
    exit;
}