<!-- <?php include('session-check.php'); ?> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/icon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="img/icon.png" alt="..." /></a>
                <button class="navbar-toggler" style="color:white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Presentación</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Acerca</a></li>
                        <li class="nav-item"><a class="nav-link" href="./login.php">log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">¡Siempre a tiempo!</div>
                <div class="masthead-heading text-uppercase">PaqueteriaExpress</div>
                <a class="btn btn-danger btn-xl text-uppercase" href="#services">Acerca De</a>
            </div>
        </header>

        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase" >PaqueteriaExpress</h2>
                    <h3 class="section-subheading text-muted" style="text-align: center;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laudantium cumque, enim quia magni dicta ipsam quos 
                        sint doloribus at iste sunt quidem nostrum laboriosam soluta molestias odit voluptatem in dolore culpa, incidunt 
                        voluptates delectus perferendis. Ipsa minima delectus alias?
                    </h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Tienda</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Diseño Simple y Elegante</h4>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Seguridad Básica</h4>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Objetivos:</h2>
                </div><br><br>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Misión:</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro cumque quis, aperiam dolore ipsa quo quaerat reprehenderit suscipit deleniti voluptas? 
                                </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Visión:</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"> 
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, placeat. Omnis sequi eos vero non, quod doloremque facere dolore commodi!
                                </p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image bg-danger">
                            <h4>
                                LLEGAMOS <br>
                                TU <br>
                                VIDA !!!<br>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contáctanos</h2>
                    <h3 class="section-subheading text-muted">Aqui te dejamos un apartado para que nos envies tus quejas, sugerencias y opiniones.</h3>
                </div>
                <form action="Contactanos.php" method="POST">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input type="text" class="form-control" placeholder="Nombre completo" name="Nombre" id="Nombre" required data-validation-required-message="Por favor, coloca tu nombre completo" /><br><br>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Es requerido un nombre</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input type="email" class="form-control" placeholder="Correo" name="Correo" id="Correo" required data-validation-required-message="Por favor, coloca tu correo electrónico" /><br><br>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Es requerido un correo</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Correo no vlido</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input type="tel" class="form-control" placeholder="Telefono" name="Telefono" id="Telefono" required data-validation-required-message="Por favor, coloca tu Telefono" /><br><br>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Requiere un número de teléfono</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea rows="10" cols="100" class="form-control" placeholder="Mensaje" name="Mensaje" id="Mensaje" required data-validation-required-message="Por favor, coloca tu mensaje" minlength="5" data-validation-minlength-message="Mínimo 5 caracteres" maxlength="999" style="resize:none"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Es necesario llenar este campo.</div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Envío de formulario exitoso.</div>
                            To activate this form, sign up at
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error al mandar el mensake!</div></div>
                    <div class="text-center"><button class="btn btn-danger btn-xl text-uppercase" id="submitButton" type="submit">Enviar</button></div>
                </form>
            </div>
        </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="JS/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>