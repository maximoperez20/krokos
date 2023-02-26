<?php
session_start();
if ($_SESSION['admin'] != 1) {
    header("Location: https://krokos.com.ar/login.php", TRUE, 301);
    die();
}

include_once('./../db.php');


if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $result = mysqli_query($DB_conn, 'SELECT * FROM orders where id_order =' . $orderId);

    $resultItems = mysqli_query($DB_conn, 'SELECT oi.id_product, oi.quantity, oi.unit_price, oi.song_url, p.name, p.code, p.img_url FROM `order_items` oi
    INNER JOIN products p ON p.id_product = oi.id_product
    where id_order =' . $orderId);

    if ($result->num_rows > 0) {
        if ($order = $result->fetch_assoc()) {
?>
            <!doctype html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                <meta name="generator" content="Hugo 0.104.2">
                <title>Administrador Kròkos</title>

                <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
                <link rel="icon" type="image/x-icon" href="https://krokos.com.ar/img/icon-admin.png">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
                                        <a class="nav-link" aria-current="page" href="https://krokos.com.ar/admin/dashboard.php">
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
                                        <a class="nav-link" href="https://krokos.com.ar/admin/newproduct.php">
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
                                <h1 class="h2">Detalle de orden</h1>
                                
                            </div>
                            <div class="order-detail">
                                <h6>ID Orden : <?=$_GET['order_id']?></h3>
                                <h6>N°Referencia : #<?=$order['reference']?></h3>
                                <div class="row">
                                    <div class="order-detail__customer col" style="background: #e9f6ff; border: black solid 1px; border-radius: 2%; padding: 2rem; margin: 2rem">
                                        <h3>Informacion del cliente</h3>
                                        <p> <b>Nombre:</b> <?= $order['customer_name'] ?> </p>
                                        <p> <b>Apellido:</b> <?= $order['customer_lastname'] ?> </p>
                                        <p> <b>Email:</b> <?= $order['customer_email'] ?> </p>
                                        <p> <b>Telefono:</b> <?= $order['customer_phone'] ?> </p>
                                    </div>
                                    <div class="order-detail__customer col" style="background: #e9f6ff; border: black solid 1px; border-radius: 2%; padding: 2rem; margin: 2rem">
                                        <h3>Direccion de envio</h3>
                                        <p> <b>Direccion:</b> <?= $order['address'] ?> </p>
                                        <p> <b>Direccion alternativa:</b> <?= $order['address2'] ?> </p>
                                        <p> <b>Pais:</b> <?= $order['country'] ?> </p>
                                        <p> <b>Provincia:</b> <?= $order['state'] ?> </p>
                                        <p> <b>Codigo Postal:</b> <?= $order['cp'] ?> </p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="order-detail__customer col" style="background: #e9f6ff; border: black solid 1px; border-radius: 2%; padding: 2rem; margin: 2rem">
                                        <h3>Informacion del carro</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="col-1">ID Producto</th>
                                                <th class="col-1">Codigo Producto</th>
                                                <th class="col-3">Producto</th>
                                                <th class="col-2">Link de la cancion</th>
                                                <th class="col-1">Cantidad</th>
                                                <th class="col-1">Precio unitario</th>
                                                <th class="col-1">Precio total</th>
                                            </tr>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($resultItems)) {
                                            ?>
                                                <tr>
                                                    <td><?= $row['id_product'] ?></td>
                                                    <td><?= $row['code'] ?></td>
                                                    <td><img src="<?= $row['img_url'] ?>" width="30" height="30"> <?= $row['name'] ?></td>
                                                    <td><?= $row['song_url'] ?></td>
                                                    <td><?= $row['quantity'] ?></td>
                                                    <td><?= '$' . number_format($row['unit_price']) ?></td>
                                                    <td><?= '$' . number_format($row['unit_price'] * $row['quantity'], 2) ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>


                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
                <script src="https://krokos.com.ar/admin/dashboard.js"></script>
            </body>

            </html>
<?php
        }
    } else {
        echo '<h1>Order not found</h1>';
    }
}
?>