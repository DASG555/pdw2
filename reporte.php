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
    
    <main>
	<div class="container">
        <h1>REPORTE</h1>
            <h5>En esta página, usted podrá ver un reporte detallado de todos los datos de los dispositivos en el sistema, registros de fecha y hora y sus estados.
            </h5>
		<div class="my-4">
			<h2>Temperatura</h2>
			<table class="table table-striped table-borderd table-condensed">
				<thead class="text-center">
					<tr style="background-color: #398428;">
						<th>NO.</th>
						<th>TEMPERATURA</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						$conn = mysqli_connect("localhost", "root", "", "sistema_riego");
						$sqlTemp = "SELECT * FROM temperaturasensor";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$iT = 0;

						while($filaTemp = mysqli_fetch_array($resultTemp)) {

							$idTemp = $filaTemp['id'];
							$temperatura = $filaTemp['temperatura'];
							$fechaTemp = $filaTemp['fechaTemp'];
							$horaTemp = $filaTemp['horaTemp'];

							$iT++;	
					?>
					<tr class="text-center">
						<td><?php echo $idTemp; ?></td>
						<td><?php echo $temperatura; ?>&#176 C</td>
						<td><?php echo $fechaTemp; ?></td>
						<td><?php echo $horaTemp; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="my-4">
			<h2>Humedad</h2>
			<table class="table table-striped table-borderd table-condensed">
				<thead class="text-center">
					<tr style="background-color: #385830;">
						<th>NO.</th>
						<th>HUMEDAD</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sqlHum = "SELECT * FROM humedadsensor";
						$resultHum = mysqli_query($conn, $sqlHum);
						$iH = 0;

						while($filaHum = mysqli_fetch_array($resultHum)) {

							$idHum = $filaHum['id'];
							$humedad = $filaHum['humedad'];
							$fechaHum = $filaHum['fechaHum'];
							$horaHum = $filaHum['horaHum'];

							$iH++;	
					?>
					<tr class="text-center">
						<td><?php echo $idHum; ?></td>
						<td><?php echo $humedad; ?> U.</td>
						<td><?php echo $fechaHum; ?></td>
						<td><?php echo $horaHum; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="my-4">
			<h2>Iluminación</h2>
			<table class="table table-striped table-borderd table-condensed">
				<thead class="text-center">
					<tr style="background-color: #398428;">
						<th>NO.</th>
						<th>ILUMINACIÓN</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sqlIlum = "SELECT * FROM iluminacionsensor";
						$resultIlum = mysqli_query($conn, $sqlIlum);
						$iI = 0;

						while($filaIlum = mysqli_fetch_array($resultIlum)) {

							$idIlum = $filaIlum['id'];
							$iluminacion = $filaIlum['iluminacion'];
							$fechaIlum = $filaIlum['fechaIlum'];
							$horaIlum = $filaIlum['horaIlum'];

							$iI++;	
					?>
					<tr class="text-center">
						<td><?php echo $idIlum; ?></td>
						<td><?php echo $iluminacion; ?> Lumens.</td>
						<td><?php echo $fechaIlum; ?></td>
						<td><?php echo $horaIlum; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="my-4">
			<h2>Válvulas</h2>
			<table class="table table-striped table-borderd table-condensed">
				<thead class="text-center">
					<tr style="background-color: #385830;">
						<th>NO.</th>
						<th>ESTADO</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sqlV = "SELECT * FROM estadovalvula";
						$resultV = mysqli_query($conn, $sqlV);
						$iV = 0;
						$apagadoV = "Apagadas";
						$encendidoV = "Encendidas";

						while($filaV = mysqli_fetch_array($resultV)) {

							$idV = $filaV['id'];
							$estadoV = $filaV['estadoValvula'];
							$fechaV= $filaV['fechaValvula'];
							$horaV = $filaV['horaValvula'];

							$iV++;	
					?>
					<tr class="text-center">
						<td><?php echo $idV; ?></td>
						<td>
							<?php 
								if ($estadoV == 0) {
								 	echo $apagadoV;
								 } else if ($estadoV == 1) {
								 	echo $encendidoV;
								 }
							?>
						</td>
						<td><?php echo $fechaV; ?></td>
						<td><?php echo $horaV; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="my-4">
			<h2>Luces</h2>
			<table class="table table-striped table-borderd table-condensed">
				<thead class="text-center">
					<tr style="background-color: #398428;">
						<th>NO.</th>
						<th>ESTADO</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sqlL = "SELECT * FROM estadoluces";
						$resultL = mysqli_query($conn, $sqlL);
						$iL = 0;
						$apagadoL = "Apagadas";
						$encendidoL = "Encendidas";

						while($filaL = mysqli_fetch_array($resultL)) {

							$idL = $filaL['id'];
							$estadoL = $filaL['estadoLuces'];
							$fechaL= $filaL['fechaLuces'];
							$horaL = $filaL['horaLuces'];

							$iL++;	
					?>
					<tr class="text-center">
						<td><?php echo $idL; ?></td>
						<td>
							<?php 
								if ($estadoL == 0) {
								 	echo $apagadoL;
								 } else if ($estadoL == 1) {
								 	echo $encendidoL;
								 }
							?>
						</td>
						<td><?php echo $fechaL; ?></td>
						<td><?php echo $horaL; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
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