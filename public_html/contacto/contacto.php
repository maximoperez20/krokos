<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Kròkos</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="https://krokos.com.ar/img/icono.png" />
	<!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">


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
    <header class="bg-dark py-5 ">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder krokos">Kròkos</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lleva tu canción favorita a todos lados</p>
            </div>
        </div>
    </header>

	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Ponente en contacto</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
							Su mensaje fue enviado, gracias!
				      		</div>
									<form action="cont.php" method="POST">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Nombre Completo</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Dirección de Correo Electrónico</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Tema</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Mensaje</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" required></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-outline-dark">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Contactate con nosotros</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Dirección:</span> Córdoba</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Phone:</span> <a href="tel://1234567920">+54 9 351 326 4076</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@krokos.com.ar</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Sitio web</span> <a href="https://krokos.com.ar/">krokos.com.ar</a></p>
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
            <p class="m-0 text-center text-white">Kròkos &copy; Your Website 2022</p>
        </div>
    </footer>

   <!-- Bootstrap core JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Core theme JS-->
   <script src="js/scripts.js"></script>

	</body>
</html>

