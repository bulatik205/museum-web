<?php
require '../autoload.php';
use App\Controllers\CsrfController;

$csrf = new CsrfController();
if (empty($csrf->getCSRF())) {
    $csrf->setCSRF($csrf->generateCSRF());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registartion</title>
    <link rel="stylesheet" href="../source/css/pages/auth/index.css">
</head>
<body>
    <main class="main">
        <div class="main--body">
            <h1>Registration</h1>

            <fieldset>
                <legend>Username</legend>
                <input type="text" minlength="4" maxlength="255" id="username">
            </fieldset>

            <fieldset>
                <legend>Password</legend>
                <input type="password" minlength="4" maxlength="255" id="password">
            </fieldset>

            <fieldset>
                <legend>Repeat password</legend>
                <input type="text" minlength="4" maxlength="255" id="repeat-password">
            </fieldset>

            <button class="main--body--button--first">Registration</button>
            <button onclick="window.location.href='/login/'">Login</button>
        </div>
    </main>

    <script>
        window.CSRF_TOKEN = '<?= $csrf->getCSRF() ?>';
    </script>
</body>
</html>