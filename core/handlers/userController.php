<?php
class UserController {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->pdo = $pdo;
    }

    public function isAuthenticated() : bool {
        if (empty($_SESSION['session_token'])) {
            return false;
        }
        
        $stmt = $this->pdo->prepare("SELECT 1 FROM `users` WHERE `session_token` = ? LIMIT 1");
        $stmt->execute([$_SESSION['session_token']]);
        
        if (!$stmt->fetch()) {
            unset($_SESSION['session_token']);
            return false;
        }
        
        return true;
    }
}