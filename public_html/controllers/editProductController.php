<?php

require_once("./../db.php");
$id_product = $_GET['id_product'];
$productName = $_POST['name'];
$productCode = $_POST['code'];
$productColor = $_POST['color'];
$productPrice = $_POST['price'];
$productImageUrl = $_POST['product-image'];
$productType = $_POST['tipo-gorro'];
$productHasDiscount = $_POST['discount'];
$productDiscountPorcentage = $_POST['discount-percentage'];

$imagesDir = 'https://krokos.com.ar/img/productos/';
if (!$_FILES["product-image"]["name"] == "") {
    require_once("./uploadFileController.php");
    $imagePath = $imagesDir . $_FILES["product-image"]["name"];
} else {
    $imagePath = $productImageUrl;
}

// Incluimos el archivo para realizar el control del archivo ingresado y subirlo al servidor

// Colocamos valor 0 o 1 dependiendo si el producto tiene descuento o no
if (!$productHasDiscount) {
    $productHasDiscount = 0;
} else {
    $productHasDiscount = 1;
}

if (!$productDiscountPorcentage) {
    $productDiscountPorcentage = 0;
}

$query = "UPDATE products SET name = '$productName', code = '$productCode', color = '$productColor', price = '$productPrice', img_url = '$imagePath'
, model = '$productType', has_discount = '$productHasDiscount', porcentage_discount = '$productDiscountPorcentage' WHERE id_product = '$id_product'";

$result = mysqli_query($DB_conn, $query);
if ($result == 1) {
    header("Location: https://krokos.com.ar/admin/products.php", TRUE, 301);
    die();
} else {
    echo 'Hubo un problema al insertar el producto en la base de datos.';
}
