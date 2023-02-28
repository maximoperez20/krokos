<?php
include_once('./../db.php');
session_start();
if ($_SESSION['admin'] != 1) {
    header("Location: https://krokos.com.ar/login.php", TRUE, 301);
    die();
}

if (!$_GET['id_product']) {
    echo '<h2>Se producido un error</h2> <p>Porfavor indique un id de producto.</p>';
    exit();
}
$id_product = $_GET['id_product'];
$result = mysqli_query($DB_conn, 'SELECT p.id_product, p.code, p.name, c.name as color, m.name as model , p.price, p.has_discount, p.porcentage_discount, p.img_url, p.date_release
FROM products p
INNER JOIN colors c ON c.id_color = p.color
INNER JOIN models m ON m.id_model = p.model WHERE id_product='.$id_product.';');
$product = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Panel de Administrador Kròkos</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="https://krokos.com.ar/controllers/loginController.php?action=logout">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://krokos.com.ar/admin/dashboard.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://krokos.com.ar/admin/orders.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Ordenes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://krokos.com.ar/admin/products.php">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://krokos.com.ar/admin/contactos.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Mensajes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Editar producto</h1>

                </div>
                <div id="new-product" style="
                    border: 1px solid black;
                    border-radius: 2%;
                    width: 40%;
                    margin: 0 auto;
                    padding: 2rem;
                ">
                    <!-- formulario para la carga de productos -->
                    <form method="POST" action="https://krokos.com.ar/controllers/editProductController.php?id_product=<?=$product['id_product']?>" enctype="multipart/form-data">
                        <input type="text" style="display: none;" name="product-image" value="<?= $product['img_url'] ?>">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nombre de producto</label>
                            <input class="form-control" value="<?= $product['name'] ?>" type="text" name="name" id="name" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="code">Codigo de producto</label>
                            <input class="form-control" value="<?= $product['code'] ?>" type="text" name="code" id="code" required />
                        </div class="mb-3">
                        <label class="form-label">Imagen actual del producto</label>
                        <br />
                        <img src="<?= $product['img_url'] ?>" width="150" height="150" alt="product-img" />
                        <div>

                        </div>
                        <div class="mb-3">
                            <label for="product-image" class="form-label">Modificar Imagen del producto</label>
                            <input class="form-control" type="file" id="formFile" name="product-image" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="color">Color</label>
                            <select class="form-control" name="color" id="color">
                                <option value="1" <?php if ($product['color'] == 'Blanco') echo 'selected' ?>>Blanco</option>
                                <option value="2" <?php if ($product['color'] == 'Negro') echo 'selected' ?>>Negro</option>
                                <option value="3" <?php if ($product['color'] == 'Rojo') echo 'selected' ?>>Rojo</option>
                                <option value="4" <?php if ($product['color'] == 'Azul') echo 'selected' ?>>Azul</option>
                                <option value="5" <?php if ($product['color'] == 'Rosa') echo 'selected' ?>>Rosa</option>
                                <option value="6" <?php if ($product['color'] == 'Naranja') echo 'selected' ?>>Naranja</option>
                                <option value="7" <?php if ($product['color'] == 'Violeta') echo 'selected' ?>>Violeta</option>
                                <option value="8" <?php if ($product['color'] == 'Lila') echo 'selected' ?>>Lila</option>
                                <option value="9" <?php if ($product['color'] == 'Gris') echo 'selected' ?>>Gris</option>
                                <option value="10" <?php if ($product['color'] == 'Verde') echo 'selected' ?>>Verde</option>
                                <option value="11" <?php if ($product['color'] == 'Beige') echo 'selected' ?>>Beige</option>
                                <option value="12" <?php if ($product['color'] == 'Marron') echo 'selected' ?>>Marron</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tipo-gorro">Tipo de gorro</label>
                            <select class="form-control" name="tipo-gorro" id="tipo-gorro">
                                <option value="1" <?php if ($product['model'] == 'Gorra curva') echo 'selected' ?>>Gorra curva</option>
                                <option value="2" <?php if ($product['model'] == 'Pilusos') echo 'selected' ?>>Pilusos</option>
                                <option value="3" <?php if ($product['model'] == 'Pasa montaña') echo 'selected' ?>>Pasa montaña</option>
                                <option value="4" <?php if ($product['model'] == 'Gorro de lana') echo 'selected' ?>>Gorro de lana</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price">Precio</label>
                            <input class="form-control" value="<?= $product['price'] ?>"type="number" name="price" id="price" required />
                        </div>
                        <div class="mb-3">
                            <input class="form-checkbox" <?php if($product['has_discount'] == 1) echo 'checked';?> type="checkbox" name="discount" id="discount" />
                            <label class="form-label" for="discount">Descuento</label>
                        </div>
                        <div class="mb-3">
                            <label class="d-block form-label" for="discount-percentage">Porcentaje de descuento</label>
                            <input class="form-control" type="number" <?php if($product['porcentage_discount'] > 0 && $product['has_discount'] == 1){ echo 'value="'.$product['porcentage_discount'].'"';}else{echo 'disabled';}?> name="discount-percentage" id="discount-percentage" max="100" min="0" />
                        </div>

                        <button class="btn btn-success" type="submit">Listo</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Utilizamos javascript para habilitar/deshabilitar input de porcentaje de descuento dependiendo si el checkbox de descuento esta activado -->
    <script>
        var checked = true;
        document.getElementById("discount").onchange = function() {
            checked = !checked;
            document.getElementById("discount-percentage").value = null;
            document.getElementById("discount-percentage").disabled = !this.checked;
        };
    </script>
    <!-- Aplicamos inline-style para los input de precio y porcentaje de descuento -->
    <style>
        #discount-percentage,
        #price {
            width: 25%;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://krokos.com.ar/admin/dashboard.js"></script>
</body>

</html>