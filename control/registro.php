<?php
// Include config file
require "../conexion.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$nombre = $correo = $escuela = $telefono = ""; 
$username_err = $password_err = $confirm_password_err = "";
$nombre_err = $correo_err = $escuela_err = $telefono_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "<center><font size='2' face='Georgia, Arial' color='red'>Por favor ingrese un usuario.</font></center>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM usuario WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "<center><font size='2' face='Georgia, Arial' color='red'>Este usuario ya fue tomado.</font></center>";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate nombre
    if(empty(trim($_POST["nombre"]))){
        $nombre_err = "<center><font size='2' face='Georgia, Arial' color='red'>Por favor ingresa tu nombre completo.</font></center>";
    }else{
        $nombre = trim($_POST["nombre"]);
    }
    // Validate correo
    if(empty(trim($_POST["correo"]))){
        $correo_err = "<center><font size='2' face='Georgia, Arial' color='red'>Por favor ingresa un corro electronico.</font></center>";
    }else{
        $correo = trim($_POST["correo"]);
    }
    // validate escuela
    if(empty(trim($_POST["escuela"]))){
        $escuela_err = "<center><font size='2' face='Georgia, Arial' color='red'>Por favor ingresa una escuela.</font></center>";
    }else{
        $escuela = trim($_POST["escuela"]);
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "<center><font size='2' face='Georgia, Arial' color='red'>Por favor ingresa una contraseña.</font></center>";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "<center><font size='2' face='Georgia, Arial' color='red'>La contraseña al menos debe tener 6 caracteres.</font></center>";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "<center><font size='2' face='Georgia, Arial' color='red'>Confirma tu contraseña.</font></center>";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "<center><font size='2' face='Georgia, Arial' color='red'>No coincide la contraseña.</font></center>";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO usuario (username, password, nombre, tipo, correo, escuela, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssisss", $param_username, $param_password, $param_nombre, $param_tipo, $param_correo, $param_escuela, $param_telefono);
            
            // Set parameters
            $param_username = $username;
            $param_nombre = $nombre;
            $param_tipo = 2;
            $param_correo = $correo;
            $param_escuela = $escuela;
            $param_telefono = $telefono;
            //$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash  
            $param_password = $password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../vistas/mensaje.html");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($mysqli);
}
?>