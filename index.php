<?php


	$alert="";
	$alto='';
	session_start();
	if (!empty($_SESSION['active'])) {
		header('location: administrador/');
	}else{

	

		if (!empty($_POST)) {

			if (empty($_POST['email']) || empty($_POST['contrasena'])) {
				$alert="ingrese su usuario y contraseña";
			}else{
				require_once"conexiones/conexion.php";

				$user=mysqli_real_escape_string($con,$_POST['email']);
				$pass=md5(mysqli_real_escape_string($con,$_POST['contrasena']));
				$query= mysqli_query($con,"SELECT * FROM persona WHERE Usuario='$user' AND Contrasena='$pass' AND Estado='Activo'");
				$result= mysqli_num_rows($query);

				if ($result > 0) {
					$data=mysqli_fetch_array($query);
					
					$_SESSION['active']=true;
					$_SESSION['idUser']=$data['IdPersona'];
					$_SESSION['nombre']=$data['NombreP'];
					$_SESSION['user']=$data['Usuario'];
					$_SESSION['rol']=$data['IdCargo'];

					if ($_SESSION['rol']==4) {
						header('location: administrador/ventas/select_adm_ven.php');
					} else if($_SESSION['rol']==1 || $_SESSION['rol']==2){
						header('location: administrador/');
					}

				}else{
					$alert='<p class="estilo_sesion">El usuario o la clave son incorrectos</p>';
					$alto='style="height: 445px;"';
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

    <link rel="stylesheet" href="css/bootstrap1.min.css">
    <link rel="stylesheet" href="floating-labels.css">
    <link rel="stylesheet" href="css/m.css">

    <title>COLCHONES LEON</title>
</head>
<body>
  <div class="fondo_ini_sesion_2" <?php echo $alto; ?>>
    <form class="form-signin" action="index.php" method="post">
      <div class="text-center mb-4">
        <img class="mb-4" src="img/user.png" alt="" width="90" height="90">
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
    </form>
  </div>
</body>
</html>