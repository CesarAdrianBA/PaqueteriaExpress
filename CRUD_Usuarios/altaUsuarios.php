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
			$id=$nombre=$apellidos=$edad=$cargo=$nivel=$usuario=$correo=$contrasenna="";
			
			$db = new Database();
            // consulta el id mayor y le suma 1 para mostrar el siguiente disponible
			$query = $db->connect()->prepare('select max(id) as maximo FROM usuarios');
			$query->execute();
			$row = $query->fetch();
			$numero=$row["maximo"];
			$numero++;
		?>
		
		<div class="container">
  		<div class="row">
    		<div class="col-4">
					<div class="list-group">
						<a href="menu.php" class="list-group-item list-group-item-action active" aria-current="true">
							Administración de Noticias
						</a>
						<a href="altaUsuarios.php" class="list-group-item list-group-item-action">Agregar Empleado</a>
						<a href="consultaUsuarios.php" class="list-group-item list-group-item-action">Consultar Empleado</a>
						<a href="cambioUsuarios.php" class="list-group-item list-group-item-action">Modificar Empleado</a>
						<a href="bajaUsuarios.php" class="list-group-item list-group-item-action">Eliminar Empleado</a>
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
							<label for="nombre" class="form-label">Nombre:</label>
								<input type="text" 
								class="form-control" 
								id="nombre"  
								value="<?php echo $nombre;?>" 
								name ="nombre" 
								placeholder="3 caracteres"/>
						</div>

						<div class="mb-3">
							<label for="apellidos" class="form-label">Apellidos</label>
								<input type="text" 
								class="form-control" 
								id="apellidos"  
								value="<?php echo $apellidos;?>" 
								name ="apellidos" 
								placeholder="apellidos">
						</div>

						<div class="mb-3">
							<label for="edad" class="form-label">edad</label>
								<input type="text" 
								class="form-control" 
								id="edad"  
								value="<?php echo $edad;?>" 
								name ="edad" 
								placeholder="edad">
						</div>

						<div class="mb-3">
							<label for="cargo" class="form-label">cargo</label>
								<input type="text" 
								class="form-control" 
								id="cargo"  
								value="<?php echo $cargo;?>" 
								name ="cargo" 
								placeholder="cargo">
						</div>

                        <div class="mb-3">
                            <label for="nivel" class="form-label">nivel:</label>
                            <select name="nivel" id="nivel" class="form-select">
								<option value="1">Administrador</option>
								<option value="2" selected>Usuario común</option>
                            </select>
                        </div>

						<div class="mb-3">
							<label for="usuario" class="form-label">usuario:</label>
								<input type="text" 
								class="form-control" 
								id="usuario"  
								value="<?php echo $usuario;?>" 
								name ="usuario" 
								placeholder="usuario"/>
						</div>

						<div class="mb-3">
							<label for="correo" class="form-label">correo:</label>
								<input type="email" 
								class="form-control" 
								id="correo"  
								value="<?php echo $correo;?>" 
								name ="correo" 
								placeholder="email@email.com"/>
						</div>

						<div class="mb-3">
							<label for="contrasenna" class="form-label">contraseña:</label>
								<input type="password" 
								class="form-control" 
								id="contrasenna"  
								value="<?php echo $contrasenna;?>" 
								name ="contrasenna" 
								placeholder=""/>
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
				$query = $db->connect()->prepare('SELECT id FROM usuarios WHERE id = :id');
				$query->execute(['id' => $id]);
				$row = $query->fetch(PDO::FETCH_NUM);
				if($query -> rowCount() <= 0){
					//echo 'entro al if del insert!!!';
					// $id=$_POST['id'];
					$nombre=$_POST['nombre'];
					$apellidos=$_POST['apellidos'];
					$edad=$_POST['edad'];
					$cargo =$_POST['cargo'];
					$nivel =$_POST['nivel'];
					$usuario =$_POST['usuario'];
					$correo =$_POST['correo'];
					$contrasenna =$_POST['contrasenna'];

					
					// Encriptar contraseña
					$hashed_password = password_hash($contrasenna,PASSWORD_DEFAULT, array("cost">=10));



					$insert="insert into usuarios(nombre, apellidos, edad, cargo, nivel, usuario, correo, contrasenna) values 
					(:nombre, :apellidos, :edad, :cargo, :nivel, :usuario, :correo, :contrasenna)";
					$insert = $db->connect()->prepare($insert);
					$insert->bindParam(':nombre',$nombre,PDO::PARAM_STR, 25);
					$insert->bindParam(':apellidos',$apellidos,PDO::PARAM_STR,25);
					$insert->bindParam(':edad',$edad,PDO::PARAM_STR,25);
					$insert->bindParam(':cargo',$cargo,PDO::PARAM_STR,25);
					$insert->bindParam(':nivel',$nivel,PDO::PARAM_STR,25);
					$insert->bindParam(':usuario',$usuario,PDO::PARAM_STR,25);
					$insert->bindParam(':correo',$correo,PDO::PARAM_STR,25);
					$insert->bindParam(':contrasenna',$hashed_password,PDO::PARAM_STR,25);
					$insert->execute();
					if (!$query){
						echo "Error:",$sql->errorInfo();
					}
					echo "<br> EL USUARIO FUE DADO	DE ALTA.";
					echo "<br><h2>Datos de entrada:</h2>";
					echo "<br>";
					echo "nombre: ".$_POST['nombre'];
					echo "<br>";
					echo "apellidos: ".$_POST['apellidos'];
					echo "<br>";
					echo "edad: ".$_POST['edad'];
					echo "<br>";
					echo "cargo: ".$_POST['cargo'];
					echo "<br>";
					echo "nivel: ".$_POST['nivel'];
					echo "<br>";
					echo "usuario: ".$_POST['usuario'];
					echo "<br>";
					echo "correo: ".$_POST['correo'];
					echo "<br>";
					
					}else if ($query -> rowCount() > 0){
						echo "<br> YA EXISTE UnN USUARIO CON ESE ID.";
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