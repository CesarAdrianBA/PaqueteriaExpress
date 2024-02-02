<?php include './logic/logicaLogin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>login</title>
</head>
<body>
    <div class="container-fluid box-container ">
        <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5 form__box-register"> 
                    <form action="#" method="post" class="form-container" id="formRegister">
                        <div class="register">
                            <h1>Registro</h1>
                            <div class="form-group">
                
                                <div class="form-floating mb-3">
                                    <input type="text"
                                    class="form-control" name="form__inputRegistro-nombre" id="form__inputRegistro-nombre" aria-describedby="helpId" placeholder="" required>
                                    <label for="floatingInput" class="form-label">Nombre</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text"
                                    class="form-control" name="form__inputRegistro-apellidos" id="form__inputRegistro-apellidos" aria-describedby="helpId" placeholder="" required>
                                    <label for="floatingInput" class="form-label">Apellidos</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text"
                                    class="form-control" name="form__inputRegistro-edad" id="form__inputRegistro-edad" aria-describedby="helpId" placeholder="" required>
                                    <label for="floatingInput" class="form-label">Edad</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text"
                                    class="form-control" name="form__inputRegistro-cargo" id="form__inputRegistro-cargo" aria-describedby="helpId" placeholder="" required>
                                    <label for="floatingInput" class="form-label">Cargo</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" name="form__inputRegistro-nivel" id="form__inputRegistro-nivel" required>
                                        <option value="1">Administrador</option>
                                        <option value="2" selected>Usuario común</option>
                                    </select>
                                    <label for="floatingInput" class="form-label">Nivel</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text"
                                    class="form-control" name="form__inputRegistro-usuario" id="form__inputRegistro-usuario" aria-describedby="helpId" placeholder="" required>
                                    <label for="floatingInput" class="form-label">Nombre de usuario</label>
                                </div>
                
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="form__inputRegistro-email" id="form__inputRegistro-email" placeholder="name@example.com" required>
                                    <label for="floatingInput">Correo electrónico</label>
                                </div>
                
                
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="form__inputRegistro-contrasena" id="form__inputRegistro-contrasena" placeholder="Password" required>
                                    <label for="form__inputRegistro-contrasenya">Contraseña</label>
                                </div>
                
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="form__inputRegistro-confirmarContrasena" id="form__inputRegistro-confirmarContrasena" placeholder="Password" required>
                                    <label for="form__inputRegistro-confirmarContrasenya">Confirmar Contraseña</label>
                                </div>
                                
                                <button type="submit" class="btn form-control custom-btn register-button mt-5" value='Registrar' name='Registrar'>Registrar</button>
                                <p><a href="#" class="link-opacity-75" onClick="mostrarLogin()">Ingresar</a></p>

                                <?php if (isset($error_message)): ?>
                                    <p style="color: red;"><?php echo $error_message; ?></p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-8 col-lg-5 form__box-login">

                    <form action="#" method="post" class="form-container" id="formLogin">
                        <div class="login">
                            <h1>Login</h1><br>
                            <div class="img-logo">
                                <img src="./img/PatoSecreto.jpg" alt="" />
                            </div>
                            <div class="form-group2">
                
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="form__input-email" name="form__inputLogin-email" placeholder="name@example.com" required>
                                    <label for="floatingInput">Correo electrónico</label>
                                </div>
                
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="form__input-password" name="form__inputLogin-password" placeholder="Password" required>
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                
                                <button type="submit" class="btn form-control login-btn mt-5" value='Login' name='Login'>Ingresar</button>
                
                                <p><a href="#" class="link-opacity-75" onClick="mostrarRegistro()">Registrarse</a></p>
                
                                <?php if (isset($error_message)): ?>
                                    <p style="color: red;"><?php echo $error_message; ?></p>
                                <?php endif; ?>
                
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./JS/login.js"></script>
</body>
</html>