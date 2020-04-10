<?php session_start();
if ($_SESSION['usuario']['3'] == '2') {
    include_once '../plantillas/doc-declaracion.inc.php';
    include_once '../plantillas/navbar_tutor.inc.php';
    include_once '../app/conexion.php';
}else{
    session_destroy();
    header('Location: ../inicioSesion.php');
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

// Nuevo 

$periodosBD = $conexion->prepare("SELECT * FROM periodos");
$periodosBD->execute();
$PasadaPeriodo = $periodosBD->fetchAll();

//Detalles usuario
$consulta = $conexion->prepare("SELECT * FROM `detalle_usuarios` WHERE `id_usuario`=:id");
$consulta->execute(array(':id' => $_SESSION['usuario'][0]));
$DatosPersonales = $consulta->fetch();

$grupos1 = $conexion->prepare("CALL datos_grupo_periodo(:id)");
$grupos1->execute(array(':id' => $_SESSION['usuario'][0]));
$grupos2 = $grupos1->fetchAll();
$grupos1->closeCursor();

$statement = $conexion->prepare('SELECT * FROM formatos_tutor WHERE autor = :autor');
$statement->execute(array(":autor" => $_SESSION['usuario']['0']));
$plan = $statement->fetchall();


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.0/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea',

height: 500,
 
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount','save'
  ],
font_formats: "Calibri=calibri,sans-serif; Arial=arial,sans-serif",
fontsize_formats: "8pt 10pt 11pt 12pt 14pt 18pt 24pt 36pt",

  toolbar: 'undo redo | fontselect fontsizeselect formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | table',
powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',

});</script>
<div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
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
       <?php if(isset($_GET['a']) && $_GET['a'] == 1){ ?>
   <div style="margin-top: 20px;" class="alert alert-success alert-dissmissible fade show" role="alert">Añadido un nuevo grupo <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
 <?php }?>
 <a class="btn btn-sm btn-wine collapsed" data-toggle="collapse" href="#formatos" role="button" aria-expanded="false" aria-controls="formatos">Añadir nuevo Grupo</a>
 <div class="collapse" id="formatos" style="">
         <form name="" action="../app/Nuevo_grupos_tutor.php" method="post">
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
                                        <select class="form-control" name="periodos">
                                          <?php foreach ($PasadaPeriodo as $p ){?>
                                            <option value="<?php echo $p['id_periodo']; ?>"><?php echo $p['meses']; ?></option>
                                          <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <input name="id_trabajador" type="text" value="<?php echo $_SESSION['usuario'][0];?>" hidden>
                                    <button name="Guardar" class="btn btn-sm btn-outline-succes" value="cancelar" type="submit">Guardar</button>
                                    </form>
                                  </div>
       <table class="table table-responsive table-striped">
                        <tbody>
                           <th>Carrera</th>
                           <th>Semestre</th>
                           <th>Grupo</th>
                           <th>Periodo</th>
                            <?php foreach ($grupos2 as $grupo ) { ?>
                            
                            
                            <tr>

                                
                                <td>
                                    <a  href="../tutor/T-centro_act.php?g=<?php echo $grupo['id_gp']; ?>"><?php echo $grupo['carrera']; ?></a>
                                </td>
                                 <td>
                                    <?php echo $grupo['semestre']; ?>
                                </td>
                                 <td>
                                   <?php echo $grupo['grupo']; ?>
                                </td>
                                 <td>
                                   <?php echo $grupo['meses']; ?> <?php echo $grupo['anio']; ?>
                                </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                   
 <div class="collapse" id="formatosRegistroTutor" style="">
                                <div class="card border-danger" style="margin-bottom: 20px;">

                <div class="card-header h3 text-light" style="background-color: #e74c3c">REGISTRO DEL TUTOR</div>
                <div class="card-body">
                    <?php  $contadoR = 0; if (!empty($plan) ): ?>
<?php $r = "Registro_de_Tutor"; foreach($plan as $arch){ if($arch['archivo'] == $r) { $contadoR = $contadoR+1;  ?>
                        <div class="alert alert-danger">
                            <form name="borrar" action="../app/op_tutor_reporte.php?g=<?php echo $_GET['g']; ?>&n=<?php echo $_GET['r']; ?>" method="POST">
                                <a target="_blank" href="../docs/registros/<?php echo $_SESSION['usuario'][0] ?>/<?php echo $arch['archivo'] ?>.pdf" class="alert-link h5"><i class="material-icons">description</i> <?php $nombredelarchivo = str_replace("_", " ", $arch['archivo']);echo $nombredelarchivo;?></a> <div>Fecha: <?php echo $arch['fec_sub'] ?></div>
                                <div>Estado: 
                                <?php if($arch['estado'] == "1"):?>
                                <strong class="badge badge-secondary">En Proceso de Revision</strong>
                                <?php elseif($arch['estado'] == "0"): ?>
                                <strong class="badge badge-warning">No Enviado</strong>
                                <?php elseif($arch['estado'] == "2"): ?>
                                <strong class="badge badge-success">Revisado</strong>
                                <?php elseif($arch['estado'] == "3"): ?>
                                <strong class="badge badge-danger">Rechazado</strong>
                                <?php endif ?>
                                </div>
                                <div class="text-right"><input name="EnviarPlan" type="submit" class="btn btn-sm btn-outline-success" value="Enviar"><input name="delete" type="submit" class="btn btn-sm btn-outline-danger" value="Eliminar"></div>
                                <input name="id" type="text" value="<?php echo $arch['id']?>" hidden>
                                <input name="file" type="text" value="<?php echo $arch['archivo']?>" hidden>
                            </form>
                        </div>
        <?php  } } ?>
                        <?php else: ?>
                            <p class="text-muted">"Aun no a generado el regostro del tutor..."</p>
                            
                    </form>
                       <?php endif ?>
                        <form method="POST" action="http://localhost/PITA-2.0.1/RegistroFormatoPDF.php">
                     <textarea name="GuardarPlanDeTrabajo">
            <p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong><u>REGISTRO DEL TUTOR </u></strong></p>

<table class="MsoNormalTable" style="border-collapse: collapse; width: 98.6301%; border-color: initial; border-style: none; margin-left: auto; margin-right: auto;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 12.65pt;">
<td style="width: 26.7123%; border: 1pt solid black; padding: 0cm 5.4pt;" colspan="7" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 11.0pt;"><?php echo $DatosPersonales['a_paterno']; ?></span></p>
</td>
<td style="width: 32.6027%; border-top: 1pt solid black; border-right: 1pt solid black; border-bottom: 1pt solid black; border-image: initial; border-left: none; padding: 0cm 5.4pt;" colspan="7" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 11.0pt;"><?php echo $DatosPersonales['a_materno']; ?></span></p>
</td>
<td style="width: 38.9041%; border-top: 1pt solid black; border-right: 1pt solid black; border-bottom: 1pt solid black; border-image: initial; border-left: none; padding: 0cm 5.4pt;" colspan="7" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 11.0pt;"><?php echo $DatosPersonales['nombre']; ?></span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 23.0137%; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-image: initial; border-top: none; padding: 0cm 5.4pt;" colspan="6" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">APELLIDO PATERNO</span></p>
</td>
<td style="width: 36.3014%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="8" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">APELLIDO MATERNO</span></p>
</td>
<td style="width: 38.9041%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="7" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">NOMBRE(S)</span></p>
</td>
</tr>
<tr style="height: 12.65pt;">
<td style="width: 9.86301%; border-top: none; border-left: 1pt solid black; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="2" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">SEXO:</span></p>
</td>
<td style="width: 6.84932%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="2" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif; <?php if($DatosPersonales['Sexo'] == strtoupper("f")){?>background-color:  rgb(241, 196, 15); <?php } ?>">F</span></p>
</td>
<td style="width: 6.30137%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="2" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif; <?php if($DatosPersonales['Sexo'] == strtoupper("m")){?>background-color:  rgb(241, 196, 15); <?php } ?>">M</span></p>
</td>
<td style="width: 14.5205%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">FECHA DE NAC</span></p>
</td>
<td style="width: 33.4247%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="7" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span><?php echo $DatosPersonales['fec_nac']; ?></p>
</td>
<td style="width: 27.2603%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid black; background: #a6a6a6; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 8.08219%; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0cm 5.4pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">CEL.</span></p>
</td>
<td style="width: 25.3425%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="8" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['num_tel']; ?></span></p>
</td>
<td style="width: 13.4247%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="3" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">E-MAIL</span></p>
</td>
<td style="width: 51.3699%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="9" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['email']; ?></span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 98.2192%; border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="21" valign="top">
<p style="margin: 12pt 0cm 0.0001pt; text-align: center; line-height: 150%; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong><u>INFORMACI&Oacute;N GENERAL </u></strong><span style="font-size: 10.0pt; line-height: 150%;"></span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 19.726%; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0cm 5.4pt;" colspan="5" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">ESTADO CIVIL</span></p>
</td>
<td style="width: 22.4658%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="6" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">SOLTERO (<?php if($DatosPersonales['estado_civil'] == "soltero"){?>X<?php } ?>)&nbsp; CASADO (<?php if($DatosPersonales['estado_civil'] == strtoupper("casado")){?>X<?php } ?>)</span></p>
</td>
<td style="width: 21.5068%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">NACIONALIDAD</span></p>
</td>
<td style="width: 34.5205%; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0cm 5.4pt;" colspan="6" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['nacionalidad'];?></span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 23.0137%; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-image: initial; border-top: none; padding: 0cm 5.4pt;" colspan="6" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">DOMICILIO ACTUAL</span></p>
</td>
<td style="width: 75.2055%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="15" valign="top">
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">CALLE: <?php echo $DatosPersonales['direccion'];?></span></p>
</td>
</tr>
<tr style="height: 13.4pt;">
<td style="width: 23.0137%; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-image: initial; border-top: none; padding: 0cm 5.4pt;" colspan="6" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">N&Uacute;MERO (INTERIOR)</span></p>
</td>
<td style="width: 14.5205%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['numero_interior'];?></span></p>
</td>
<td style="width: 17.5342%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="3" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">COLONIA</span></p>
</td>
<td style="width: 18.9041%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="5" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['colonia'];?></span></p>
</td>
<td style="width: 9.31507%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="2" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">C.P.</span></p>
</td>
<td style="width: 14.9315%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['codigo_postal'];?></span></p>
</td>
</tr>
<tr style="height: 12.65pt;">
<td style="width: 13.0137%; border-right: 1pt solid black; border-bottom: 1pt solid black; border-left: 1pt solid black; border-image: initial; border-top: none; padding: 0cm 5.4pt;" colspan="3" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">CIUDAD</span></p>
</td>
<td style="width: 17.3973%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="5" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['ciudad'];?></span></p>
</td>
<td style="width: 16.4384%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">MUNICIPIO</span></p>
</td>
<td style="width: 21.2329%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="4" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['municipio'];?></span></p>
</td>
<td style="width: 11.2329%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="3" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">ESTADO</span></p>
</td>
<td style="width: 18.9041%; border-top: none; border-left: none; border-bottom: 1pt solid black; border-right: 1pt solid black; padding: 0cm 5.4pt;" colspan="2" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;"><?php echo $DatosPersonales['estado'];?></span></p>
</td>
</tr>
<tr>
<td style="border: none; width: 8.08219%;">&nbsp;</td>
<td style="border: none; width: 1.78082%;">&nbsp;</td>
<td style="border: none; width: 3.15068%;">&nbsp;</td>
<td style="border: none; width: 3.69863%;">&nbsp;</td>
<td style="border: none; width: 3.0137%;">&nbsp;</td>
<td style="border: none; width: 3.28767%;">&nbsp;</td>
<td style="border: none; width: 3.69863%;">&nbsp;</td>
<td style="border: none; width: 3.69863%;">&nbsp;</td>
<td style="border: none; width: 3.0137%;">&nbsp;</td>
<td style="border: none; width: 4.10959%;">&nbsp;</td>
<td style="border: none; width: 4.65753%;">&nbsp;</td>
<td style="border: none; width: 4.65753%;">&nbsp;</td>
<td style="border: none; width: 8.21918%;">&nbsp;</td>
<td style="border: none; width: 4.24658%;">&nbsp;</td>
<td style="border: none; width: 4.38356%;">&nbsp;</td>
<td style="border: none; width: 4.38356%;">&nbsp;</td>
<td style="border: none; width: 2.87671%;">&nbsp;</td>
<td style="border: none; width: 3.0137%;">&nbsp;</td>
<td style="border: none; width: 5.34247%;">&nbsp;</td>
<td style="border: none; width: 3.9726%;">&nbsp;</td>
<td style="border: none; width: 14.9315%;">&nbsp;</td>
</tr>
</tbody>
</table>
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong><u>INFORMACI&Oacute;N ACADEMICA </u></strong></p>
<div align="center">
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 22.95pt;">
<td style="width: 76.7pt; border: solid black 1.0pt; border-bottom: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">GRADO ACAD&Eacute;MICO</span></p>
</td>
<td style="width: 92.1pt; border-top: solid black 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">SE&Ntilde;ALA&nbsp; TU GRADO ACAD&Eacute;MICO</span></p>
</td>
<td style="width: 207.05pt; border-top: solid black 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">T&Iacute;TULO</span></p>
</td>
</tr>
<tr style="height: 10.5pt;">
<td style="width: 76.7pt; border-top: none; border-left: solid black 1.0pt; border-bottom: solid black 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">DOCTORADO</span></p>
</td>
<td style="width: 92.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
<td style="width: 207.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 76.7pt; border-top: none; border-left: solid black 1.0pt; border-bottom: solid black 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">MAESTR&Iacute;A</span></p>
</td>
<td style="width: 92.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
<td style="width: 207.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 76.7pt; border-top: none; border-left: solid black 1.0pt; border-bottom: solid black 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">ESPECIALIDAD </span></p>
</td>
<td style="width: 92.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
<td style="width: 207.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
</tr>
<tr>
<td style="width: 76.7pt; border: solid black 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">LICENCIATURA</span></p>
</td>
<td style="width: 92.1pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
<td style="width: 207.05pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: justify; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
</div>
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong><u>INFORMACI&Oacute;N LABORAL </u></strong></p>

<table style="width: 711px;" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="width: 5px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 5px;">&nbsp;</td>
<td style="border: 0.75pt solid black; vertical-align: top; background: white; width: 676.111px;" bgcolor="white">
<table style="border-collapse: collapse; width: 100%; margin-left: auto; margin-right: auto;" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td>
<div class="shape" style="padding: 4.35pt 7.95pt 4.35pt 7.95pt;">
<p style="line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; line-height: 150%;">A&Ntilde;OS DE ANTIG&Uuml;EDAD EN LA INSTITUCION: ___________________________________</span></p>
<p style="line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; line-height: 150%;">JEFATURA DE DIVISION A LA QUE ESTA ADSCRITO (A):__________________________</span></p>
</div>
</td>
</tr>
</tbody>
</table>
&nbsp;</td>
</tr>
</tbody>
</table>
<p><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
<p>&nbsp;</p>
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;"><span style="font-size: 10.0pt; font-family: Calibri, sans-serif;">&nbsp;</span></p>
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong><u><br> HORARIO DE TUTORIAS </u></strong></p>
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><strong>&nbsp;</strong></p>
<div align="center">
<table class="MsoNormalTable" style="border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 92.7pt; border: solid black 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; line-height: 150%;">HORA</span></p>
</td>
<td style="width: 105.3pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; line-height: 150%;">SEMESTRE/G</span><span style="font-size: 10.0pt; line-height: 150%;">RUPO</span></p>
</td>
<td style="width: 94.85pt; border: solid black 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; line-height: 150%;">LUGAR</span></p>
</td>
</tr>
 <?php foreach ($grupos2 as $grupo ) { ?>

<tr>
<td style="width: 92.7pt; border-top: none; border-left: solid black 1.0pt; border-bottom: solid black 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 9.0pt; line-height: 150%;">&nbsp;</span></p>
</td>
<td style="width: 105.3pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 9.0pt; line-height: 150%;"><?php echo "".$grupo['semestre']."° ".$grupo['grupo']." ".$grupo['carrera']."";?></span></p>
</td>
<td style="width: 94.85pt; border-top: none; border-left: none; border-bottom: solid black 1.0pt; border-right: solid black 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 9.0pt; line-height: 150%;">&nbsp;</span></p>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;">&nbsp;</p>
<table class="MsoNormalTable" style="border-collapse: collapse; width: 84.4993%; margin-left: auto; margin-right: auto; height: 61px;" border="0" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr style="height: 17px;">
<td style="width: 554.514px; border-top: none; border-right: none; border-left: none; border-image: initial; border-bottom: 1pt solid windowtext; padding: 0cm 5.4pt; height: 17px;" valign="top">
<p style="text-align: center; line-height: 150%; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt; line-height: 100%;"><?php echo ucwords($DatosPersonales['nombre']); ?> <?php echo ucwords($DatosPersonales['a_paterno']); ?> <?php echo ucwords($DatosPersonales['a_materno']); ?></span></p>
</td>
</tr>
<tr style="height: 44px;">
<td style="width: 554.514px; border: none; padding: 0cm 5.4pt; height: 44px;" valign="top">
<p style="text-align: center; margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt;">FIRMA DEL TUTOR</span></p>
<p style="margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Arial, sans-serif; color: black;" align="center"><span style="font-size: 10.0pt;">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
</textarea>
<input  name="Codigor" type="hidden" value="ITESCO-AC-PO-008-02">
<input  name="Titulor" type="hidden" value="Registro de Tutor">
<input  name="Grupo" type="hidden" value="<?php echo $_SESSION['usuario'][0]; ?>">
<button name="submitbtn" class="btn btn-block btn-wine mt-4"> GUARDAR </button>
</form>
                </div>
            </div>
        </div>
      </div>

      <div class="col-md-3">


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
    
  <a class="btn btn-block btn-wine mt-4" data-toggle="collapse" href="#formatosRegistroTutor" role="button" aria-expanded="false" aria-controls="formatosRegistroTutor">Editar Formato del Registro Tutor</a>
</div>

    </div>
</div>
<?php
include_once '../plantillas/doc-cierre.inc.php';
?>
