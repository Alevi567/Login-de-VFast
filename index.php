<?php 
error_reporting(0);
include 'includes/conecta.php';
if(isset($_POST['inicio'])){
$ruser = $conecta-> real_escape_string($_POST ['Usuario']);
$rgmail = $conecta-> real_escape_string($_POST ['Gmail']);
//el md 5 sirve para enmascarar los campos 
$rpass = $conecta-> real_escape_string($_POST ['Password']);
//aqui empieza la consulta 
$consulta = "SELECT * FROM usuarios WHERE Uusario = '$ruser' and Email = '$rgmail' and Password = '$rpass' ";
if($resultado = $conecta->query($consulta)){
	while($row = $resultado->fetch_array()){
		$userok = $row['Usuario'];
		$Gmailok = $row['Email'];
		$passok = $row['Password'];
	}
	$resultado->close();
}
$conecta->close();
if(isset($ruser) && isset($rgmail) && isset($rpass)){
	if($ruser == $userok && $rgmail == $Gmailok && $rpass == $passok){
	$_SERVER['login'] = TRUE;
	$_SERVER['Usuario'] = $usuario;
	header("location:Temporizador.html");
}
else{
	$mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
	           <strong>Oh Lo siento</strong> tus datos no se encontraron verificalos por favor .
	           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	           <span aria-hidden='true'>&times;</span>
	           </div>";
}
}
else{
	$mensaje.="<div class='alert alert-danger alert-dismissible fade show' role=a'lert'>
        	   <strong>Oh Lo siento</strong> tus datos no se encontraron verificalos por favor .
	           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	           <span aria-hidden='true'>&times;</span>
	           </div>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Login</title>
</head>
<body>
	<div class="text-center">
		<img  src="img/vfast.jpg" alt="VFast" class="text-center" width="35%" height="30%" >
	</div>
	<div class="row justify-content-center h-100 ">
		<div class="col-sm-8 col-md-6 rounded">
			<div class="row">
				<div class="col-sm-10 col-md-12 col-lg-12">
					<!-- Comienso del form -->
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" class="needs-validation" novalidate method="post">
						<div class="input-group mb-3">
							<span class="input-group-text" id="perfil">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#person-circle"/>
                                 </svg>
								
							</span>
							<input type="text" name="Usuario" class ="form-control" placeholder ="Usuario" aria-label ="Username" aria-describedaby="Usuario" required>
							<div class="valid-feedback"> Aceptado</div>
							<div class="invalid-feedback"> Ingresa un nombre</div>

						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="perfil">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#envelope-fill"/>
                                 </svg>
								
							</span>
						
							<input type="gmail" name="Gmail" class ="form-control" placeholder ="name@example.com" aria-label ="Gmail" aria-describedaby="Gmail" required> 
							<div class="valid-feedback"> Gmail Valido</div>
							<div class="invalid-feedback"> Agrega tu Gmail</div>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="perfil">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#shield-lock-fill"/>
                                 </svg>
								
							</span>
							<input type="password" name="Password" class ="form-control" placeholder ="contraseña" aria-label ="Pass" aria-describedaby="Pass" required>
							<div class="valid-feedback"> Password Valido</div>
							<div class="invalid-feedback"> Ingresa tu Password</div>
							
						</div>
                        <div class="d-grid gap-2">
                        	<button class="btn btn-outline-danger btn-sm" name="inicio" type="submit" > Inicio </button>
                        </div>

					</form>
					<!-- Termino del form-->

				</div>
                <div class="col-2">
                     					<img src="Img/facebook.png" width="22" alt="22" class="img-logo">
                     				</div>
                     				<div class="col-10">
                     					<label for="">     Iniciar Sesion con Facebook</label>
                     				</div>
                     			</div>
                     		</button>

                     		<div class="col">
                     			<button class="btn btn-info w-100 my-1">
                     				<div class="row aling-items-center">
                     					<div class="col-2">
                     					<img src="Img/google.png" width="26" alt="26">
                     				</div>
                     				<div class="col-10 text-center">
                     					Iniciar Sesion con Google
                     				</div>
                     			</div>
                     			</button>
                     		</div>
           
			</div>
            <div class="container text-center">
            	<p class="text-muted py-2"><a href="#" class="link-danger">Terminos y Condiciones</a></p>
            	<p class="text-muted text-dark py-0">¿Aun no tienes cuenta?<a href="registro.php" class="link-danger"> Crear</a></p>
            	<p class="text-muted py-0">¿Olvidaste tu contraseña?<a href="recuperar.html" class="link-danger"> Recuperar</a></p>
            </div>

		</div>
		
        <?php echo $mensaje; ?>
	</div>
</body>
</html>