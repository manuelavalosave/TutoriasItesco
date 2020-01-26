<?php session_start();

if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
    include_once '../app/post.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
}

$i=0;
$j=0;

$conexion = conexion($db_config);

$stat4 = $conexion->prepare("SELECT id FROM usuarios WHERE grupo = :grupo AND tipo = 2");
$stat4->execute(array(':grupo' => $_SESSION['usuario']['4']));
$u = $stat4->fetch();

$stat3 = $conexion->prepare("SELECT * FROM foro WHERE id_grupo = :id_grupo AND id_usuario = :autor ORDER BY fecha_pub DESC");
$stat3->execute(array(":id_grupo" => $_SESSION['usuario']['4'], ':autor' => $u['id']));
$news = $stat3->fetchAll();

$stat = $conexion->prepare("SELECT * FROM detalle_usuarios WHERE id_usuario = :id");
$stat->execute(array(":id" => $_SESSION['usuario']['0']));
$details = $stat->fetch();

$stat2 = $conexion->prepare("SELECT grupo, semestre, carrera FROM grupo WHERE id_grupo = :id");
$stat2->execute(array("id" => $_SESSION['usuario']['4']));
$group = $stat2->fetch();
?>

<div class="container">
  <div class="row" style="margin-top: 30px;padding-bottom: 30px;">
    <div class="col-md-9">
      <h1 class="text-wine">Anuncios</h1>
      <?php if(!empty($news)): ?>
      <div id="noticias" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
         <?php foreach($news as $new): ?>
         <li data-target="#noticias" data-slide-to="<?php echo $i ?>" class="active"></li>
         <?php $i++; endforeach?>
        </ol>
        <div class="carousel-inner text-white" style="height: 310px;">
        <?php foreach($news as $new):?>
            <?php if($j == 0):?>
            <div class="carousel-item active">
            <?php else:?>
            <div class="carousel-item">
            <?php endif?>
            <?php if(!empty($new['imagen'])): ?>
            <div id="carrusel" class="card text-center" style="height: 310px; background-color: #000">
                <img class="img-fluid" src="../img/post/<?php echo $new['imagen']?>" style="opacity:0.6">
                <div class="carousel-caption d-none d-md-block">
            <?php else: ?>
            <div id="carrusel" class="card text-center" style="height: 310px; background-color: #3498db">
            <div class="carousel-caption d-none d-md-block">
            <i class="material-icons" style="font-size:100px">error</i>
            <?php endif ?>
                    <h1><?php echo $new['titulo']?></h1>
                    <hr>
                <p><i>"<?php echo $new['contenido']?>"</i></p>
                <span><?php echo strftime("%d de %B de %G, %H:%M %p", strtotime($new['fecha_pub']));?></span>
                </div>
            </div>
          </div>
        <?php $j++; endforeach?>
        </div>
        <a class="carousel-control-prev" href="#noticias" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#noticias" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
      <?php else: ?>
      <div class="jumbotron text-white bg-wine-white">
          <h1 class="text-center">Aun no hay anuncios</h1>
      </div>
      <?php endif ?>
      <hr>
      <!-- PERFIL -->
      <div class="card card-body">
        <h1 class="text-verde2">Información Personal:</h1>
        
        <?php if($details['edit']==1):?>
        <div class="alert alert-warning">
            <p class="text-center h3"><b>¡Información incompleta!</b></p>
            <i>Al parecer tus información aun no está completa, por lo que te sugerimos completes los campos faltantes.</i>
        </div>
        <?php endif ?>
        <table class="table table-responsive table-sm">
            <tbody class="text-secondary">
                <tr>
                <th class="text-verde2 h5" scope="col">Nombre(s):</th>
                <td class="text-capitalize h5"><?php echo $details['nombre']?></td>
                </tr >
                <tr>
                <th class="text-verde2 h5" scope="col">Apellido Paterno:</th>
                <td class="text-capitalize h5"><?php echo $details['a_paterno']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Apellido Materno:</th>
                <td class="text-capitalize h5"><?php echo $details['a_materno']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Fecha de Nacimiento:</th>
                <td class="h5"><?php echo strftime("%d de %B de %G", strtotime($details['fec_nac']));?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Número de Control:</th>
                <td class="h5"><?php echo $details['no_control']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Carrera:</th>
                <td class="h5"><?php echo $details['carrera']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Semestre:</th>
                <td class="h5"><?php echo $details['semestre']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Grupo:</th>
                <td class="h5"><?php echo $details['grupo']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Dirección:</th>
                <td class="h5"><?php echo $details['direccion']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Teléfono de contacto:</th>
                <td class="h5"><?php echo $details['num_tel']?></td>
                </tr>
                <tr>
                <th class="text-verde2 h5" scope="col">Email:</th>
                <td class="h5"><?php echo $details['email']?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right"><a href="editar_perfil.php" class="btn btn-success">Editar información personal</a></div>
        
      </div>
      <!-- PERFIL -->
    </div>
    <?php include_once '../plantillas/A-menu.inc.php'; ?>
  </div>
</div>
<?php include_once '../plantillas/doc-cierre.inc.php'; ?>
