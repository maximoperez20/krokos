<?php
// getting all values from the HTML form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
}

// database details
$host = "localhost";
$username = "krokos";
$password = "JUA752MAX423";
$dbname = "krokos_final";

// creating a connection
$con = mysqli_connect($host, $username, $password, $dbname);

// to ensure that the connection is made
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}

//obtiene long de un string
$req = (strlen($name) * strlen($email) * strlen($subject) * strlen($message)) or die("<h2>Debe completar todos los campos para finalizar la operación.</h2>");

// using sql to create a data entry query
$sql = "INSERT INTO contactos VALUES ('', '$name', '$email', '$subject', '$message')";
// $sql = "INSERT INTO contactos (id_contact, name, mail, subject, message) VALUES ('', '$name', '$email', '$subject', '$message')";

// send query to the database to add values and confirm if successful
$rs = mysqli_query($con, $sql);
if ($rs) {
    echo '
        
        <h2>Los datos se han enviado correctamente!</h2>
        <h3><a href="https://krokos.com.ar/">Volver a la página principal</a></h3>
        	';

    sleep(5);
    header("Location: https://krokos.com.ar/", TRUE, 301);
           die();
}


// close connection
mysqli_close($con);

?>