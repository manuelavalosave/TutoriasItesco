<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once 'app/validacionSesion.inc.php';
include_once 'plantillas/index_dec.php';
?>
<body id='InicioSesion'>
    <nav class="navbar navbar-expand-md navbar-dark bg-wine">
        <div class="navbar-header">
            <a class="navbar-brand text-right" href="index.php"><img src="img/PITA2.png" style="width: 90%"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" aria-label="toogle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <!-- <h2 style="color: white">Plataforma Institucional de Tutorías Académicas</h2> -->
            <ul class="nav navbar-nav mr-auto"></ul>
            <ul class="nav navbar-nav">
                <a><img src="img/Itesco_borde.png" style="height: 70px"></a>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-wine-dark"></nav>

    <div class="container" style="padding-bottom: 30px">
        <div class="row" style="padding-top: 30px;padding-bottom: 130px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-header text-white bg-primary h3">Inicia sesión en la plataforma</div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Alumno" role="tab" aria-controls="home" aria-selected="true">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Tutores" role="tab" aria-controls="profile" aria-selected="false">Tutores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Admin" role="tab" aria-controls="contact" aria-selected="false">Administrador</a>
                            </li>
                        </ul>
                        <br>
                        <!--Ingreso Alumnos-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Alumno" role="tabpanel" aria-labelledby="home-tab">
                                <p class="h3 text-primary">Acceso a Alumnos</p>
                                <form method="POST" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <?php if (!empty($errores)): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php echo $errores; ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">No. Control</span>
                                        <input type="text" name="no_control" maxlength="8" class="form-control" placeholder="Ingresa 8 dígitos" onkeyup="this.value=Numeros(this.value)">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Contraseña</span>
                                        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña">
                                    </div>
                                    <br>
                                    <div class="text-right">
                                        <input class="btn btn-primary" type="submit" name="boton-alumno">
                                    </div>
                                </form>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Recordar Contraseña
                                    </label>
                                    <br>
                                    <a href="#">¿olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <!--Ingreso Tutores-->
                            <div class="tab-pane fade" id="Tutores" role="tabpanel" aria-labelledby="profile-tab">
                                <p class="h3 text-primary">Acceso a Tutores</p>
                                <form method="POST" name="loginTutor" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <?php if (!empty($errores2)): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php echo $errores2; ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Email</span>
                                        <input type="email" name="email" class="form-control" placeholder="example@example.com">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Contraseña</span>
                                        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña">
                                    </div>
                                    <br>
                                    <div class="text-right">
                                        <input type="submit" class="btn btn-primary" name="boton-tutor">
                                    </div>
                                </form>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Recordar Contraseña
                                    </label>
                                    <br>
                                    <a href="#">¿olvidaste tu contraseña?</a>
                                </div>
                            </div>
                            <!--Ingreso Administradores-->
                            <div class="tab-pane fade" id="Admin" role="tabpanel" aria-labelledby="contact-tab">
                                <p class="h3 text-primary">Acceso a Administrador</p>
                                <form method="POST" name="loginAdmin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <?php if (!empty($errores3)): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php echo $errores3; ?>
                                            </ul>
                                        </div>
                                    <?php endif ?>
                                    <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Email</span>
                                    <input type="email" name="email" class="form-control" placeholder="example@example.com" aria-label="Username">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Contraseña</span>
                                    <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" arial-label="Username">
                                </div>
                                <br>
                                <div class="text-right">
                                    <input class="btn btn-primary" type="submit" name="boton-admin">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Recordar Contraseña
                                    </label>
                                    <br>
                                    <a href="#">¿olvidaste tu contraseña?</a>
                                </div>
                                </form>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<footer>
    <div class="nav navbar fixed-bottom" style="background-color: #fff;">
        <div class="text-center"><img src="img/banner-inst.png" alt="banner-institucional" style="width:50%;"></div>
    </div>
</footer>
</body>
<?php
include_once 'plantillas/index_cierre.php';
?>
