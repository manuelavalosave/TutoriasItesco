<?php

include_once 'plantillas/index_dec.php';
include_once 'app/conexion.ini.php';
include_once 'app/registro.inc.php';
$conexion = conexion($db_config);
$periodosBD = $conexion->prepare("SELECT * FROM periodos");
$periodosBD->execute();
$PasadaPerido = $periodosBD->fetchall();
?>
<script src="../librerias/jquery-3.2.1.min.js"></script>
<script src="js/jquery.min.js"type="text/javascript"></script>
<link href="css/jquery.multiselect.css" rel="stylesheet">
<script  src = "js/jquery.multiselect.js" type="text/javascript"></script>
</head>
<body id='Registro'>
<!--<script src="../librerias/jquery-3.2.1.min.js"></script>-->    
    

                                        
    <nav class="navbar navbar-expand-md navbar-dark bg-wine">
        <div class="navbar-header">
            <a class="navbar-brand text-right" href="index.php"><img src="img/PITA2.png" style="width: 90%"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" aria-label="toogle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <!-- <h2 style="color: white">Plataforma Institucional de Tutorías Académicas</h2> -->
            <ul class="nav navbar-nav mr-auto">
            </ul>
            <ul class="nav navbar-nav">
                <a><img src="img/Itesco_borde.png" style="height: 70px"></a>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-wine-dark"></nav>

    <div class="container">
        <div class="row" style="padding-top: 60px;padding-bottom: 100px;">
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <a href="index.php" class="btn btn-danger" style="margin-bottom:20px;">Regresar</a>
               <?php if (!empty($errores)): ?>
                    <div class="alert alert-danger">
                        <?php echo $errores; ?>
                    </div>
                <?php endif ?>
                <?php if (!empty($errores2)): ?>
                    <div class="alert alert-danger">                                        
                        <?php echo $errores2; ?>                                        
                    </div>
                <?php endif ?>
                <div class="card border-info">
                    <div class="card-header border-info text-light h3 bg-info">Ingresa tus datos para Registrarte</div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Alumno" role="tab" aria-controls="home" aria-selected="true">Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Tutores" role="tab" aria-controls="profile" aria-selected="false">Tutores</a>
                            </li>
                        </ul>
                        <br>
                        <!--Registro Alumnos-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Alumno" role="tabpanel" aria-labelledby="home-tab">
                                <p class="h3 text-info">Solicitud de Registro para Alumnos</p>
                                <br>
                                <form role="form" name="registroAlumnos" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="form-group">
                                        <label>Nombre/s:</label>
                                        <input type="text" class="form-control" name="nombre" placeholder=". . ." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Paterno:</label>
                                        <input type="text" class="form-control" name="a_paterno" placeholder=". . ." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Apellido Materno:</label>
                                        <input type="text" class="form-control" name="a_materno" placeholder=". . ." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control" name="fec_nac" placeholder="dd/mm/aaaa">
                                    </div>
                                    <div class="form-group">
                                        <label>No. Control:</label>
                                        <input type="text" minlength=8 maxlength="8" class="form-control" name="no_control" placeholder=". . ." onkeyup="this.value=Numeros(this.value)" required>
                                    </div>
                                    <div class="form-group">

                                        <label >Carrera:</label>
                                        <select class="form-control" name="carrera" >
                                            <option value="Administracion">Administración</option>
                                            <option value="Animacion Digital y Efectos Visuales">Animación Digital y Efectos Visuales</option>
                                            <option value="Bioquimica">Bioquímica</option>
                                            <option value="Electrica">Eléctrica</option>
                                            <option value="Electronica">Electrónica</option>
                                            <option value="Gestion Empresarial">Gestión Empresarial</option>
                                            <option value="Industrial">Industrial</option>
                                            <option value="Informatica">Informática</option>
                                            <option value="Mecanica">Mecánica</option>
                                            <option value="Mecatronica">Mecatrónica</option>
                                            <option value="Petrolera">Petrolera</option>
                                            <option value="Quimica">Química</option>
                                            <option value="Sistemas Computacionales">Sistemas Computacionales</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Semestre:</label>
                                        <select class="form-control" name="semestre">
                                            <option value="1">1er. Semestre</option>
                                            <option value="2">2do. Semestre</option>
                                            <option value="3">3er. Semestre</option>
                                            <option value="4">4to. Semestre</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Grupo:</label>
                                        <select class="form-control" name="grupo">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label>Periodo:</label>
                                        <select class="form-control" name="periodo">
                                          <?php foreach ($PasadaPerido as $p ){?>
                                            <option value="<?php echo $p['id_periodo']; ?>"><?php echo $p['meses']; ?></option>
                                          <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
<label for="exampleFormControlSelect1">SEXO:</label>
<select class="form-control" name="sexo" id="exampleFormControlSelect1">
<option value="f">F</option>
<option value="m">M</option>
</select>
</div>
 <div class="form-group">
                                      <label for="exampleFormControlSelect1">ESTADO CIVIL:</label>
                                       <select class="form-control" name="estado-c" id="exampleFormControlSelect1">
                                       <option value="soltero">Soltero</option>
                                       <option value="casado">Casado</option>
                                       </select>
                                       </div>
                                                                            <div class="form-group">
<label for="exampleFormControlInput1">NACIONALIDAD:</label>
<input type="text" name="nacionalidad" class="form-control" placeholder=". . .">
</div>
<div class="card border-info">
<div class="card-header border-info">Domicilio Actual:</div>
<div class="card-body">
<div class="form-group">
<label for="exampleFormControlInput1">Colonia:</label>
<input type="text" name="Colonia" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Calle:</label>
<input type="text" name="Calle" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Numero (interior):</label>
<input type="text" name="Numero-i" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Ciudad:</label>
<input type="text" name="Ciudad" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Municipio:</label>
<input type="text" name="Municipio" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">C.P:</label>
<input type="text" name="CP" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Estado:</label>
<input type="text" name="Estado" class="form-control" placeholder=". . .">
</div>
</div>
</div>
                                    <div class="form-group">
                                        <label>Correo Electrónico:</label>
                                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña:</label>
                                        <input type="password" class="form-control" name="pass" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Repite tu contraseña:</label>
                                        <input type="password" class="form-control" name="pass2" required>
                                    </div>
                                    <div class="text-right">
                                        <input class="btn btn-info" type="submit" name="boton-alumnos">
                                    </div>
                                </form>
                                <br>
                            </div>
                            <!--Registro Tutores-->
                            
                            <div class="tab-pane fade" id="Tutores" role="tabpanel" aria-labelledby="profile-tab">
                                <p class="h3 text-info">Solicitud de Registro para Tutores</p>
                                <br>
                                <form role="form" name="registroTutores" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="form-group">
                                        <label>Nombre/s:</label>
                                        <input type="text" name="nombre" class="form-control" placeholder=". . .">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Apellido Paterno:</label>
                                        <input type="text" name="a_paterno" class="form-control" placeholder=". . .">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Apellido Materno:</label>
                                        <input type="text" name="a_materno" class="form-control" placeholder=". . .">

                                    <div class="form-group">
                                       <label for="exampleFormControlInput1">Celular</label> 
                                    <input type="text" name="Celular" class="form-control" placeholder=". . .">
                                    </div>
                                    </div>
                                     <div class="form-group">
                                      <label for="exampleFormControlSelect1">ESTADO CIVIL:</label>
                                       <select class="form-control" name="estado-c" id="exampleFormControlSelect1">
                                       <option value="soltero">Soltero</option>
                                       <option value="casado">Casado</option>
                                       </select>
                                       </div>
                                       <div class="form-group">
<label for="exampleFormControlInput1">NACIONALIDAD:</label>
<input type="text" name="nacionalidad" class="form-control" placeholder=". . .">
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">SEXO:</label>
<select class="form-control" name="sexo" id="exampleFormControlSelect1">
<option value="f">F</option>
<option value="m">M</option>
</select>
</div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fecha de Nacimiento:</label>
                                        <input type="date" name="fec_nac" class="form-control" placeholder="dd/mm/aaaa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">RFC:</label>
                                        <input type="text" name="id_trabajador" minlength="13" maxlength="13" class="form-control" placeholder=". . ." required>
                                    </div>
                                    <div class="form-group">
<label for="exampleFormControlSelect1">Grado Academico:</label>
<select class="form-control" name="gradoA" id="exampleFormControlSelect1">
<option value="Doctorado">Doctorado</option>
<option value="Maestria">Maestía</option>
<option value="Especialidad">Especialidad</option>
<option value="Licenciatura">Licenciatura</option>
</select>
</div> 
<div class="card border-info">
<div class="card-header border-info">Domicilio Actual:</div>
<div class="card-body">
<div class="form-group">
<label for="exampleFormControlInput1">Colonia:</label>
<input type="text" name="Colonia" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Calle:</label>
<input type="text" name="Calle" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Numero (interior):</label>
<input type="text" name="Numero-i" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Ciudad:</label>
<input type="text" name="Ciudad" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Municipio:</label>
<input type="text" name="Municipio" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">C.P:</label>
<input type="text" name="CP" class="form-control" placeholder=". . .">
<label for="exampleFormControlInput1">Estado:</label>
<input type="text" name="Estado" class="form-control" placeholder=". . .">
</div>
</div>
</div>
<br>
                                    
                                    <div class="card border-info">
                                       <div class="card-header border-info">Grupo Tutorado:</div>
                                        <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Carrera:</label>
                                        <select name="carrera" id="langOpt"> <!--class="form-control"-->
                                            <option value="Administracion">Administración</option>
                                            <option value="Animacion Digital y Efectos Visuales">Animación Digital y Efectos Visuales</option>
                                            <option value="Bioquimica">Bioquímica</option>
                                            <option value="Electrica">Eléctrica</option>
                                            <option value="Electronica">Electrónica</option>
                                            <option value="Gestion empresarial">Gestión Empresarial</option>
                                            <option value="Industrial">Industrial</option>
                                            <option value="Informatica">Informática</option>
                                            <option value="Mecanica">Mecánica</option>
                                            <option value="Mecatronica">Mecatrónica</option>
                                            <option value="Petrolera">Petrolera</option>
                                            <option value="Quimica">Química</option>
                                            <option value="Sistemas Computacionales">Sistemas Computacionales</option>
                                        </select>
                                        
                                    </div>
                                       <div class="form-group">
                                        <label>Semestre:</label>
                                        <select class="form-control" name="semestre">
                                            <option value="1">1er. Semestre</option>
                                            <option value="2">2do. Semestre</option>
                                            <option value="3">3er. Semestre</option>
                                            <option value="4">4to. Semestre</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Grupo:</label>
                                        <select class="form-control" name="grupo">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>
                                      <div class="form-group">
                                        <label>Periodo:</label>
                                        <select class="form-control" name="periodo">
                                          <?php foreach ($PasadaPerido as $p ){?>
                                            <option value="<?php echo $p['id_periodo']; ?>"><?php echo $p['meses']; ?></option>
                                          <?php } ?>
                                            
                                        </select>
                                    </div>
                                        </div>
                                    </div>
                                  
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Correo Electrónico:</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña:</label>
                                        <input type="password" class="form-control" name="pass" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Repite tu contraseña:</label>
                                        <input type="password" class="form-control" name="pass2" required>
                                    </div>
                                    <div class="text-right">
                                        <input class="btn btn-info" type="submit" name="boton-tutor">
                                        <!-- <i class="btn btn-primary" onclick="registroAlumnos.submit()">Aceptar</i> -->
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
                                            $('#langOpt').multiselect({
                                              columns: 1,
                                              placeholder: 'Seleccionar carrera',
                                              search: true
                                              });

                                        </script>
</body>
<footer>
    <div class="nav navbar fixed-bottom" style="background-color: #fff;">
        <div class="text-center"><img src="img/banner-inst.png" alt="banner-institucional" style="width:50%;"></div>
    </div>
</footer>
<?php
include_once 'plantillas/index_cierre.php';
?>
