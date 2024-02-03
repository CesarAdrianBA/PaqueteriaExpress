<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consulta de usuarios.</title>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	</head>
	<body>
		<?php
			//include('index.php');
			include('database.php');
			$id="";
		?>	
		<div class="container">
			<div class="row">
			<div class="col-4">
				<div class="list-group">
					<a href="menu.php" class="list-group-item list-group-item-action active" aria-current="true">
					Administración de usuarios
					</a>
					<a href="altaUsuarios.php" class="list-group-item list-group-item-action">Agregar Empleado</a>
					<a href="consultaUsuarios.php" class="list-group-item list-group-item-action">Consultar Empleado</a>
					<a href="cambioUsuarios.php" class="list-group-item list-group-item-action">Modificar Empleado</a>
					<a href="bajaUsuarios.php" class="list-group-item list-group-item-action">Eliminar Empleado</a>
					<a href="../cerrar.php" class="list-group-item list-group-item-action">Cerrar sesión</a>
				</div>
    		</div>
				<div class="col-8">
					
				<form method="post" 
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
						
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">id de usuarios</label>
							<input type="text" class="form-control" id="id" name ="id" value="<?php echo $id;?>"/>
						</div>
						<div class="mb-3">
							<input type="submit" class="btn btn-primary" name="buscar" value="Consultar una Usuarios">
						</div>

						<div class="mb-3">
							<input type="submit" class="btn btn-primary" name="todo" value="Mostrar todas las Usuarios">
						</div>
					</form>
					<?php
					$db = new Database();
			if (isset($_REQUEST['buscar'])){
				//echo "Si entro a buscar una id!!!";
				$id=isset($_REQUEST['id']) ? $_REQUEST['id'] :  null;

				$query = $db->connect()->prepare('select * FROM usuarios where id = :id');
								$query->setFetchMode(PDO::FETCH_ASSOC);
								$query->execute(['id' => $id]);
								$row = $query->fetch();
								if($query -> rowCount() <= 0){
									echo "<br /><br /><h2>No existe ese número de id.</h2>";
								}elseif ($query -> rowCount() > 0){
									print ("<br/><br/><br/>");
									print ("Datos del registro.");
									print ("<br/><br/><hr/><br/>");
									print ("<table class='table table-striped'>\n");
										print ("<tr>\n");
											print ("<th>Id</th>\n");
											print ("<td>".$row['id']. "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Nombre</th>\n");
											print ("<td>" . $row['nombre'] . "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Apellidos</th>\n");
											print ("<td>" . $row['apellidos'] . "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
										print ("<th>Edad</th>\n");
											print ("<td>" . $row['edad'] . "</td>\n");
											print ("</tr>\n");
										print ("<tr>\n");
										print ("<tr>\n");
										print ("<th>cargo</th>\n");
											print ("<td>" . $row['cargo'] . "</td>\n");
											print ("</tr>\n");
										print ("<tr>\n");
										print ("<tr>\n");
										print ("<th>nivel</th>\n");
											print ("<td>" . $row['nivel'] . "</td>\n");
											print ("</tr>\n");
										print ("<tr>\n");
										print ("<tr>\n");
										print ("<th>usuario</th>\n");
											print ("<td>" . $row['usuario'] . "</td>\n");
											print ("</tr>\n");
										print ("<tr>\n");
										print ("<tr>\n");
										print ("<th>correo</th>\n");
											print ("<td>" . $row['correo'] . "</td>\n");
											print ("</tr>\n");
										print ("<tr>\n");


									print ("</table>\n");
									print ("<br /><hr />");
				} 
			}
			if (isset($_REQUEST['todo'])){

				$query = $db->connect()->prepare('select * FROM usuarios order by id desc');
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$query->execute();
				//$row = $query->fetch();
				if($query -> rowCount() > 0){
					print ("<br/><br/><br/>");
					print ("Listado de usuarios registrados.");
					print ("<br/><br/><hr/><br/>");
					print ("<table class='table table-striped'>\n");
					print ("<tr>\n");
					print ("<thead>\n");
						print ("<th>Id</th>\n");
						print ("<th>Nombre</th>\n");
						print ("<th>Apellidos</th>\n");
						print ("<th>Edad</th>\n");
						print ("<th>Cargo</th>\n");
						print ("<th>Nivel</th>\n");
						print ("<th>Usuario</th>\n");
						print ("<th>Correo</th>\n");
						print ("</th>\n");
					print ("</thead>\n");
					while ($row = $query->fetch()){
						print ("<tr>\n");
						print ("<td>" . $row['id'] . "</td>\n");
						print ("<td>" . $row['nombre'] . "</td>\n");
						print ("<td>" . $row['apellidos'] . "</td>\n");
						print ("<td>" . $row['edad'] . "</td>\n");
						print ("<td>" . $row['cargo'] . "</td>\n");
						print ("<td>" . $row['nivel'] . "</td>\n");
						print ("<td>" . $row['usuario'] . "</td>\n");
						print ("<td>" . $row['correo'] . "</td>\n");
						print ("</tr>\n");
					}
					print ("</table>\n");

					print("<a href='Reportes/detalle.php' class='btn btn-succes'> ver detalle con cabeceras de php</a>");
					print("</form>");
				}
				else
					print ("No hay registros disponibles");
			}
			//mysqli_close($conexion);
		?>
				</div><!--class="col-8"-->
			</div><!--class="row"-->
		</div><!--class="container"-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>
