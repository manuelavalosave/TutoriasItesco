<?php 
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();


/*-- --------------------- --*/
?>


  <script src="../js/funciones-estudiantesp.js"></script>
  <!--<script src="../librerias/bootstrap/js/bootstrap.js"></script>-->
    <script src="../librerias/alertifyjs/alertify.js"></script>
  <script src="../librerias/select2/js/select2.js"></script>

<!--<bod-->


    <!-- Modal para registros nuevos -->


<div class="modal" id="modalNuevo2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva Actividad</h4>
      </div>
      <div class="modal-body">
            <label>Nombre</label>
            <input type="text" name="" id="nombre" class="form-control input-sm">
            <label>Tipo de problema</label>
            <input type="text" name="" id="tipo-problema" class="form-control input-sm">
            <label>Seguimiento</label>
            <input type="text" name="" id="seguimiento" class="form-control input-sm">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info"  data-toggle="modal"  id="guardarnuevo2" >

        Agregar..
        </button>
       <!--data-dismiss="modal"-->
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
            <input type="text" hidden="" id="id_estudiantesp" name="">
            <label>Nombre</label>
            <input type="text" name="" id="nombreu" class="form-control input-sm">
            <label>Tipo de problema</label>
            <input type="text" name="" id="tipo-problemau" class="form-control input-sm">
            <label>Seguimiento</label>
            <input type="text" name="" id="seguimientou" class="form-control input-sm">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos2" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>

  </div>
</div>
 
    <!--<div id="buscador"></div>-->
   



<!--</body>
</html>-->



  

