<?php

session_start();
include_once("./dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id_product='" . $_GET["id_product"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array
                ('name'=>$productByCode[0]["name"],
                'id_product'=>$productByCode[0]["id_product"],
                'code'=>$productByCode[0]["code"],
                'quantity'=>$_POST["quantity"],
                'price'=>$productByCode[0]["price"],
                'img_url'=>$productByCode[0]["img_url"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["code"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                }
            }
        break;
    }
    }

$result = $db_handle->runQuery("SELECT * FROM products");
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kròkos</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="https://krokos.com.ar/img/icono.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 100%;
        }
    </style>


</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top zindex-fixed w-100">
        <div class="container px-4 px-lg-5">

            <a class="navbar-brand" href="https://krokos.com.ar/">
                <img src="https://krokos.com.ar/img/icono.png" class="brand" alt="krokos" style="width: 50px">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="https://krokos.com.ar/about-us/Acerca-de.html">Acerca de nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://krokos.com.ar/contacto/contacto.php">Contacto</a></li>
                </ul>



                <form class="d-flex" style="margin: auto 0">
                    <a href="https://krokos.com.ar/cart/cart.php" <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?= count($_SESSION['cart_item']) ?></span>
                        </button></a>

                </form>

            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Kròkos</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lleva tu canción favorita a todos lados</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <?php
        foreach ($_SESSION['cart_item'][0] as $variable => $valor) {
            echo $variable . " = " . $valor . "<br>";
        }
        ?>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($result as $register) {
                ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <?php if ($register['has_discount']) { ?>
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo '- ' . $register['porcentage_discount'] . '%' ?></div>
                            <?php
                            } ?>
                            <!-- Product image-->
                            <img class="card-img-top" src=<?= $register['img_url'] ?> alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $register['name'] ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <?php echo '$ ' . $register['price'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <form action="https://krokos.com.ar/?action=add&id_product=<?= $register['id_product'] ?>" method="post">
                                    <div class="cart-action">
                                        <input type="number" class="form-control product-quantity" name="quantity" value="1" style="width: 28%; display: inline-block;" />
                                        <input class="btn add-to-cart-btn" type="submit" value="Add to Cart" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>