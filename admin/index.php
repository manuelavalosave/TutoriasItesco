<?php session_start();
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($_SESSION['usuario']['3'] == '1') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_admin.inc.php';
    include_once '../app/conexion.php';
}else{
  session_destroy();
  header('Location: ../inicioSesion.php');
}

if (isset($_POST['publicar'])) {
	$grupo = $_SESSION['usuario']['4'];
	$errores = '';
    $conexion = conexion($db_config);
    $statement = $conexion->prepare("INSERT INTO foro (id_post, fecha_pub, titulo, contenido, imagen, id_usuario, id_grupo, visible) VALUES (NULL, NULL, :titulo, :contenido, NULL, :id_usuario, $grupo, 1)");
    $statement->execute(array(':titulo' => $_POST['titulo'], ':contenido' => $_POST['contenido'] , ":id_usuario" => $_SESSION['usuario']['0']));
}

$i=0;
$j=0;

$conexion = conexion($db_config);

$stat4 = $conexion->prepare("SELECT id FROM usuarios WHERE tipo = 1");
$stat4->execute();
$u = $stat4->fetch();

$stat3 = $conexion->prepare("SELECT * FROM foro WHERE id_usuario = :id ORDER BY fecha_pub DESC");
$stat3->execute(array(':id' => $u['id']));
$news = $stat3->fetchAll();

?>

<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
        <div class="col-md-9">
            <p>
                <a class="btn btn-sm btn-wine" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Escribir anuncio</a>
            </p>
            <div class="collapse" id="formatos">
                <div class="card">
                <div class="card-header text-light" style="background-color: #e67e22"><span class="h3">Escribir anuncio</span></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                        <div class="input-group">
                            <span class="input-group-addon">Título</span>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>
                        <br>
                        <label>Contenido del mensaje</label>
                        <textarea class="form-control" name="contenido" id="contenido" rows="4" required></textarea>
                        <br>
                        <?php if (isset($error)): ?>
                            <p class="error"><?php echo $error; ?></p>
                        <?php endif ?>
                        <br>
                        <div class="text-right"><input type="submit" name="publicar" class="btn btn-primary" value="Publicar"></div>
                    </form>
                </div>
            </div>
            </div>
            <h1 class="text-wine">Anuncios</h1>
           <?php if(!empty($news)):?>
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
        </div>
        <?php include_once '../plantillas/Ad-menu.inc.php'; ?>
    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>
