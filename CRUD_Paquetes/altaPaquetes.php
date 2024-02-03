<!DOCTYPE html>

<html lang="es">
	<head>
		<title>Capturar datos en Revista</title>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	</head>
	<body>
		<?php 
			
			include('database.php');
			$id=$codigo=$peso=$estado="";
			
			$db = new Database();
            // consulta el id mayor y le suma 1 para mostrar el siguiente disponible
			$query = $db->connect()->prepare('select max(id) as maximo FROM paquetes');
			$query->execute();
			$row = $query->fetch();
			$numero=$row["maximo"];
			$numero++;

			// function test_entrada($data){
			// 	$data = trim($data);
			// 	$data = stripslashes($data);
			// 	$data = htmlspecialchars($data);
			// 	return $data;
			// }
			// if($_SERVER["REQUEST_METHOD"]=="POST"){
			// 	$clave = test_entrada($_POST["codigo"]);
			//   $titulo = test_entrada($_POST["peso"]);
			// 	$texto = test_entrada($_POST["estado"]);

            //     // validación de campos vacíos
			// 	$campos = array();

			// 	if($categoria==""){
			// 	array_push($campos, "Debes elegir una categoría para la noticia!!!");
			// 	}
				
			// 	if($titulo == ""){
			// 		array_push($campos, "El campo titulo no pude estar vacío");
			// 	}

			// 	if($clave == "" || strlen($clave) >= 4){
			// 		array_push($campos, "El campo clave no puede estar vacío, ni tener mas de 3 caracteres.");
			// 	}
				
			// 	if(count($campos) > 0){
			// 		echo "<div class='error'>";
			// 		for($i = 0; $i < count($campos); $i++){
			// 			echo "<li>".$campos[$i]."</i>";
			// 		}
			// 	}else{
			// 		echo "<div class='correcto'>
			// 				Datos correctos";
			// 	}
			// 	echo "</div>";
			// }
		?>
		
		<div class="container">
  		<div class="row">
    		<div class="col-4">
					<div class="list-group">
						<a href="menu.php" class="list-group-item list-group-item-action active" aria-current="true">
							Administración de Noticias
						</a>
						<a href="altaPaquetes.php" class="list-group-item list-group-item-action">Agregar paquete</a>
						<a href="consultaPaquetes.php" class="list-group-item list-group-item-action">Consultar paquete</a>
						<a href="cambioPaquetes.php" class="list-group-item list-group-item-action">Modificar paquete</a>
						<a href="bajaPaquetes.php" class="list-group-item list-group-item-action">Eliminar paquete</a>
						<a href="../cerrar.php" class="list-group-item list-group-item-action">Cerrar sesión</a>
					</div>
    		</div>
    		<div class="col-8">
					<form method="POST" 
						autocomplete="on"
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Número de registro:</label>
								<input type="text" class="form-control" id="id"  value="<?php echo $numero;?>" name ="id" disabled>
						</div>
						<div class="mb-3">
							<label for="codigo" class="form-label">Código de paquete:</label>
								<input type="text" 
								class="form-control" 
								id="codigo"  
								value="<?php echo $codigo;?>" 
								name ="codigo" 
								placeholder="3 caracteres"/>
						</div>

						<div class="mb-3">
							<label for="peso" class="form-label">Peso del paquete:</label>
								<input type="text" 
								class="form-control" 
								id="peso"  
								value="<?php echo $peso;?>" 
								name ="peso" 
								placeholder="Peso del paquete">
						</div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado del paquete:</label>
                            <select name="estado" id="estado" class="form-select">
                                <option value="preparación">Preparación</option>
                                <option value="enviado">Enviado</option>
                                <option value="entregado">Entregado</option>
                            </select>
                        </div>

						<div class="mb-3">
							<label for="fecha" class="form-label">Fecha de pedido:</label>
								<input type="date" 
								class="form-control" 
								id="fecha"  
								name ="fecha" 
								value="<?php echo date("Y-m-d");?>">
						</div> 
						</div><!--class="mb-3"-->
						
						<div class="mb-3">
							<button type="submit" class="btn btn-primary" name ="enviar">Enviar datos</button>
						</div>
					</form>	
    		</div><!--div class="col-8"-->
    		<div class="col">
    		</div><!--class="col"-->
  		</div><!--class="row"-->
	</div><!--class="container"-->
		<?php
			if (isset($_REQUEST['enviar'])){
				$query = $db->connect()->prepare('SELECT id FROM paquetes WHERE id = :id');
				$query->execute(['id' => $id]);
				$row = $query->fetch(PDO::FETCH_NUM);
				if($query -> rowCount() <= 0){
					//echo 'entro al if del insert!!!';
					// $id=$_POST['id'];
					$codigo=$_POST['codigo'];
					$peso=$_POST['peso'];
					$estado=$_POST['estado'];
					$fecha =$_POST['fecha'];
					$insert="insert into paquetes(codigo,peso,estado,fecha) values (:codigo,:peso,:estado,:fecha)";
					$insert = $db->connect()->prepare($insert);
					$insert->bindParam(':codigo',$codigo,PDO::PARAM_STR, 25);
					$insert->bindParam(':peso',$peso,PDO::PARAM_STR,25);
					$insert->bindParam(':estado',$estado,PDO::PARAM_STR,25);
					$insert->bindParam(':fecha',$fecha,PDO::PARAM_STR);
					$insert->execute();
					if (!$query){
						echo "Error:",$sql->errorInfo();
					}
					echo "<br> LA NOTICIA FUE DADA	DE ALTA.";
					echo "<br><h2>Datos de entrada:</h2>";
					echo "Clave: ".$_POST['codigo'];
					echo "<br>";
					echo "Título: ".$_POST['peso'];
					echo "<br>";
					echo "Tipo: ".$_REQUEST['estado'];
					echo "<br>";
					echo "Fecha: ".$_REQUEST['fecha'];
					echo "<br>";
					}else if ($query -> rowCount() > 0){
						echo "<br> YA EXISTE UNA NOTICIA CON ESA CLAVE.";
					}
					$query->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
					$query = null; // obligado para cerrar la conexión
					$db = null;
			}
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>