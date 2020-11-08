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

		$sqlTempB = "SELECT temp As tempB FROM temperaturabase ORDER BY ID DESC LIMIT 1";
		$resultTempB = mysqli_query($conn, $sqlTempB);
		$filaTempB = mysqli_fetch_array($resultTempB);
		$tempB = $filaTempB["tempB"];
		$sqlHumB = "SELECT hum As humB FROM humedadbase ORDER BY ID DESC LIMIT 1";
		$resultHumB = mysqli_query($conn, $sqlHumB);
		$filaHumB = mysqli_fetch_array($resultHumB);
		$humB = $filaHumB["humB"];
		$sqlIlumB = "SELECT ilum AS ilumB FROM iluminacionbase ORDER BY ID DESC LIMIT 1";
		$resultIlumB = mysqli_query($conn, $sqlIlumB);
		$filaIlumB = mysqli_fetch_array($resultIlumB);
		$ilumB = $filaIlumB["ilumB"];

		$sqlTemp = "SELECT temperatura As temp FROM temperaturasensor ORDER BY ID DESC LIMIT 1";
		$resultTemp = mysqli_query($conn, $sqlTemp);
		$filaTemp = mysqli_fetch_array($resultTemp);
		$temp = $filaTemp["temp"];
		$sqlHum = "SELECT humedad As hum FROM humedadsensor ORDER BY ID DESC LIMIT 1";
		$resultHum = mysqli_query($conn, $sqlHum);
		$filaHum = mysqli_fetch_array($resultHum);
		$hum = $filaHum["hum"];
		$sqlIlum = "SELECT iluminacion AS ilum FROM iluminacionsensor ORDER BY ID DESC LIMIT 1";
		$resultIlum = mysqli_query($conn, $sqlIlum);
		$filaIlum = mysqli_fetch_array($resultIlum);
		$ilum = $filaIlum["ilum"];

		$sqlVal = "SELECT estadoValvula As val FROM estadovalvula ORDER BY ID DESC LIMIT 1";
		$resultVal = mysqli_query($conn, $sqlVal);
		$filaVal = mysqli_fetch_array($resultVal);
		$val = $filaVal["val"];
		$sqlLuz = "SELECT estadoLuces As luz FROM estadoluces ORDER BY ID DESC LIMIT 1";
		$resultLuz = mysqli_query($conn, $sqlLuz);
		$filaLuz = mysqli_fetch_array($resultLuz);
		$luz = $filaLuz["luz"];

		if($temp > $tempB and $hum > $humB and $val == 0){
			date_default_timezone_set('America/Guatemala');
			$estadoV = 1;
			$fechaV = date("Y-m-d");
			$hora = time();
			$horaV = date("H:i:s", $hora);

			$sqlV = "INSERT INTO estadovalvula (estadoValvula, fechaValvula, horaValvula) VALUES ('$estadoV', '$fechaV', '$horaV')";

			$resultV = mysqli_query($conn, $sqlV);
		} else if($temp < $tempB and $hum < $humB and $val == 1){
			date_default_timezone_set('America/Guatemala');
			$estadoV = 0;
			$fechaV = date("Y-m-d");
			$hora = time();
			$horaV = date("H:i:s", $hora);

			$sqlV = "INSERT INTO estadovalvula (estadoValvula, fechaValvula, horaValvula) VALUES ('$estadoV', '$fechaV', '$horaV')";

			$resultV = mysqli_query($conn, $sqlV);
		}

		if($ilum < $ilumB and $luz == 0){
			date_default_timezone_set('America/Guatemala');
			$estadoL = 1;
			$fechaL = date("Y-m-d");
			$hora = time();
			$horaL = date("H:i:s", $hora);

			$sqlL = "INSERT INTO estadoluces (estadoLuces, fechaLuces, horaLuces) VALUES ('$estadoL', '$fechaL', '$horaL')";

			$resultL = mysqli_query($conn, $sqlL);
		} else if($ilum > $ilumB and $luz == 1){
			date_default_timezone_set('America/Guatemala');
			$estadoL = 0;
			$fechaL = date("Y-m-d");
			$hora = time();
			$horaL = date("H:i:s", $hora);

			$sqlL = "INSERT INTO estadoluces (estadoLuces, fechaLuces, horaLuces) VALUES ('$estadoL', '$fechaL', '$horaL')";

			$resultL = mysqli_query($conn, $sqlL);
		}
	?>
    
    <main>
        <div class="container">
            <h1>Información General</h1>
            <h5>Información De Los Sensores</h5>
            
            <ul class="list-group">
				<li class="list-group-item list-group-item-danger col-md-4">Temperatura: <?php echo $temp ?>&#176 C</li>
				<li class="list-group-item list-group-item-warning col-md-4">Humedad: <?php echo $hum ?> U.</li>
				<li class="list-group-item list-group-item-info col-md-4">Iluminación: <?php echo $ilum ?> Lumens</li>
			</ul>
            <hr style="border-color:transparent;">
            <h5>Información De Las Válvulas</h5>
            <ul class="list-group">
				<li class="list-group-item list-group-item-dark col-md-4">Estado de Válvulas</li>
				<li class="list-group-item list-group-item-light col-md-4">
					<?php
						if($val == 0) {
							echo "Apagadas";
						}else if($val == 1) {
							echo "Encendidas";
						}
					?>
				</li>
				<?php
					if($val == 0){
						$sqlValH = "SELECT horaValvula FROM estadovalvula ORDER BY ID DESC LIMIT 1";
						$resultValH = mysqli_query($conn, $sqlValH);
						$filaValH = mysqli_fetch_array($resultValH);
						$valH = $filaValH[0];

						$sqlValH2 = "SELECT horaValvula FROM estadovalvula ORDER BY ID DESC LIMIT 1, 1";
						$resultValH2 = mysqli_query($conn, $sqlValH2);
						$filaValH2 = mysqli_fetch_array($resultValH2);
						$valH2 = $filaValH2[0];

						$horaInicioV = new DateTime($valH2);
						$horaFinalV = new DateTime($valH);

						$intervalV = $horaInicioV->diff($horaFinalV);

						$tiempoV = $intervalV->format('Duración: %H Horas %i Minutos %s Segundos');

						echo "<li class='list-group-item list-group-item-danger col-md-4'>$tiempoV</li>";
					}
				?>
                <hr style="border-color:transparent;">
                <h5>Información De Las Luces</h5>
				<li class="list-group-item list-group-item-dark col-md-4">Estado de Luces</li>
				<li class="list-group-item list-group-item-light col-md-4">
					<?php
						if($luz == 0) {
							echo "Apagadas";
						}else if($luz == 1) {
							echo "Encendidas";
						}
					?>
				</li>
				<?php
					if($luz == 0){
						$sqlLuzH = "SELECT horaLuces FROM estadoluces ORDER BY ID DESC LIMIT 1";
						$resultLuzH = mysqli_query($conn, $sqlLuzH);
						$filaLuzH = mysqli_fetch_array($resultLuzH);
						$luzH = $filaLuzH[0];

						$sqlLuzH2 = "SELECT horaLuces FROM estadoluces ORDER BY ID DESC LIMIT 1, 1";
						$resultLuzH2 = mysqli_query($conn, $sqlLuzH2);
						$filaLuzH2 = mysqli_fetch_array($resultLuzH2);
						$luzH2 = $filaLuzH2[0];

						$horaInicioL = new DateTime($luzH2);
						$horaFinalL = new DateTime($luzH);

						$intervalL = $horaInicioL->diff($horaFinalL);

						$tiempoL = $intervalL->format('Duración: %H Horas %i Minutos %s Segundos');
						echo "<li class='list-group-item list-group-item-danger col-md-4'>$tiempoL</li>";
					}
				?>
			</ul>


        </div>

    </main>
    <hr style="border-color:transparent;">
    <div class="container" align="center">
    <footer class="container_fluid bg-dark text-white">
                <div class="row align-items-center">
                    <div class="col-11 col-md-11 col-lg-11">
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
    
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/javaS1.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
</body>

</html>