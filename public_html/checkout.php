<?php
session_start();
$index = 0;
foreach ($_POST as $product_code => $song_url) {
    $index = 0;
    foreach ($_SESSION['cart_item'] as $producto => $valoresProducto) {

        if ($product_code == $valoresProducto['code']) {
            $_SESSION['cart_item'][$valoresProducto['code']]['song_url'] = $song_url;
        }
        $index = $index + 1;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

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

    <div class="container">
        <div class="py-5 text-center">

            <img class="d-block mx-auto mb-4" src="https://krokos.com.ar/img/icono.png" alt="" width="72" height="72">
            <h2>Checkout</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 border border-primary rounded" style="padding: 4rem 3rem;">
                <h4 class="mb-3">Direccion de envio</h4>
                <form class="needs-validation" method="POST" action="https://krokos.com.ar/controllers/orderController.php" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstname">Nombre</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                            <div class="invalid-feedback">
                                Es requerido un nombre valido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname">Apellido</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                            <div class="invalid-feedback">
                                Es requerido un apellido valido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Telefono</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+54</span>
                            </div>
                            <input type="text" class="form-control" id="phone" placeholder="351 803 7592" name="phone" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Es requerido un telefono valido.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Por favor ingresa un email valido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        <div class="invalid-feedback">
                            Por favor ingresa una direccion valida.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Direccion 2 <span class="text-muted">(Opcional)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Pais</label>
                            <select class="custom-select d-block w-100" id="country" required name="country">
                                <option value="Argentina" selected>Argentina</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor ingresa un pais valido.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">Provincia</label>
                            <select class="custom-select d-block w-100" id="state" name="state" required>
                                <option value="Buenos Aires">Buenos Aires</option>
                                <option value="Ciudad Autónoma de Buenos Aires">
                                    Ciudad Autónoma de Buenos Aires
                                </option>
                                <option value="Catamarca">Catamarca</option>
                                <option value="Chaco">Chaco</option>
                                <option value="Chubut">Chubut</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Corrientes">Corrientes</option>
                                <option value="Entre Ríos">Entre Ríos</option>
                                <option value="Formosa">Formosa</option>
                                <option value="Jujuy">Jujuy</option>
                                <option value="La Pampa">La Pampa</option>
                                <option value="La Rioja">La Rioja</option>
                                <option value="Mendoza">Mendoza</option>
                                <option value="Misiones">Misiones</option>
                                <option value="Neuquén">Neuquén</option>
                                <option value="Río Negro">Río Negro</option>
                                <option value="Salta">Salta</option>
                                <option value="San Juan">San Juan</option>
                                <option value="San Luis">San Luis</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Santa Fe">Santa Fe</option>
                                <option value="Santiago del Estero">Santiago del Estero</option>
                                <option value="Tierra del Fuego, Antártida e Islas del Atlántico Sur">
                                    Tierra del Fuego
                                </option>
                                <option value="Tucumán">Tucumán</option>

                            </select>
                            <div class="invalid-feedback">
                                Por favor ingresa una provincia valido.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cp">Codigo postal</label>
                            <input type="text" class="form-control" id="cp" name="cp" required>
                            <div class="invalid-feedback">
                                Por favor ingresa un codigo postal valido.
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3">Pago</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" value="Efectivo" name="paymentMethod[]" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">Efectivo</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="credit" value="Tarjeta de credito" name="paymentMethod[]" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">Tarjeta de credito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" value="Transferencia bancaria" name="paymentMethod[]" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Transferencia bancaria</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Finaliza orden</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2020 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        })()
    </script>

</html>