<?php
session_start();
if (!empty($_GET["action"])) {
  if ($_GET["action"] == "remove") {
    if (!empty($_SESSION["cart_item"])) {
      foreach ($_SESSION["cart_item"] as $k => $v) {
        if ($_GET["code"] == $k)
          unset($_SESSION["cart_item"][$k]);
        if (empty($_SESSION["cart_item"]))
          unset($_SESSION["cart_item"]);
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de Compras</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="https://krokos.com.ar/img/icono.png" />

  <script src="https://kit.fontawesome.com/61bbd414f9.js" crossorigin="anonymous"></script>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <link rel="stylesheet" href="cart.css">
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


  <section class="h-100 h-custom" style="background-color: #d2c9ff;">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Carrito de Compras</h1>
                      <h6 class="mb-0 text-muted"><?= count($_SESSION['cart_item']) . ' items'; ?></h6>
                    </div>
                    <form action="https://krokos.com.ar/checkout.php" method="post">
                      <?php
                      foreach ($_SESSION['cart_item'] as $item) {
                      ?>
                        <hr class="my-4">

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                          <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src=<?= $item['img_url'] ?> class="img-fluid rounded-3" alt="<?= $item['name'] ?>">
                          </div>
                          <div class="col-md-3 col-lg-3 col-xl-3">
                            <h6 class="text-muted">Shirt</h6>
                            <h6 class="text-black mb-0"><?= $item['name'] ?></h6>
                            <p><?= $item['quantity'] . ' Unidades.' ?></p>
                            <br>
                            <h6><i class="fa-brands fa-spotify" display="inline-block"></i> Link de la cancion
                              <input class="form-control" type="text" name="<?= $item['code'] ?>" required/>
                            </h6>
                          </div>
                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">$<?= $item['price'] ?></h6>
                          </div>
                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="https://krokos.com.ar/cart/cart.php?action=remove&code=<?= $item['code'] ?>" class="text-muted"><i class="fas fa-times"></i></a>
                          </div>
                        </div>
                      <?php
                      }
                      if (count($_SESSION['cart_item']) == 0) {
                      ?>
                        <h4>No tienes productos en tu carrito.</h4>
                      <?php
                      } else {
                      ?>
                        <button style="float: right;" type="submit" class="btn btn-lg btn-primary">Continuar</button>
                      <?php
                      }
                      ?>
                    </form>
                    <hr class="my-4">

                    <div class="pt-5">
                      <h6 class="mb-0"><a href="https://krokos.com.ar/" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Volver a la tienda</a></h6>
                    </div>

                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Krokos &copy; Your Website 2022</p>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>

</body>

</html>