<?php
include_once 'plantillas/index_dec.php';
?>

<body id='BGLogin'>
    <nav class="navbar navbar-expand-md navbar-dark bg-wine">
        <div class="navbar-header">
            <a class="navbar-brand text-right" href="#"><img src="img/PITA2.png" style="width: 90%"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-wine-dark"></nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin-top: 5%">
                <h1 class="text-white display-5" style="text-shadow: 0px 0px 10px black"><em>Dando seguimiento a la situación académica del alumno</em></h1>
            </div>
        </div>

        <div class="row" style="margin-top: 120px;margin-bottom: 90px;">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6"><a class="btn-lg btn-block btn-wine text-center" href="inicioSesion.php">Iniciar Sesión</a></div>
                    <div class="col-md-6"><a class="btn-lg btn-block btn-gold text-center" href="registro.php">Registrarse</a></div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="nav navbar fixed-bottom" style="background-color: #fff;">
        <div class="text-center"><img class="" src="img/banner-inst.png" alt="banner-institucional" style="width:50%;"></div>
    </div>
</footer>
<?php
include_once 'plantillas/index_cierre.php';
?>

