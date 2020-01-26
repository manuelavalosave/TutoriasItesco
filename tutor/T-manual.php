<?php session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}
?>
<div class="container" style="padding-bottom: 30px;">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <div class="card mb-3" style="border-color:#f1c40f;">
                <div class="card-header text-white" style="background-color: #f1c40f"><span class="h3">Manual de Tutorías Académicas</span></div>
                <div class="card-body">
                <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="../docs/SNIT_tutor.pdf" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once '../plantillas/T-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>