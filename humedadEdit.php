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
    
    <title>Editar Humedad</title>
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
    
	<div class="container">
		<div class="row justify-content-center pt-5 mt-5">
	        <div class="columna col-3">
	        	<form method="POST" action="">
					<div class="row form-group">
						<h3>EDITAR HUMEDAD</h3>
						<hr class="bg-info">
						<p class="pb-0 mb-0">La Medida Representada con U.</p>
						<p class="text-danger small pt-0 mt-0">*Solo debe de ingresar el número.
						<div class="col-md-6">
							<input type="text" name="humN" placeholder="Hum." required class="form-control">
						</div>
						<input type="submit" name="editarHum" value="Editar" class="btn btn-success">
					</div>
				</form>
	        </div>
	        <?php 
	        	$conn = mysqli_connect("localhost", "root", "", "sistema_riego");
				if (isset($_POST['editarHum'])) {
					$editarHum = $_POST['humN'];
					$editarId = 1;

					$editar_sql = "UPDATE humedadbase SET hum='$editarHum' WHERE id= '$editarId'";

					$ejecutar = mysqli_query($conn, $editar_sql);

					if ($ejecutar) {
						echo "<script>alert('Humedad Editada')</script>";
						echo "<script>window.open('humedad.php', '_self')</script>";
					}
				}
			?>
		</div>
	</div>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>    
</body>
</html>