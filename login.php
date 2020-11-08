<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilo1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body { background-color: #525651; }
    </style>
</head>
<body>
	<div class="container">
        <div class="row text-center login-page">
		   <div class="col-md-12 login-form">
		      <form action="" method="post"> 			
			    <div class="row">
					<div class="col-md-12 login-form-header">
					   <img src="img/Arbol%20Prueba%204.png" alt="" class="img-fluid" style="max-width: 50%;">
                        <p class="login-form-font-header">Riegos De<br><span style="color: #069908;">Guatemala</span><p>
					</div>
				</div>
				<div class="row">
				   <div class="col-md-12 login-from-row">
				      <input name="usuario" type="text" placeholder="Usuario" required/>
				   </div>
				</div>
				<div class="row">
				   <div class="col-md-12 login-from-row">
				      <input name="password" type="password" placeholder="Contraseña" required/>
				   </div>
				</div>
				<div class="row">
				   <div class="col-md-12 login-from-row">
				      <input type="submit" name="entrar" class="btn btn-success" value="Entrar">
				   </div>
				</div>
		    </form>
		    <?php
		    	if (isset($_POST['entrar'])) {
		    		$usuario = $_POST['usuario'];
			    	$pass = $_POST['password'];
			    	$conn = mysqli_connect("localhost", "root", "", "sistema_riego");
					$sql = "SELECT * FROM login WHERE usuario ='$usuario' AND password ='$pass'";
					$result = mysqli_query($conn, $sql);

					if ($result->num_rows > 0) {
							echo "<script>alert('Sesión Iniciada')</script>";
							echo "<script>window.open('inicio.php', '_self')</script>";
					} else if($result->num_rows <= 0){
						echo "<script>alert('Usuario Incorrecto')</script>";
					}
		    	}
		    ?>
		</div>
     </div>
  </div>
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>