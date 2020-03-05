<?php

// Iniciar la sesion y la conexion a base de datos
require_once 'includes/conexion.php';

// Recoger datos del formulario
if(isset($_POST)){

    // Borrar error antiguo
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    // Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $login = mysqli_query($db, $sql);
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        var_dump($usuario);
        // die();
        // Comprobar la contraseña / Cifrar 
        $verify = password_verify($password, $usuario['password']);

        if($verify){
            // Utilizar una sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;      
            
        }else{
            // Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = 'Login incorrecot!!';
        }
    }else{
        // mensaje de error
        $_SESSION['error_login'] = 'Login incorrecto!!';
    }

}

// Redirigir al index.php
header("Location: index.php");

?>