    <?php
    session_start();
    unset($_SESSION["admin"]);
    header('Location: https://krokos.com.ar/login.php', true, 301);
    die();
