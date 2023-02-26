<?PHP
require_once("./../db.php");
session_start();
if ($_GET["action"] == "logout"){
    unset($_SESSION["admin"]);

    header('Location: https://krokos.com.ar/login.php', true, 301);

}
// Almacenamos en variables lo que recibimos del HTTP Post.
$emailEntered       = $_POST["email"];
$passwordEntered  = $_POST["password"];

$result = mysqli_query($DB_conn, 'SELECT password FROM `usuarios` WHERE email ="' . $emailEntered . '"');
if ($result) {
    if ($register = mysqli_fetch_array($result)) {
        if ($passwordEntered === $register['password']) {
            $_SESSION['admin'] = 1;
            header("Location: https://krokos.com.ar/admin/dashboard.php", TRUE, 301);
            die();
        } else {
            echo 'Contranseña incorrecta!!!';
        }
    }
}
if ($result->num_rows == 0) {
    echo 'Mail no registrado en la base de datos!';
}
