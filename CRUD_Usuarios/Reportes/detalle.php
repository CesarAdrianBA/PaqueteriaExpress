<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consulta de Noticias.</title>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/boton.css" media="print">
	</head>
	<body>
		<?php
			//include('index.php');
			include('../database.php');
		?>	
		<div class="container">
			<div class="row">
    		</div>
				<div class="col-8">
					<?php
					$db = new Database();
				$query = $db->connect()->prepare('select * FROM usuarios');
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$query->execute();
				//$row = $query->fetch();
				if($query -> rowCount() > 0){
					print ("<br/><hr/>");
					print ("<h3>Listado de noticias registradas</h3>");
					print ("<hr/><br/>");
					print ("<table class='table table-striped'>\n");
					print ("<tr>\n");
					print ("<thead>\n");
						print ("<th>Id</th>\n");
						print ("<th>nombre</th>\n");
						print ("<th>apellidos</th>\n");
						print ("<th>edad</th>\n");
						print ("<th>cargo</th>\n");
						print ("<th>nivel</th>\n");
						print ("<th>usuario</th>\n");
						print ("<th>correo</th>\n");
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
				}
				else
					print ("No hay registros disponibles");
			//mysqli_close($conexion);
		?>
			<!--// en la clase btn btn-primary boton, btn-primary es estilo de bootstrap y boton
				es una clase de estilo que está en un archivo llamado boton.css-->
      <div class="container">
        <a href="../main.php" class="btn btn-success boton">Regresar</a>
        <a href="" class="btn btn-primary boton" onclick="window.print()">Imprimir</a>
				<a href="generarExcel.php" class="btn btn-warning boton" onclick="">Generar Excel</a>
      </div>
				</div><!--class="col-8"-->
			</div><!--class="row"-->
		</div><!--class="container"-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>