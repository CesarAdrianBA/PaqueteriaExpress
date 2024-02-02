<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Verificar si la sesión ha expirado
    if (time() > $_SESSION['expire_time']) {
        session_unset(); // Eliminar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: login.php'); // Redirigir al usuario al inicio de sesión
        exit;
    }
} else {
    // El usuario no está autenticado, no hay necesidad de redirección aquí
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_REQUEST['Login'])){

        // Validar las credenciales (aquí debes agregar tu propia lógica de validación)
        $email = $_POST['form__inputLogin-email'];
        $password = $_POST['form__inputLogin-password'];
        echo $email;

        $mysqli = new mysqli("localhost", "root", "", "paqueteria");

        if ($mysqli->connect_error) {
            die("Conexión fallida: " . $mysqli->connect_error);
        }

            

        // Utilizar sentencias preparadas para evitar inyecciones SQL
        $query = "SELECT id, nombre, apellidos, edad, cargo, nivel, usuario, correo, contrasenna FROM usuarios WHERE correo = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {

            $stmt->bind_result($id, $nombre, $apellidos, $edad, $cargo, $nivel, $usuario, $correo, $hashed_password);
            $stmt->fetch();
            

            // Verificar la contraseña utilizando password_verify
            if (password_verify($password, $hashed_password)) {
                // Iniciar sesión y redirigir a la página de bienvenida
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $usuario;
                $_SESSION['id'] = $id;
                $_SESSION['rol'] = $nivel;
                $_SESSION['expire_time'] = time() + 60*5; // Establecer un tiempo de expiración de sesión en segundos (5 minutos)
            
                
                // Comprobar el nivel del usuario
                switch ($_SESSION['rol']) {
                    case 1:
                        header('Location: ./CRUD_Paquetes/main.php');
                        break;
                    case 2:
                        // header('Location: ./CRUD/main.php');
                        header('Location: ./mostrar.php' );
                        break;
                    
                    default:
                        
                        break;
                }

                exit;
            } else {
                $error_message = 'Credenciales incorrectas. Inténtalo de nuevo.';
            }
        } else {
            $error_message = 'Credenciales incorrectas. Inténtalo de nuevo.';
        }
        $stmt->close();
        $mysqli->close();   
    }
    

    if (isset($_POST['Registrar'])) {
        $nombre = $_POST['form__inputRegistro-nombre'];
        $apellidos = $_POST['form__inputRegistro-apellidos'];
        $edad = $_POST['form__inputRegistro-edad'];
        $cargo = $_POST['form__inputRegistro-cargo'];
        $nivel = $_POST['form__inputRegistro-nivel'];
        $usuario = $_POST['form__inputRegistro-usuario'];
        $correo = $_POST['form__inputRegistro-email'];
        $contrasena = $_POST['form__inputRegistro-contrasena'];
        $confirmaContrasena = $_POST['form__inputRegistro-confirmarContrasena'];

        if ($contrasena === $confirmaContrasena) {
            
            // Encriptar contraseña
            $hashed_password = password_hash($contrasena,PASSWORD_DEFAULT, array("cost">=10));

            // Conexión a la base de datos (ajusta los valores según tu configuración)
            $mysqli = new mysqli("localhost", "root", "", "paqueteria");

        
            // Verificar la conexión
            if ($mysqli->connect_error) {
                die("Conexión fallida: " . $mysqli->connect_error);
            }
        
            // Sentencia SQL preparada con marcadores de posición (?)
            $insert = 'INSERT INTO usuarios (nombre, apellidos, edad, cargo, nivel, usuario, correo, contrasenna) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            
            // Preparar la sentencia
            $stmt = $mysqli->prepare($insert);
        
            // Verificar si la preparación fue exitosa
            if ($stmt) {
                // Vincular parámetros
                $stmt->bind_param('ssssssss', $nombre, $apellidos, $edad, $cargo, $nivel, $usuario, $correo, $hashed_password);
        
                // Ejecutar la sentencia
                if ($stmt->execute()) {
                    echo '<script language="javascript">alert("Registro agregado");</script>';
                } else {
                    echo '<script language="javascript">alert("Error al ejecutar la sentencia: " . $stmt->error);</script>';
                }
        
                // Cerrar la sentencia
                $stmt->close();
            } else {
                echo 'Error al preparar la sentencia: ' . $mysqli->error;
            }
        
            // Cerrar la conexión
            $mysqli->close();


        }else {
            $error_message = 'Error confirmar contrasaeña';
        }
        
    }

}
?>
