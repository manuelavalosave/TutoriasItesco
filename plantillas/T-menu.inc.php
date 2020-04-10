<div class="col-md-3">
    <div class="list-group" style="border-color: #3498db">
        <a class="list-group-item text-white h3" style="background-color: #3498db">Menú Principal</a>
        <a style="border-color: #3498db" class="t-menu list-group-item list-group-item-action" href="alumnos.php?g=<?php echo $_GET['g']; ?>"><div class="row"><div class="col-1"><i class="material-icons">account_box</i></div><div class="col">Alumnos</div></div></a>
        <a style="border-color: #3498db" class="t-menu list-group-item list-group-item-action" href="T-buzon.php?g=<?php echo $_GET['g']; ?>" ><div class="row"><div class="col-1"><i class="material-icons">chat</i></div><div class="col">Buzón de Mensajes</div></div></a>
    
       <a style="border-color: #3498db" class="t-menu list-group list-group-item list-group-item-action" href="T-centro_act.php?g=<?php echo $_GET['g']; ?>" ><div class="row"><div class="col-1"><i class="material-icons">work</i></div><div class="col">Plan De Trabajo</div></div></a>
    
     
          <a style="border-color: #3498db" href="T-Reporte.php?g=<?php echo $_GET['g']; ?>" class="t-menu list-group-item list-group-item-action dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"> --> Generar Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" style="    position: absolute;
    transform: translate3d(15px, 107px, 0px);
    top: 0px;
    left: 0px;
    will-change: transform;
    width: 90%;
    font-size: medium;
    text-align: center;">
            <li class="list-group"><a  class=" list-group-item list-group-item-action" href="http://localhost/PITA-2.0.1/tutor/T-Reporte.php?g=<?php echo $_GET['g']; ?>&r=1" >-> Reporte parcial 1</a></li>
            <li><a class=" list-group-item list-group-item-action" href="http://localhost/PITA-2.0.1/tutor/T-Reporte.php?g=<?php echo $_GET['g']; ?>&r=2">->Reporte parcial 2</a></li>
            <li><a class=" list-group-item list-group-item-action" href="http://localhost/PITA-2.0.1/tutor/T-Reporte.php?g=<?php echo $_GET['g']; ?>&r=3" >-> Reporte parcial 3</a></li>
            <li><a class=" list-group-item list-group-item-action" href="http://localhost/PITA-2.0.1/tutor/reporte-final.php?g=<?php echo $_GET['g']; ?>&r=3" >-> Reporte Final</a></li>
            
          </ul>
    
      
        <a style="border-color: #3498db" class="t-menu list-group-item list-group-item-action" href="asesorias.php?g=<?php echo $_GET['g']; ?>" ><div class="row"><div class="col-1"><i class="material-icons">dvr</i></div><div class="col">Solicitudes de Entrevista</div></div></a>
         <a style="border-color: #3498db" class="t-menu list-group-item list-group-item-action" href="T-manual.php?g=<?php echo $_GET['g']; ?>"><div class="row"><div class="col-1"><i class="material-icons">book</i></div><div class="col">Manual del tutor</div></div></a>
    </div>

    <button type="button" data-toggle="modal" data-target="#manual" class="btn btn-block btn-wine mt-4"> <i class="material-icons align-middle">insert_drive_file</i> Manual de usuario</button>

    <div class="modal fade" id="manual" tabindex="-1" role="dialog" aria-labelledby="manual" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="../docs/Manual_tutor.pdf" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
