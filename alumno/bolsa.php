<?php
session_start();
if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
}else {
    session_destroy();
  header('Location: ../inicioSesion.php');
}
?>
<div class="container">
    <div class="row" style="padding-top: 50px;padding-bottom: 30px;">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-light" style="background-color: #34495e"><span class="h3">Bolsa de Trabajo</span></div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img class="card-img" src="../img/prueba1.png" style="width: 100px"></div>
                                <div class="col-md-10">
                                    <h4 class="card-title">Oportunidad de Empleo: Cinépolis <span class="badge badge-primary">¡Nuevo!</span></h4> 
                                    <p class="card-text">Detalles: Se solicita personal para trabajo de medio tiempo en dulcería</p>
                                    <p class="card-text">Requisitos: Sexo indistinto, 18 años o más, presentarse en oficinas con solicitud elaborada</p>
                                    <p class="card-text">Contacto: (922) 127-5462</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-right"> Lugar: Cinépolis - Plaza Sendero, Coatzacoalcos, Veracruz</div>
                    </div>
                    <p></p>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img class="card-img" src="../img/prueba2.png" style="width: 100px"></div>
                                <div class="col-md-10">
                                    <h4 class="card-title">Oportunidad de Servicio Social: H. Ayuntamiento de Minatitlán </h4>
                                    <p class="card-text">Detalles: Se solicita personal para realizar servicio social con conocimientos de ofimática</p>
                                    <p class="card-text">Requisitos: Sexo indistinto, 18 años o mas, Presentarse con documentación</p>
                                    <p class="card-text">Contacto: (922) 134-5654</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-right"> Lugar: H. Ayuntamiento de Minatitlán, Veracruz</div>
                    </div>
                    <p></p>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img class="card-img" src="../img/prueba1.png" style="width: 100px"></div>
                                <div class="col-md-10">
                                    <h4 class="card-title">Oportunidad de Empleo: Cinemex, Minatitlán</h4> 
                                    <p class="card-text">Detalles: Se solicita personal para trabajo de medio tiempo en área de Taquilla</p>
                                    <p class="card-text">Requisitos: Sexo indistinto, 18 años o más, presentarse en oficinas con solicitud elaborada</p>
                                    <p class="card-text">Contacto: (922) 127-5462</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-right"> Lugar: Cinemex, Minatitlán</div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once '../plantillas/A-menu.inc.php'; ?>

    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>