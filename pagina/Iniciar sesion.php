<?php


	$alert="";
	$alto='';
	session_start();
	if (!empty($_SESSION['active'])) {
		header('location: Iniciar sesion.php');
	}else{

	

		if (!empty($_POST)) {

			if (empty($_POST['email']) || empty($_POST['contrasena'])) {
			}else{
				require_once"../conexiones/conexion.php";

				$user=mysqli_real_escape_string($con,$_POST['email']);
				$pass=md5(mysqli_real_escape_string($con,$_POST['contrasena']));
				$query= mysqli_query($con,"SELECT * FROM usuario WHERE Correo='$user' AND Contrasena='$pass' ");
				$result= mysqli_num_rows($query);

				if ($result > 0) {
					$data=mysqli_fetch_array($query);
					
					$_SESSION['active']=true;
					$_SESSION['idUser']=$data['IdUsuario'];
					$_SESSION['nombre']=$data['NombreU'];
					$_SESSION['user']=$data['Correo'];
					$_SESSION['rol']=$data['Rol'];

					if ($_SESSION['rol']==1) {
						header('location: administrador/');
					} else if($_SESSION['rol']==2){
						header('location: usuario/');
					}

				}else{
					$alert='<p class="estilo_sesion">El usuario o la clave son incorrectos</p>';
					$alto='style="height: 585px;"';
					session_destroy();
				}
			}
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap1.min.css">
    <link rel="stylesheet" href="../floating-labels.css">
    <link rel="stylesheet" href="../css/estilosproyecto.css">
    <link rel="stylesheet" href="../css/m.css">

    <title>COLCHONES LEON</title>
</head>
<body class="foto-ini">
	<div class="fondo">
	  <div class="fondo_ini_sesion_3" <?php echo $alto; ?>>
	    <form class="form-signin" action="" method="post">
	      <div class="text-center mb-4">
	        <img class="mb-4" src="img/471a1ad342659289433e05a611d206f8.png" alt="" width="90" height="90">
	        <p class="texto_sesion">Ingrese sus datos para iniciar sesion</p>
	      </div>
	      <div class="form-label-group">
	        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	        <label for="inputEmail">Correo electronico</label>
	      </div>

	      <div class="form-label-group">
	        <input name="contrasena" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
	        <label for="inputPassword">Contraseña</label>
	      </div>

	      <div class="row">
	        <div class="boton_inicio_sesion">
	          <button class="boton3-ini" type="submit">Ingresar</button>
	        </div>
	      </div>
	      <div class="d-flex justify-content-center">
		      <?php 
		      	echo isset($alert)? $alert: '';
		      ?>
	  	  </div>
		  	 <hr>
		  	 <div class="d-flex justify-content-center">
		    	<a href="#" class="">Olvidaste la contraseña?</a>
		     </div>
			<hr>
			<div class="d-flex justify-content-center">
		    	<p>¿Nuevo en colchones leon? <a href="registrarse.php"> Registrate</a></p>
		     </div>
	    </form>
	  </div>
	</div>
</body>
</html>