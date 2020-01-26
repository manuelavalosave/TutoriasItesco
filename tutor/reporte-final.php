
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
<!DOCTYPE html>
<html>
<head>
  <title></title>

 <!--<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="../librerias/jquery-3.2.1.min.js"></script>
  <script src="../js/funciones-rfinal.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>
</head>
    
   
 
<body>
 <center><h3>REPORTE FINAL TUTORIAS</h3></center>

    <!-- Modal para registros nuevos -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Actividad</h4>
      </div>
      <div class="modal-body">
            <label>Nombre</label>
            <input type="text" name="" id="nombre" class="form-control input-sm">
            <label>Materia que adeuda</label>
            <input type="text" name="" id="materias_adeuda" class="form-control input-sm">
            <label>Resultados al finaliza el semestre</label>
            <input type="text" name="" id="resultdos_finalizar_semestre" class="form-control input-sm">
          
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
            <input type="text" hidden="" id="id_estudiantesi" name="">
            <label>Nombre</label>
            <input type="text" name="" id="nombreu" class="form-control input-sm">
            <label>Materia que adeuda</label>
            <input type="text" name="" id="materias_adeudau" class="form-control input-sm">
            <label>Resultados al finalizar el semestre</label>
            <input type="text" name="" id="resultdos_finalizar_semestreu" class="form-control input-sm">
  

         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
         
    
      </div>

      
      <br>
     
    </div>

  

  </div>
  
</div>


 <div class="container ">
        <div class="row" style="padding-top: 30px;padding-bottom: 100px;">
            <div class="col-md-1"></div>
            <div class="col-md-8">
               
           

                <div class="card border-info">
                    <div class="card-header border-info text-light h5 bg-info">REPORTE FINAL</div>
                    <div class="card-body">
                      <div class="container">
    <!--<div id="buscador"></div>-->
    <?php //include_once '../componentes/buscador.php'; ?>
    <div id="tabla"></div>
    
  </div>
                         

                </div>


                    <div class="card border-info">
                    <div class="card-header border-info text-light h5 bg-info"></div>
                    <div class="card-body">
                      <div class="container">
    <!--<div id="buscador"></div>-->
    <?php //include_once '../componentes/buscador.php'; ?>
   
    <div id="tabla2"></div>
    
    <?php include_once '../componentes/tabla-estudiantep.php' ?>
  </div>
    
                     
                </div>
                
            </div>
          
        </div><?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>

<!--</body>
</html>-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('../componentes/tb-rfinal.php');
        $('#tabla2').load('../componentes/tb-estudiantep.php');
    
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          nombre=$('#nombre').val();
          materia_adeuda=$('#materia_adeuda').val();
          resultdos_finalizar_semestre=$('#resultdos_finalizar_semestre').val();
            agregarDatosP(nombre,materia_adeuda,resultdos_finalizar_semestre);   
        });



        $('#actualizadatos').click(function(){
          actualizaDatosP();
        });

        $('#guardarnuevo2').click(function(){
          
 
          nombre=$('#nombre').val();
          tipo_problema=$('#tipo_problema').val();
          seguimiento=$('#seguimiento').val();
          agregarDatosPP(nombre,tipo_problema,seguimiento);
        });

        $('#actualizadatos2').click(function(){
          actualizaDatosPP(); 

        });
    });

   

</script>

  



</body>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>

<?php
include_once '../plantillas/doc-cierre.inc.php';
?>



