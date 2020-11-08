<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo1.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    
    <style type="text/css">
        #capa1{position: relative; z-index: 1;}
        body { background-color: #607e51; }
    </style>
    
    <title>Riegos De Guatemala</title>
</head>

<body>
	
    <header class="header" id="capa1">        
        <div class="container logo-nav-container">
            <a href="inicio.php" class="logo">
                    <img src="img/Arbol%20Prueba%204.png" alt="" class="img-fluid" style="max-width: 20%;">
                <h5 class="login-form-font-header">Riegos De<br><span style="color: #069908;">Guatemala</span><p>
                </h5>                
            </a>
                
            <nav class="navigation">
                <ul class="show">
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='inicio.php'">
				        Inicio
                        </button>
                    </li>
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='temperatura.php'">
				        Temperatura
                        </button>
                    </li>
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='humedad.php'">
				        Humedad
                        </button>
                    </li>
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='iluminacion.php'">
				        Iluminación
                        </button>
                    </li>
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='reporte.php'">
				        Reporte
                        </button>
                    </li>
                    <li><button class="btn btn-outline-success" 
				        type="button" onclick="location.href='index.html'">
				        Cerrar Sesión
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
	<?php
		$conn = mysqli_connect("localhost", "root", "", "sistema_riego");

		$sqlHumB = "SELECT hum As humB FROM humedadbase ORDER BY ID DESC LIMIT 1";
		$resultHumB = mysqli_query($conn, $sqlHumB);
		$filaHumB = mysqli_fetch_array($resultHumB);
		$humB = $filaHumB["humB"];

		$sqlHum = "SELECT humedad As hum FROM humedadsensor ORDER BY ID DESC LIMIT 1";
		$resultHum = mysqli_query($conn, $sqlHum);
		$filaHum = mysqli_fetch_array($resultHum);
		$hum = $filaHum["hum"];
	?>
    <main>
	<div class="container">
        <h1>Sensor De Humedad</h1>
            <h5>En la siguiente sección, podra registrar
                la humedad del Sensor, ver la humedad
                actual y hasta cuanto es la humedad máxima.
            </h5>
          
        <hr style="border-color:transparent;">
		<div class="row justify-content-between">
	        <div class="columna col-3">
	        	<form method="POST" action="">
					<div class="row form-group">
						<label class="col-form-label col-md-12" style="color:#c8d538";>
                           <b>Sensor De Humedad:</b>
                        </label>
						<div class="col-md-6">
							<input type="text" name="humN" placeholder="Hum." required class="form-control">
						</div>
					</div>
					<input type="submit" name="insertarHum" value="Insertar" class="btn btn-success">
				</form>
	        </div>
            
	        <?php
	        	if(isset($_POST['insertarHum'])) {
					$humInsert = $_POST['humN'];
					date_default_timezone_set('America/Guatemala');
					$fechaHum = date("Y-m-d");
					$hora = time();
					$horaHum = date("H:i:s", $hora);

					$sqlInsert = "INSERT INTO humedadsensor (humedad, fechaHum, horaHum) VALUES ('$humInsert', '$fechaHum', '$horaHum')";

					$resultInsert = mysqli_query($conn, $sqlInsert);

					if ($resultInsert) {
						echo "<script>alert('Humedad Insertada Correctamente')</script>";
						echo "<script>window.open('humedad.php', '_self')</script>";
					}
				}
	        ?>
	        <div>
		        <div class="row form-group">
						<label class="col-form-label col-md-12" align="center" style="color:#4db9ba">
                            <b>Humedad Actual:</b>
                        </label>
						<div class="col-md-12">
							<center>
								<label align="center" style="font-size: 25px;">
								<?php 
									echo $hum;
								?>
								U.
								</label>
							</center>
						</div>
					</div>
            </div>
	        <div class="columna col-3">
				<div class="row form-group">
					<label class="col-form-label col-md-12" align="center" style="color:#244ba3";>
                        <b>Humedad Limite:</b>
                    </label>
					<div class="col-md-12">
						<center>
							<label style="font-size: 25px;">
								<?php 
									echo $humB;
								?>
								U.
							</label>
						</center>
					</div>
				</div>
				<div align="center">
                <button type="submit" class="btn btn-success" onclick="location.href='humedadEdit.php'">
                    Editar
                </button>
                    </div>
	        </div>
	    </div>
	</div>
    </main>
    <hr style="border-color:transparent;">
    <hr style="border-color:transparent;">
    <div class="container" align="center">
    <footer class="container_fluid bg-dark text-white">
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <ul>
                            <h3>Acerca De La Empresa</h3>
                        </ul>
                        <ul>Somos una empresa nacional dedicada a la agricultura de todo tipo de plantaciones que benefician el comercio nacional e internacional.</ul>
                    </div>
                </div>
            </footer>
            <footer class="container_fluid bg-black text-white">
                <div class="row align-items-center">
                    <div class="col-11 col-md-11 col-lg-11">
                        <ul >
                            &copy; Derechos De Autor - Guatemala 2020 / Creado Por: <a href="inicio.php">Diego Solórzano & Ángel Oliva</a>
                        </ul>
                    </div>
                </div>
            </footer>    
    </div>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>     
</body>
</html>