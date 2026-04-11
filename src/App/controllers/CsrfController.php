<?php
namespace App\Controllers;

class CsrfController {
    public function __construct() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function getCSRF() : string {
        return $_SESSION['csrf_token'] ?? '';
    }

    function setCSRF(string $token) : void {
        $_SESSION['csrf_token'] = $token;
    } 

    function generateCSRF() : string {
        return bin2hex(random_bytes(32));
    }
}