    

<?php
session_start();
ini_set('display_errors', 0);

if ($_SESSION['usuario']['3'] == '3') {
  include_once '../plantillas/doc-declaracion.inc.php';
  include_once '../plantillas/navbar.inc.php';
  include_once '../app/post.php';
  require_once '../app/conexion.php';
    include_once '../app/op_alumno_edit_perfil.php';
}else {
    session_destroy();
    header('Location: ../inicioSesion.php');
}

?>

  <!-- CSS Files -->
  <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
  <link href="assets/css/demo.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  
 
<div class="container">
    <div class="row" >

        <div class="col-md-9">
            <div id="chat" style="border-color: #2ecc71;">
              
               


        <div class="row" style="margin-top: -102px;">
        <div class="col-sm-12 ">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                  <?php
                   

                  if(isset($_FILES['imagen']['name'])){
            $nombre = $_FILES['imagen']['name'];
$nombrer = strtolower($nombre);
$cd=$_FILES['imagen']['tmp_name'];
$ruta = "img/" . $DTBUSER[0][8].".jpg";
$destino = "C:/xampp/htdocs/PITA-2.0.1/img/perfil/" .$DTBUSER[0][8].".jpg";
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
               }

/*
                  foreach($_POST as $campo => $valor){

  if ($campo=='nombre'){
   echo "<br />Tu nombre es ". $valor;
  } else if ($campo=='apellidos'){
   echo "<br />Tu apellido es ". $valor;
  } else {
    echo "<br />Es otro campo: ". $campo ." = ". $valor;
  }
}*/
                  if(isset($_POST['finish'])){
                    $DATOSM = $conexion->prepare('CALL editar_datos_tutorado(:a_paterno,:a_materno,:nombrea,:no_control,:sexo,:fechanac,:num_telefono,:emaila,:estado_civil,:nacionalidad,:entidad_origen,:lengua_indigena,:nombre_idioma_ind,:calle,:numero_interior,:colonia,:codigo_postalA,:ciudadA,:municipioA,:estadoA,:escuela_procedencia,:entidad_procedencia,:nombre_empresa,:horario_trabajo,:especifricar_enfermedad,:espci_enf,:medicamento_que_tomas,:frecuencia_tomas_medicamento,:especifricar_discapacidad,:nombre_disc,:alergico,:especifricar_medicamento,:parentescoT,:ap_paterno,:ap_materno,:nombret,:domiciioT,:ciudadT,:codigo_postalT,:municipioT,:estadoT,:telefonoT,:emailt,:celularT,:ocupacion,:edad,:principal_sosten_economico,:cuantos_viven_encasa,:cuantos_hermanos_tienes,:hombres,:mujeres,:que_lugar_ocupas,:actualmente_vives_con,:cuantos_viven_actualmente_contigo,:cuantos_laboran,:acceso_internet_casa,:cuentas_con_computadora_lap,:especificar,:parentesco,:apellido_peterno,:apellido_materno,:nombre,:domiciio,:ciudad,:codigo_postal,:municipio,:estado,:telefono,:email,:celular,:id_usuario)');
                
$DATOSM->execute(array(':a_paterno' => $_POST['apellidop'],':a_materno'=> $_POST['apellidom'],':nombrea'=> $_POST['NombreA'], ':no_control' => $_POST ['ncontrol'],':sexo' => $_POST['sexo'], ':fechanac' => $_POST['fecha'],':num_telefono' => $_POST['telefono'], ':emaila' => $_POST['correoE'], ':estado_civil' => $_POST['estadoC'], ':nacionalidad' => $_POST['Nacionalidad'], ':entidad_origen' => $_POST['EntidadOrigen'], ':lengua_indigena' => $_POST['hablanteI'],':nombre_idioma_ind' => $_POST['idiomaI'], ':calle' => $_POST['DomicilioA'], ':numero_interior' => $_POST['NumeroInt'], ':colonia' => $_POST['Colonia'],':codigo_postalA' => $_POST['Cp'], ':ciudadA' => $_POST['Ciudad'], ':municipioA' => $_POST['municipio'], ':estadoA' => $_POST['estado'], ':escuela_procedencia' => $_POST['EscuelaP'], ':entidad_procedencia' => $_POST['EntidadP'], ':nombre_empresa' => $_POST['NombreE'], ':horario_trabajo' => $_POST['HorarioTrabajo'], ':especifricar_enfermedad' => $_POST['Enfermedad'], ':espci_enf' => $_POST['NombreEnfermedad'], ':medicamento_que_tomas' => $_POST['MedicamentoT'], ':frecuencia_tomas_medicamento' => $_POST['FrecuenciaT'], ':especifricar_discapacidad' => $_POST['Discapacidad'],':nombre_disc' => $_POST['DiscapacidadE'], ':alergico' => $_POST['Alergico'], ':especifricar_medicamento' => $_POST['AlergicoE'], ':parentescoT' => $_POST['ParentescoT'], ':ap_paterno' => $_POST['apellidopaT'], ':ap_materno' => $_POST['apellidomaT'], ':nombret' => $_POST['NombreT'], ':domiciioT' => $_POST['DomicilioAT'], ':ciudadT' => $_POST['CiudadT'], ':codigo_postalT' => $_POST['CpT'], ':municipioT' => $_POST['municipioT'], ':estadoT' => $_POST['estadoT'], ':telefonoT' => $_POST['TelefonoT'], ':emailt' => $_POST['emailT'], ':celularT' => $_POST['CelT'],':ocupacion' => $_POST['OcupacionT'], ':edad' => $_POST['edadT'], ':principal_sosten_economico' => $_POST['SostenE'], ':cuantos_viven_encasa' => $_POST['VivesAcon'], ':cuantos_hermanos_tienes' => $_POST['Chermanos'],':hombres' => $_POST['CHombre'], ':mujeres' => $_POST['CMujer'],':que_lugar_ocupas' => $_POST['Locupas'], ':actualmente_vives_con' => $_POST['VivesAcon'],':cuantos_viven_actualmente_contigo' => $_POST['CuantoVC'], ':cuantos_laboran' => $_POST['CLaboran'], ':acceso_internet_casa' => $_POST['AccesoInt'], ':cuentas_con_computadora_lap' => $_POST['CuentasConComputadora'],':especificar' => $_POST['EspecificaCp'], ':parentesco' => $_POST['ParentescoM'], ':apellido_peterno' => $_POST['apellidopaM'], ':apellido_materno' => $_POST['apellidomaM'], ':nombre' => $_POST['NombreM'] , ':domiciio' => $_POST['DomicilioATM'], ':ciudad' => $_POST['CiudadM'], ':codigo_postal' => $_POST['CpM'], ':municipio' => $_POST['municipioM'],':estado' => $_POST['estadoM'], ':telefono' => $_POST['TelefonoM'], ':email' => $_POST['emailM'], ':celular' => $_POST['celularM'], ':id_usuario' => $_POST['Id_Usuario']));
$DATOSM = null;
  header("location: ../alumno/editar_perfil.php");
                    //print_r($_GET['todosF']);
                  }
                  ?>
                    <form action="http://localhost/PITA-2.0.1/alumno/editar_perfil.php" method="POST" enctype="multipart/form-data" name="todosF">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                      <div class="wizard-header">
                          <h3>
                             <b>REGISTRO DE TUTORADO </b> <br>
                           
                          </h3>
                      </div>

            <div class="wizard-navigation">
              <ul>
                              <li><a href="#about" data-toggle="tab">DATOS PERSONALES</a></li>
                              <li><a href="#account" data-toggle="tab">INFORMACIÓN GENERAL </a></li>
                              <li><a href="#address" data-toggle="tab">INFORMACIÓN ACADÉMICA Y LABORAL</a></li>
                              <li><a href="#informaionClinica" data-toggle="tab">INFORMACIÓN CLÍNICA</a></li>
                              <li><a href="#DtosTutor" data-toggle="tab">DATOS DEL PADRE, TUTOR O CONYUGE </a></li>
                              <li><a href="#EstudioS" data-toggle="tab">ESTUDIO SOCIOECONÓMICO</a></li>
                              <li><a href="#DatosEm" data-toggle="tab"> DATOS DE CONTACTO PARA CASOS DE EMERGENCIA </a></li>

                              
                          </ul>

            </div>

                        <div class="tab-content">
                                                     <div class="tab-pane" id="about">
                              <div class="row">
                                  
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src=" <?php $destino = "C:/xampp/htdocs/PITA-2.0.1/img/perfil/" .$DTBUSER[0][8].".jpg";

                                              $verificar = is_file($destino);

                                              if($verificar){
                                                echo "../img/perfil/" .$DTBUSER[0][8].".jpg";


                                              }

                                              else{
                                               ?>
                                               assets/img/default-avatar.png <?php } ?>" class="picture-src" id="wizardPicturePreview" title=""/>
                                              
                                              
                                              <input type="file" name="imagen" id="wizard-picture">
                                          </div>
                                          <h6>Selecciona tu foto</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Nombre <small>(requerido)</small></label>
                                        <input name="NombreA" type="text" class="form-control" value="<?php echo $DTBUSER[0][2]?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Apellido Paterno <small>(requeridos)</small></label>
                                        <input name="apellidop" type="text" class="form-control" value="<?php echo $DTBUSER[0][3]?>">
                                      </div>
                                        <div class="form-group">
                                        <label>Apellido Materno <small>(Requerido)</small></label>
                                        <input name="apellidom" type="text" class="form-control" value="<?php echo $DTBUSER[0][4]?>">
                                      </div>
                                     
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>No. DE CONTROL <small>(Requerido)</small></label>
                                        <input name="ncontrol" type="text" class="form-control" value="<?php echo $DTBUSER[0][8]?>">
                                      </div>
                                    <div class="form-group">
                                            <label>Sexo</label><br>
                                             <select name="sexo" class="form-control">
                                              <?php if($DTBUSER[0]['14'] == 'm'){?>
                                                <option value="F"> Femenino </option>
                                                <option value="M" selected> Masculino </option>
                                              <?php } else{?>
                                                 <option value="F" selected> Femenino </option>
                                                <option value="M" > Masculino </option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                           <div class="form-group">
                                        <label>Fecha de Nacimiento </label>
                                        <input name="fecha" type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($DTBUSER[0][5])) ?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Telefono</label>
                                        <input name="telefono" type="text" class="form-control" value="<?php echo $DTBUSER[0][7]?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Correo <small>(Requerido)</small></label>
                                          <input name="correoE" type="text" class="form-control" value="<?php echo $DTBUSER[0][12]?>">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-12">
                                              <div class="form-group">
                                            <label>Estado Civil</label><br>
                                             <select name="estadoC" class="form-control">
                                                <?php if($DTBUSER[0]['15'] == 'casado'){?>
                                                <option value="Soltero"> Soltero </option>
                                                <option value="Casado" selected> Casado </option>
                                              <?php } else{?>
                                               <option value="Soltero" selected> Soltero </option>
                                                <option value="Casado"> Casado </option>
                                              <?php } ?>

                                            </select>
                                          </div>
                                            <div class="form-group">
                                        <label>Nacionalidad</small></label>
                                        <input name="Nacionalidad" type="text" class="form-control"  value="<?php echo $DTBUSER[0][16]?>">

                                      </div>
                                          <div class="form-group">
                                        <label>Entidad de origen</label>
                                        <input name="EntidadOrigen" type="text" class="form-control"  value="<?php echo $DTBUSER[0][26]?>">
                                        
                                      </div>
                                          <div class="form-group">
                                        <label>HABLANTE DE LENGUA INDIGENA <small>(Requerido)</small></label>
                                           <select name="hablanteI" class="form-control">
                                               <?php if($DTBUSER[0]['27'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                               
                                                
                                            </select>
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>ESPECIFICA CUAL: <small>(Si hablas una lengua indigena)</small></label>
                                         <input name="idiomaI" type="text" class="form-control" value="<?php echo $DTBUSER[0][28]?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>Domicilio Actual: </label>
                                         <input name="DomicilioA" type="text" class="form-control" value="<?php echo $DTBUSER[0][6]?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>Numero interior: </label>
                                         <input name="NumeroInt" type="text" class="form-control" value="<?php echo $DTBUSER[0][18]?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>Colonia: </label>
                                         <input name="Colonia" type="text" class="form-control" value="<?php echo $DTBUSER[0][19]?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>C.p: </label>
                                         <input name="Cp" type="text" class="form-control" value="<?php echo $DTBUSER[0][20]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Ciudad: </label>
                                         <input name="Ciudad" type="text" class="form-control" value="<?php echo $DTBUSER[0][21]?>">
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>Municipio: </label>
                                         <input name="municipio" type="text" class="form-control" value="<?php echo $DTBUSER[0][22]?>">
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>Estado: </label>
                                         <input name="estado" type="text" class="form-control" value="<?php echo $DTBUSER[0][23]?>">
                                        
                                      </div>
                                           
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> INFORMACIÓN ACADÉMICA  </h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Escuela de Procedencia</label>
                                            <input type="text" name="EscuelaP" class="form-control" value="<?php echo $DTBUSER[0][29]?>">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Entidad de Procedencia</label>
                                            <input type="text" name="EntidadP"
                                            class="form-control" value="<?php echo $DTBUSER[0][30]?>">
                                          </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> INFORMACIÓN LABORAL</h4> </div>

                                        <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Nombre de la Empresa</label>
                                            <input type="text" name="NombreE" class="form-control" value="<?php echo $DTBUSER[0][32]?>">
                                          </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                            <label>Horario de Trabajo</label>
                                            <input type="text" name="HorarioTrabajo" class="form-control" value="<?php echo $DTBUSER[0][33]?>">
                                          </div>
                                        </div>
                                                                    
                                </div>
                            </div>

                             <div class="tab-pane" id="informaionClinica">
                                <div class="row">
                                   <div class="col-sm-12">
                                  <p>CON EL OBJETIVO DE LLEVAR UN CONTROL EN EL SERVICIO MÉDICO, SE SOLICITA LA SIGUIENTE:</p>
                                </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-12">
                                              <div class="form-group">
                                            <label>¿PADECES ALGUNA ENFERMEDAD CRÓNICA?</label><br>
                                             <select name="Enfermedad" class="form-control">
                                              <?php if($DTBUSER[0]['36'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                               
                                              
                                                
                                            </select>
                                          </div>
                                            <div class="form-group">
                                        <label>ESPECIFICA CUÁL: </label>
                                        <input name="NombreEnfermedad" type="text" class="form-control" value="<?php echo $DTBUSER[0][37]?>">

                                      </div>
                                          <div class="form-group">
                                        <label>¿QUÉ MEDICAMENTO TOMAS? </label>
                                        <input name="MedicamentoT" type="text" class="form-control" value="<?php echo $DTBUSER[0][38]?>">
                                        
                                      </div>
                                      
                                       <div class="form-group">
                                        <label>¿CON QUE FRECUENCIA?</label>
                                        <input name="FrecuenciaT" type="text" class="form-control" value="<?php echo $DTBUSER[0][39]?>">
                                        
                                      </div>
                                          <div class="form-group">
                                        <label>¿TIENES ALGUNA DISCAPACIDAD?  (MOTRIZ, VISUAL, AUDITIVA, PSICOSOCIAL, INTELECTUAL) </label>
                                           <select name="Discapacidad" class="form-control">
                                              <?php if($DTBUSER[0]['40'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                            </select>
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>ESPECIFICA CUAL:</label>
                                         <input name="DiscapacidadE" type="text" class="form-control" value="<?php echo $DTBUSER[0][41]?>">
                                        
                                      </div>
                                      
                                         <div class="form-group">
                                        <label>¿ERES ALERGICO A ALGUN MEDICAMENTO? </label>
                                           <select name="Alergico" class="form-control">
                                                   <?php if($DTBUSER[0]['42'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                            </select>
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>ESPECIFICA CUAL:</label>
                                         <input name="AlergicoE" type="text" class="form-control" value="<?php echo $DTBUSER[0][42]?>">
                                        
                                      </div>
                                       
                                           
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="DtosTutor">
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-12">
                                             <div class="form-group">
                                        <label>Parentesco <small>(Requerido)</small></label>
                                        <input name="ParentescoT" type="text" class="form-control" value="<?php echo $DTBUSER[0][46]?>">

                                      </div>
                                             <div class="form-group">
                                        <label>Nombre </label>
                                        <input name="NombreT" type="text" class="form-control" value="<?php echo $DTBUSER[0][49]?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Apellido Paterno </label>
                                        <input name="apellidopaT" type="text" class="form-control" value="<?php echo $DTBUSER[0][47]?>">
                                      </div>
                                        <div class="form-group">
                                        <label>Apellido Materno </label>
                                        <input name="apellidomaT" type="text" class="form-control" value="<?php echo $DTBUSER[0][48]?>">
                                      </div>
                                           
                                            <!--<div class="form-group">
                                        <label>Nacionalidad </label>
                                        <input name="NacionalidadT" type="text" class="form-control" value="<?php /*echo $DTBUSER[0][50]*/?>">

                                      </div>-->
                                     
                                       <div class="form-group">
                                        <label>Domicilio Actual: </label>
                                         <input name="DomicilioAT" type="text" class="form-control" value="<?php echo $DTBUSER[0][51]?>">
                                        
                                      </div>
                                      
                                      
                                       <div class="form-group">
                                        <label>C.p: </label>
                                         <input name="CpT" type="text" class="form-control" value="<?php echo $DTBUSER[0][53]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Ciudad: </label>
                                         <input name="CiudadT" type="text" class="form-control" value="<?php echo $DTBUSER[0][52]?>">
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>Municipio: </label>
                                         <input name="municipioT" type="text" class="form-control" value="<?php echo $DTBUSER[0][54]?>">
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>Estado: </label>
                                         <input name="estadoT" type="text" class="form-control" value="<?php echo $DTBUSER[0][55]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Telefono: </label>
                                         <input name="TelefonoT" type="text" class="form-control" value="<?php echo $DTBUSER[0][56]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>E-mail: </label>
                                         <input name="emailT" type="text" class="form-control" value="<?php echo $DTBUSER[0][57]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Cel: </label>
                                         <input name="CelT" type="text" class="form-control" value="<?php echo $DTBUSER[0][58]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Ocupacion: </label>
                                         <input name="OcupacionT" type="text" class="form-control" value="<?php echo $DTBUSER[0][59]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Edad: </label>
                                         <input name="edadT" type="text" class="form-control" value="<?php echo $DTBUSER[0][60]?>">
                                        
                                      </div>
                                           
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                             <div class="tab-pane" id="EstudioS">
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-12">
                                       <div class="form-group">
                                            <label>TU PRINCIPAL SOSTÉN ECONÓMICO ES:</label><br>
                                             <select name="SostenE" class="form-control">
                                              <?php switch ($DTBUSER[0][63]) {
                                                case 'Padre':
                                                  echo ' <option value="Padre" selected> Padre </option>
                                                <option value="Madre"> Madre </option>
                                                <option value="Ambos"> Ambos </option>
                                                <option value="Familiar"> Familiar </option>
                                                <option value="Tu mismo"> Tu Mismo </option>';
                                                  break;
                                                case 'Madre':
                                                  echo ' <option value="Padre"> Padre </option>
                                                <option value="Madre" selected> Madre </option>
                                                <option value="Ambos"> Ambos </option>
                                                <option value="Familiar"> Familiar </option>
                                                <option value="Tu mismo"> Tu Mismo </option>';
                                                  break;
                                                case 'Ambos':
                                                  echo ' <option value="Padre"> Padre </option>
                                                <option value="Madre"> Madre </option>
                                                <option value="Ambos" selected> Ambos </option>
                                                <option value="Familiar"> Familiar </option>
                                                <option value="Tu mismo"> Tu Mismo </option>';
                                                  break;
                                                case 'Familiar':
                                                  echo ' <option value="Padre"> Padre </option>
                                                <option value="Madre"> Madre </option>
                                                <option value="Ambos"> Ambos </option>
                                                <option value="Familiar" selected> Familiar </option>
                                                <option value="Tu mismo"> Tu Mismo </option>';
                                                  break;
                                                case 'Tu mismo':
                                                  echo ' <option value="Padre"> Padre </option>
                                                <option value="Madre"> Madre </option>
                                                <option value="Ambos"> Ambos </option>
                                                <option value="Familiar"> Familiar </option>
                                                <option value="Tu mismo" selected> Tu Mismo </option>';
                                                  break;
                                                default:
                                                  echo ' <option value="Padre"> Padre </option>
                                                <option value="Madre"> Madre </option>
                                                <option value="Ambos"> Ambos </option>
                                                <option value="Familiar"> Familiar </option>
                                                <option value="Tu mismo"> Tu Mismo </option>';
                                                  break;
                                              } ?>
                                                
                                            </select>
                                          </div>
                                             <div class="form-group">
                                        <label>¿CUÁNTOS VIVEN EN TU CASA? </label>
                                        <input name="vivenC" type="text" class="form-control" value="<?php echo $DTBUSER[0][64]?>">
                                      </div>
                                     
                                        <div class="form-group">
                                          ¿CUANTOS HERMANOS TIENES? 

                                        <input name="Chermanos" type="number" class="form-control" value="<?php echo $DTBUSER[0][65]?>">
                                          <div class="form-group">
                                        <label>Hombre </label>
                                        <input name="CHombre" type="number" class="form-control" value="<?php echo $DTBUSER[0][66]?>">
                                      </div>
                                        <div class="form-group">
                                        <label>Mujer</label>
                                        <input name="CMujer" type="number" class="form-control" value="<?php echo $DTBUSER[0][67]?>">
                                      </div>
                                      </div>
                                           
                                            <div class="form-group">
                                        <label>¿QUE LUGAR OCUPAS? </label>
                                        <input name="Locupas" type="text" class="form-control" value="<?php echo $DTBUSER[0][68]?>">

                                      </div>
                                         <div class="form-group">
                                            <label>ACTUALMENTE VIVES CON::</label><br>
                                             <select name="VivesAcon" class="form-control">
                                                <?php switch ($DTBUSER[0][63]) {
                                                case 'Padres':
                                               echo '<option value="Padres" selected> Padres </option>
                                                <option value="Tutor"> Tutor </option>
                                                <option value="Solo"> Solo </option>';
                                                  break;
                                                case 'Tutor':
                                                echo '<option value="Padres"> Padres </option>
                                                <option value="Tutor" selected> Tutor </option>
                                                <option value="Solo"> Solo </option>';
                                                  break;
                                                case 'Solo':
                                                 echo '<option value="Padres"> Padres </option>
                                                <option value="Tutor"> Tutor </option>
                                                <option value="Solo" selected> Solo </option>';
                                                  break;
                                               
                                                default:
                                                  echo '<option value="Padres"> Padres </option>
                                                <option value="Tutor"> Tutor </option>
                                                <option value="Solo"> Solo </option>';
                                                  break;
                                              } ?>
                                               
                                                
                                            </select>
                                          </div>
                                       <div class="form-group">
                                        <label>¿CUANTOS VIVEN ACTUALMENTE CONTIGO? : </label>
                                         <input name="CuantoVC" type="number" class="form-control"value="<?php echo $DTBUSER[0][70]?>">
                                        
                                      </div>
                                      
                                       <div class="form-group">
                                        <label>¿CUANTOS LABORAN? : </label>
                                         <input name="CLaboran" type="text" class="form-control" value="<?php echo $DTBUSER[0][71]?>">
                                        
                                      </div>
                                     
                                    
                                        <div class="form-group">
                                        <label>¿TIENES ACCESO A INTERNET EN TU CASA? </label>
                                        <select name="AccesoInt" class="form-control">
                                                 <?php if($DTBUSER[0]['72'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                          
                                        </select>
                                        
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>¿CUENTAS CON COMPUTADORA O LAP TOP?: </label>
                                            <select name="CuentasConComputadora" class="form-control">
                                                <?php if($DTBUSER[0]['73'] == 'Si'){?>
                                             <option value="Si" selected> Si </option>
                                                <option value="No"> No </option>
                                              <?php } else{?>
                                                <option value="Si"> Si </option>
                                                <option value="No" selected> No </option>
                                              <?php } ?>
                                        </select>
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>ESPECIFICA CUÁL: </label>
                                         <input name="EspecificaCp" type="text" class="form-control" value="<?php echo $DTBUSER[0][74]?>">
                                        
                                      </div>
                                     
                                           
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>

                             <div class="tab-pane" id="DatosEm">
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-12">
                                             <div class="form-group">
                                        <label>Parentesco <small>(Requerido)</small></label>
                                        <input name="ParentescoM" type="text" class="form-control" value="<?php echo $DTBUSER[0][77]?>">

                                      </div>
                                             <div class="form-group">
                                        <label>Nombre </label>
                                        <input name="NombreM" type="text" class="form-control" value="<?php echo $DTBUSER[0][80]?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Apellido Paterno </label>
                                        <input name="apellidopaM" type="text" class="form-control" value="<?php echo $DTBUSER[0][78]?>">
                                      </div>
                                        <div class="form-group">
                                        <label>Apellido Materno </label>
                                        <input name="apellidomaM" type="text" class="form-control" value="<?php echo $DTBUSER[0][79]?>">
                                      </div>
                                           
                                     
                                     
                                       <div class="form-group">
                                        <label>Domicilio Actual: </label>
                                         <input name="DomicilioATM" type="text" class="form-control" value="<?php echo $DTBUSER[0][81]?>">
                                        
                                      </div>
                                      
                                     <div class="form-group">
                                        <label>Ciudad: </label>
                                         <input name="CiudadM" type="text" class="form-control" value="<?php echo $DTBUSER[0][82]?>">
                                        
                                      </div>
                                       <div class="form-group">
                                        <label>C.p: </label>
                                         <input name="CpM" type="text" class="form-control" value="<?php echo $DTBUSER[0][83]?>">
                                        
                                      </div>
                                      
                                         <div class="form-group">
                                        <label>Municipio: </label>
                                         <input name="municipioM" type="text" class="form-control" value="<?php echo $DTBUSER[0][84]?>">
                                        
                                      </div>
                                         <div class="form-group">
                                        <label>Estado: </label>
                                         <input name="estadoM" type="text" class="form-control" value="<?php echo $DTBUSER[0][85]?>">
                                        
                                      </div>
                                        <div class="form-group">
                                        <label>Telefono: </label>
                                         <input name="TelefonoM" type="text" class="form-control" value="<?php echo $DTBUSER[0][86]?>">
                                        
                                      </div> 
                                       <div class="form-group">
                                        <label>CORREO ELECTRONICO: </label>
                                         <input name="emailM" type="text" class="form-control" value="<?php echo $DTBUSER[0][87]?>">

                                          </div> 
                                       <div class="form-group">
                                        <label>CEL: </label>
                                         <input name="celularM" type="text" class="form-control" value="<?php echo $DTBUSER[0][88]?>">
                                        
                                    
                                        
                                      </div>
                                      
                                   
                                           
                                        </div>
                                    
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm float-right' name='next' value='Siguente' />
                                <input type="hidden" name="Id_Usuario" value="<?php echo $DTBUSER[0][89]?>">
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm float-right' name='finish' value='Guardar' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm float-left' name='previous' value='Regresar' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
   
    <!--   Core JS Files   -->
  <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

  <!--  Plugin for the Wizard -->
  <script src="assets/js/gsdk-bootstrap-wizard.js"></script>

  <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
  <script src="assets/js/jquery.validate.min.js"></script>




                   
               
            </div>
        </div>
        <?php include_once '../plantillas/A-menu.inc.php'; ?>
    </div>
</div>
<?php
//include_once '../plantillas/doc-cierre.inc.php';
?>