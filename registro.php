<?php

if(isset($_POST)){
    // Conexion a la base de datos
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        // Iniciar sesión
        session_start();
    }
    
    // Recoger los valores del formulario del registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    /*
    Operador ternario:
    en caso de que exista POST apellidos guardo lo que tenga POST en la variable apellidos
    y en caso de que no exista guardo false en la variable apellidos


    mysqli_real_escape_string es una funcion que hace que todo sea string . Y no haga fallos al poner una comillas
    la funcion trim es para que se guarde sin espacios 
    */
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array de errores
    $errores = array();

    // Validar los datos antes de guardarlos en la base de datos
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] =  'El nombre no es válido';
    }

    // Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] =  'Los apellidos no son válidos';
    }

    // Validar el email
    if(!empty($email)  && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] =  'El email no es válido';
    }

    // Validar la contraseña
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] =  'La contraseña está vacía';
    }

    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        // Cifrar la contraseña
        // el cost es para que lo cifre 4 veces
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);


        // INSERTAR USUARIO EN LA BASE DE DATOS EN LA TABLA USUARIOS DE LA BBDD

        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";

        $guardar = mysqli_query($db, $sql);


    //    var_dump(mysqli_error($db)) ;
    //    die();
        
        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con éxito";
        }else{

            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
?>