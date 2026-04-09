<?php
$main_dsn = "mysql";                # databse: mysql | postgre | sqlite | and more which supported PDO (https://www.php.net/manual/en/pdo.drivers.php)
$main_host = "localhost";           # databse: host server 
$main_user = "";                    # databse: username
$main_password = "";                # databse: password
$main_db = "";                      # databse: database name

$dsn = match($main_dsn) {
    'mysql' => "mysql:host=$main_host;dbname=$main_db;charset=utf8mb4",
    'pgsql' => "pgsql:host=$main_host;dbname=$main_db",
    'sqlite' => "sqlite:/path/to/your/database.db",
    'sqlsrv' => "sqlsrv:Server=$main_host;Database=$main_db",
    'oci' => "oci:dbname=//$main_host:1521/$main_db",
    default => throw new Exception("Unsupported database driver: $main_dsn")

    # this is not the full list. add to it (pull request to https://github.com/bulatik205/museum/)
};

$pdo = new PDO($dsn, $main_user, $main_password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => true,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
?>