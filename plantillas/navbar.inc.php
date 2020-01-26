<body id="BGInicio">
    <div class="sticky-top">
    
        <div class="nav navbar sticky-top" style="background-color: #fff;">
            <div class="text-center"><img class="ban-inst" src="../img/banner-inst.png" alt="banner-institucional"></div>
        </div>
       
        <nav id="Barra" class="navbar navbar-expand-md navbar-dark" style="background-color: #621132">
            <div class="navbar-header">
                <span class="navbar-brand"><img src="../img/PITA2.png" style="width: 70%"></span>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" aria-label="toogle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item navegacion-a"><a class="nav-link text-light" href="../alumno/index.php"><div class="h4"><i class="material-icons">home</i> Inicio</div></a></li>
                    <li class="nav-item navegacion-a"><a class="nav-link text-light" href="../alumno/forodiscusion.php"><div class="h4"><i class="material-icons">question_answer</i> Foro de Discusión</div></a></li>
                </ul>
            </div>
            <a href="../app/cerrar_sesion.php" class="btn btn-sm mr-auto btn-wine ">Cerrar Sesión</a>
        </nav>
        <nav class="navbar text-light justify-content-center" style="background-color:#4E232E">
            <div class="navbar-expand-sm">
                <div class="text-capitalize">Bienvenido: <?php echo $_SESSION['usuario']['1']; ?></div>
            </div>
        </nav>
    </div>
