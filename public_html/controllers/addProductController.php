<?php

require_once("./../db.php");

$productName = $_POST['name'];
$productCode = $_POST['code'];
$productColor = $_POST['color'];
$productPrice = $_POST['price'];
$productType = $_POST['tipo-gorro'];
$productHasDiscount = $_POST['discount'];
$productDiscountPorcentage = $_POST['discount-percentage'];


$imagesDir = 'https://krokos.com.ar/img/productos/';
$imagePath = $imagesDir . $_FILES["product-image"]["name"];

// Incluimos el archivo para realizar el control del archivo ingresado y subirlo al servidor
if (!$_FILES["product-image"]["name"] == "") {
    require_once("./uploadFileController.php");
}

// Colocamos valor 0 o 1 dependiendo si el producto tiene descuento o no
if (!$productHasDiscount) {
    $productHasDiscount = 0;
} else {
    $productHasDiscount = 1;
}

if (!$productDiscountPorcentage) {
    $productDiscountPorcentage = 0;
}

// Dia de hoy
$currentDate = date("Y-m-d");
$query = 'INSERT INTO products (name, code, color, model, price, has_discount, porcentage_discount, img_url, date_release) VALUES
("' . $productName . '", "' . $productCode . '", ' . $productColor . ', ' . $productType . ', ' . $productPrice . ', ' . $productHasDiscount . ', ' . $productDiscountPorcentage . ', "'
    . $imagePath . '", ' . $currentDate . ');';

$result = mysqli_query($DB_conn, $query);
if ($result == 1) {
    header("Location: https://krokos.com.ar/admin/products.php", TRUE, 301);
    die();
}{
echo 'Hubo un problema al insertar el producto en la base de datos.';
}
