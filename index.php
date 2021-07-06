<?php
	require "conexion.php";
	
	session_start();	
?>

<!-- comentary erika -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simulador | TecNM</title>
        
      
		<link rel="icon" type="image/png" sizes="192x192"  href="iconos/tecnm.png">


        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>
    <body style="background: #1B396A">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main >
                    <div class="container">
                    	<div class="mensaje">
                    		<?php 
	if($_POST){
		
		$usuario = trim($_POST['usuario']);
		$password = $_POST['password'];
		
		$sql = "SELECT id, username, password, nombre, tipo, correo, escuela, telefono FROM usuario WHERE nombre='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = $password;
			//if (password_verify($password, $password_bd)) {
			if($password_bd == $pass_c){
				$_SESSION['id'] = $row['id'];
				$_SESSION['usuario'] = $row['username'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo'];
				$_SESSION['correo'] = $row['correo'];
				$_SESSION['escuela'] = $row['escuela'];
				$_SESSION['telefono'] = $row['telefono'];
				
					header("Location: principal.php");		
				
			} else {

			$mensaje='<center><div  class="alert alert-danger alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La contraseña <strong>no coincide</strong>, vuelva a intentarlo.</div></center>';
			//$mensaje='<script type="text/javascript">alert("Tarea Guardada");window.location.href="index.php"; </script>';
			echo $mensaje;
			
			}
			
			} else {
			$mensaje='<center><div class="alert alert-danger alert-dismissable text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    No existe <strong>Usuario</strong>, vuelva a intentarlo.</div></center>';
			//echo "NO existe usuario";
			echo $mensaje;
		}
		
		
		
	}
                    		 ?>
                    	</div>
                        <div class="row justify-content-center" >
                            <div class="col-lg-4">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                    	<center>
                                    		
                                    		<img src="img/avatar.png" title="Inicio de sesion" width="100" height="100">
                                       	
                                       	</center>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-floating">

                                            <div class="form-floating mt-3 ">
                                            	<input class="form-control " id="floatingInput1" name="usuario" type="text" placeholder="Ingresa tu usuario" required />
                                            	<label for="floatingInput1"><font color="#1B396A">Usuario</font></label>
                                            </div>

                                            <div class="input-group form-floating mt-3">
                                            	<input class="form-control floatingPassword" id="inputPassword" name="password" type="Password" required placeholder="Ingresa tu contraseña" />
												<label for="floatingPassword"><font color="#1B396A">Contraseña</font></label>
                                            	<div class="input-group-append">
		                                          <button id="show_password1" class="btn btn-primary" style="background: #1B396A; color: #fff;" type="button" onclick="mostrarPassword1()"> <span class="fa fa-eye-slash icon"></span> </button>
		                                        </div> 
                                            </div>  


                                            <div class="form-group align-items-center  mt-4 mb-0"><center>
											<button type="submit" class="btn "  style="color: #fff; background: #1B396A; border-radius: 15px; ">Iniciar</button></center></div>
										</form>
									</div>
                                    <div class="card-footer text-center" align="right">
                                        <div class="small" align="right">
                                        	 <strong> ¡Regístrate!</strong>
                                        	<button type="button" class="btn " style="color: #fff;" data-toggle="modal" data-target="#test1">
                                        		<i style=" background: #1B396A;"  class="far fa-address-card"></i></button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- modal -->
		            <div id="test1" class="modal fade " role="dialog" style="z-index: 1400;">
		              <div class="modal-dialog " >
		                <!-- Modal content-->
		                <div class="modal-content" style="border-radius: 5%; ">
		                  <div class="modal-header text-center" style="background: #1B396A; color: #fff;">
		                    <h5 class="modal-title" style="margin-left: 25%;">Formulario de registro</h5>
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                      <span aria-hidden="true">&times;</span>
		                    </button>
		                  </div>
		                  
		                  <div class="modal-body">
		                    <!-- formulario -->
		                    <form method="POST" action="registroUs/guardar.php" class="needs-validation" novalidate autocomplete="off">
		                      
		                        <div class="form-row">
		                            <div class="col-md-6 mb-3">
		                              <label for="validationCustom01">Equipo / Nombre <strong>*</strong></label>
		                              <input type="text" class="form-control" id="validationCustom01" name="nom" placeholder="First name"  required title="Three letter country code">
		                              <div class="invalid-feedback" title="Three letter country code">Ingresa un nombre o equipo </div>
		                            </div>

		                            <div class="col-md-6 mb-3">
		                              <label for="validationCustom02">Telefono </label>
		                              <input type="text" class="form-control" id="validationCustom02" name="tel" placeholder="Telefono" >
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label for="exampleDataList" class="form-label">Selecciona una escuela <strong>*</strong></label>
		                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="escuela" placeholder="Escribe para buscar..." required>
		                            <datalist id="datalistOptions" data-show-subtext="true">
		                            <?php
		                                $consulta = "SELECT * FROM tecnologicos ";
		                                $resultado = mysqli_query($conexion , $consulta);
		                                $contador=0;
		                                while($misdatos = mysqli_fetch_assoc($resultado)){ 
		                                    $contador++;?>
		                              <option value="<?php echo $misdatos["nombre"]; ?>"></option>
		                            <?php }?>    
		                            </datalist>
		                            <div class="invalid-feedback">Selecciona una Institucion</div>
		                        </div>

		                        <div class="form-row">
		                            <div class="col-md-12 mb-3">
		                              <label for="validationCustomUsername">Correo electronico <strong>*</strong></label>
		                              <div class="input-group">
		                                <div class="input-group-prepend">
		                                  <span class="input-group-text" id="inputGroupPrepend">@</span>
		                                </div>
		                                <input type="email" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" name="correo" required >
		                                <div class="invalid-feedback">
		                                  Ingresa un correo valido
		                                </div>
		                              </div>
		                            </div>
		                        </div>        

		                        <div class="form-row">
		                            <div class="col-md-6 mb-3">
		                              <label for="validationCustom03">Usuario <strong>*</strong></label>
		                              <input type="text" class="form-control" id="us" name="us" placeholder="First name"  pattern="^([a-z]+[0-9]{0,4}){5,10}$" required title="Usuario valido entre 5 y 10 caracteres sin espacios ni caracteres especiales (.,-/*´+_)">
		                              <div class="invalid-feedback">Ingresa un usuario</div>
		                            </div>

		                            <div class="col-md-6 mb-3">
		                                <label for="validationCustom04">Crea una contraseña <strong>*</strong></label>
		                                <div class="input-group">
		                                    <input ID="txtPassword" type="Password" Class="form-control" pattern="[A-Za-z0-9!?-]{8,12}" name="contra" required title=" Creas un contraseña la cual podrá contener mayúsculas, minúsculas, números y los caracteres !?-. Su tamaño: entre 8 y 12 caracteres.">
		                                    <div class="input-group-append">
		                                          <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
		                                        </div> 
		                                <div class="invalid-feedback">Ingresa una contraseña valida</div>
		                                </div>
		                              </div>       
		                        </div>
		                         <div class="form-group validated" align="center">
											    <div class="custom-control custom-checkbox mb-3">
											    <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="tipo" value="2" required>
											    <label class="custom-control-label" for="customControlValidation1">Acepta los términos y condiciones</label>
											    <div class="invalid-feedback">Debes estar de acuerdo antes de enviar.</div>
											  </div>

										</div> 
		                        <div id="result-username"></div>
		                    </form>
		                    <!-- fin del formulario -->
		                  </div>      
		                </div>
		              </div>
		            </div> 
		        <!-- fin de modal -->
				</main>
			</div>

            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Todos los derechos reservados DASHA |<a href="http://www.ittlahuac2.edu.mx/inicio"style='text-decoration:none; color: #6c757d;' target="_blank"> ITT2</a></div>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#politica" style='text-decoration:none;color:black;'><i class="fas fa-file-contract"></i> Política de privacidad</a>
                                &middot;
                                <a href="#" data-toggle="modal" data-target="#terminos" style='text-decoration:none;color:black;'><i class="fas fa-file-signature"></i> Términos &amp; condiciones</a>
                                &middot;
                                <a  href="#" data-toggle="modal" data-target="#RIM" style='text-decoration:none;color:black;'>
                                <i class="fas fa-file-pdf"></i> RIM 
                        		</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<!-- modal RIM -->
        <div id="RIM" class="modal fade" role="dialog" style="z-index: 1400;">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header" style="background: #1B396A; color: #fff;">
                   <h3 class="modal-title col-11 text-center"><center>Archivos del RIM</center></h3>
                </div>
              <div class="modal-body">
                    <iframe src="verus.php" width="100%" height="450px"></iframe>
              </div>      
            </div>
          </div>
        </div>
        <!-- modal RIM-->
        <!-- modal politica -->
        <div id="politica" class="modal fade" role="dialog" style="z-index: 1400;">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header" style="background: #1B396A; color: #fff;">
                   <h3 class="modal-title col-11 text-center"><center>Política de privacidad</center></h3>
                </div>
              <div class="modal-body">
                    
              </div>      
            </div>
          </div>
        </div>
        <!-- modal politica-->
        <!-- modal terminos -->
        <div id="terminos" class="modal fade" role="dialog" style="z-index: 1400;">
          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" >
              <div class="modal-header" style="background: #1B396A; color: #fff;">
                   <h3 class="modal-title col-11 text-center"><center>Términos &amp; condiciones</center></h3>
                </div>
              <div class="modal-body">
                    
              </div>      
            </div>
          </div>
        </div>
        <!-- modal terminos-->
		<script>
	    // Example starter JavaScript for disabling form submissions if there are invalid fields
	    (function() {
	      'use strict';
	      window.addEventListener('load', function() {
	        // Fetch all the forms we want to apply custom Bootstrap validation styles to
	        var forms = document.getElementsByClassName('needs-validation');
	        // Loop over them and prevent submission
	        var validation = Array.prototype.filter.call(forms, function(form) {
	          form.addEventListener('submit', function(event) {
	            if (form.checkValidity() === false) {
	              event.preventDefault();
	              event.stopPropagation();
	            }
	            form.classList.add('was-validated');
	          }, false);
	        });
	      }, false);
	    })();
	    </script>
		<script type="text/javascript">
        $(document).ready(function() {  
            $('#us').on('blur', function() {
                $('#result-username').html('<img src="img/loader2.gif" />').fadeOut(1000);
         
                var username = $(this).val();       
                var dataString = 'username='+username;
         
                $.ajax({
                    type: "POST",
                    url: "registroUs/validarus.php",
                    data: dataString,
                    success: function(data) {
                        $('#result-username').fadeIn(1000).html(data);
                    }
                });
            });              
        });    
    </script>

    <script type="text/javascript">
        function mostrarPassword1(){
                var cambio = document.getElementById("inputPassword");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            } 
            
            $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword1').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>

    <script type="text/javascript">
        function mostrarPassword(){
                var cambio = document.getElementById("txtPassword");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            } 
            
            $(document).ready(function () {
            //CheckBox mostrar contraseña
            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
        });
    </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
	</body>
</html>
