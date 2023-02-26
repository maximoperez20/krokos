    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://krokos.com.ar/css/login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://krokos.com.ar/css/logInBackground.css">
    </head>

    <body>
        <div class="container">
            <div class="body d-md-flex align-items-center justify-content-between">
                <div class="box-1 mt-md-0 mt-5 d-none d-lg-block d-xl-block d-md-block">
                    <img src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="" alt="">
                </div>
                <div class=" box-2 d-flex flex-column h-100">
                    <div class="mt-5">
                        <p class="mb-1 h-1">Inicio de sesión.</p>
                        <p class="text-muted mb-2">Ingrese al panel de administrador.</p>
                        <div>
                            <form action="https://krokos.com.ar/controllers/loginController.php" method="post">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailInput" name="email" placeholder="name@example.com">
                                <br />
                                <label for="passwordInput" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="passwordInput" placeholder="***********">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </form>
                        </div>

                    </div>
                    <div class="mt-auto">
                        <p class="footer text-muted mb-0 mt-md-0 mt-4">Krokos @2023
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
    </body>

    </html>