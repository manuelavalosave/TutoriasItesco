<?php
//include_once 'plantillas/index_dec.php';
//include_once 'app/conexion.php';
//include_once 'app/registro.inc.php';
?>
<?php 
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/op_tutor_reporte.php';

}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}


/*-- --------------------- --*/
?>


<body id='Registro'>
    <!--<nav class="navbar navbar-expand-md navbar-dark bg-wine">>
        <div class="navbar-header">
            
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" aria-label="toogle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">-->
            <!-- <h2 style="color: white">Plataforma Institucional de Tutorías Académicas</h2> -->
            <!--<ul class="nav navbar-nav mr-auto">
            </ul>
            <ul class="nav navbar-nav">
                
            </ul>
        </div>
    </nav>-->
    <!--<nav class="navbar navbar-expand-md navbar-dark bg-wine-dark"></nav>-->


    <!--<!DOCTYPE html>
<html>
<head>-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
    <center><h3>REPORTE PARCIAL DE TUTORIAS</h3></center>
  <!--<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funciones-reparcial.js"></script>
    <script src="..librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
</head>
<!--<body>-->


    <!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Actividad</h4>
      </div>
      <div class="modal-body">
            <label>N°</label>
            <input type="text" name="" id="numero" class="form-control input-sm">
            <label>Fecha programada </label>
            <input type="date" name="" id="fecha_programada" class="form-control input-sm">
            <label>Actividad realizada</label>
            <input type="text" name="" id="actividad_realizada" class="form-control input-sm">
          <label>Ojetivo logrado</label>
          <input type="text" name="" id="objetivo_logrado" class="form-control input-sm">
            <label>Problematica presentada</label>
            <input type="text" name="" id="problematica_presentada" class="form-control input-sm">
          <label>Observaciones</label>
          <input type="text" name="" id="observaciones" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
       
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
            <input type="text" hidden="" id="id_plan" name="">
            <label>N°</label>
            <input type="text" name="" id="numerou" class="form-control input-sm">
            <label>Fecha progrmada</label>
            <input type="date" name="" id="fecha_programadau" class="form-control input-sm">
            <label>Actividad a realizar</label>
            <input type="text" name="" id="actividad_realizadau" class="form-control input-sm">
          <label>Ojetivo logrado</label>
          <input type="text" name="" id="objetivo_logradou" class="form-control input-sm">
            <label>Problematica presentada</label>
            <input type="text" name="" id="problematica_presentadau" class="form-control input-sm">
          <label>Obervaciones</label>
          <input type="text" name="" id="observacionesu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>

  </div>
</div>
 <div class="container ">
        <div class="row" style="padding-top: 30px;padding-bottom: 100px;">
            <div class="col-md-1"></div>
            <div class="col-md-8">
               
           

                <div class="card border-info">
                    <div class="card-header border-info text-light h5 bg-info">REPORTE PARCIAL</div>
                    <div class="card-body">
                      <div class="container">
    <!--<div id="buscador"></div>-->
    <?php //include_once '../componentes/buscador.php'; ?>
    <div id="tabla"></div>
    
  </div>
    
                     
                </div>
                
            </div>
            
        </div><?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>

<!--</body>
</html>-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('../componentes/tb-reporte-p.php');
    
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          numero=$('#numero').val();
          fecha_programada=$('#fecha_programada').val();
          actividad_realizada=$('#actividad_realizada').val();
          objetivo_logrado=$('#objetivo_logrado').val();
          problematica_presentada=$('#problematica_presentada').val();
          observaciones=$('#observaciones').val();
            agregarDatosP(numero,fecha_programada,actividad_realizada,objetivo_logrado,problematica_presentada,observaciones);
        });



        $('#actualizadatos').click(function(){
          actualizaDatosP();
        });

    });
</script>

  

</body>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>
?>
