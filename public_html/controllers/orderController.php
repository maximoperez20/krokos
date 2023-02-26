<?php
require_once("./../db.php");
session_start();
$id_order = $GET['id_order'];

$customer_name = $_POST['firstname'];
$customer_lastname = $_POST['lastname'];
$customer_phone = $_POST['phone'];
$customer_email = $_POST['email'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$country = $_POST['country'];
$state = $_POST['state'];
$cp = $_POST['cp'];
$id_products = array();
$cart = $_SESSION['cart_item'];
$currentDate = date("Y-m-d");
$totalOrder = 0;
foreach ($_SESSION["cart_item"] as $producto) {
    $totalOrder = $totalOrder + ($producto['price'] * $producto['quantity']);
}
echo $totalOrder . '<br>';

foreach ($cart as $cartItem => $v) {
    array_push($id_products, $cartItem);
}
switch ($_POST['paymentMethod'][0]) {
    case 'Efectivo':
        $paymentMethod = 1;
        break;
    case 'Transferencia bancaria':
        $paymentMethod = 2;
        break;
    case 'Tarjeta de credito':
        $paymentMethod = 3;
        break;
}

// Creamos un numero de referencia aleatorio
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
    . '0123456789'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

// Insertamos en la base de datos la orden y datos del cliente
$query = "INSERT INTO `orders` (`id_order`, `reference`, `customer_name`, `customer_lastname`, `customer_phone`, `customer_email`, `address`, `address2`, `country`, `state`, `cp`, `payment`, `total`, `date_add`)
VALUES ( NULL, '" . $rand . "', '" . $customer_name . "', '" . $customer_lastname . "', '" . $customer_phone . "', '" . $customer_email . "', '" . $address . "', '" . $address2 . "', '" . $country . "', '" . $state
    . "', '" . $cp . "', '" . $paymentMethod . "', '" . $totalOrder . "', '" . $currentDate . "');";

if (mysqli_query($DB_conn, $query)) {
    $id_order = mysqli_insert_id($DB_conn); // Obtenemos el ID de la orden recién insertada
} else {
    echo "Ha ocurrido un error al crear la orden: " . mysqli_error($conn);
    exit();
}

// Si la insercion de la orden fue exitosa, insertamos en la tabla order_items los productos de la orden
foreach ($_SESSION["cart_item"] as $producto) {
    $id_product = $producto["id_product"];
    $quantity = $producto["quantity"];
    $price = $producto["price"];
    $song_url = $producto['song_url'];

    $sql = "INSERT INTO order_items (id_order, id_product, quantity, unit_price, song_url)
    VALUES ('$id_order', '$id_product', '$quantity', '$price', '$song_url');";
    // Ejecutamos la consulta
    if (!mysqli_query($DB_conn, $sql)) {
        echo "Ha ocurrido un error al insertar un elemento de orden: " . mysqli_error($conn);
        exit();
    }
}
// Cerramos la conexión

// unset($_SESSION["cart_item"]);
mysqli_close($conn);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Confirmacion de orden</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="https://krokos.com.ar/img/icono.png" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="py-5 text-center">

            <img class="d-block mx-auto mb-4" src="https://krokos.com.ar/img/icono.png" alt="" width="72" height="72">
            <h2>Confirmacion de orden</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-6" style="padding: 4rem 3rem;">
                <h5 class="mb-3 text-center">¡Felicitaciones!</h5>
                <h6 class="mb-3 text-center">Su orden fue generada con exito.</h6>
            </div>
            <div class="text-center">
                <a href="/">
                    <button class="btn btn-primary" type="button">Volver a la tienda</button>
                </a>
            </div>
        </div>

    </div>
</body>

</html>