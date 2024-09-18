<?php
    $servidor="localhost";
    $usuario="root";
    $password="";
    $base="citas_tutorias";
    $cone= new mysqli($servidor,$usuario,$password,$base);

    if($cone->connect_error){
        die("ConexionExitosa".$cone->connect_error);
    }
    $username=$_POST['Usuario'];
    $contra= $_POST['contrasena'];
    
    $sql="SELECT * FROM usuarios 
    WHERE usuario= '$username' AND contrasena='$contra'";
    $result=$cone->query($sql);

    if ($result->num_rows > 0) {
        $username = $result->fetch_assoc();
        session_start();
        // Verificar el rol del usuario
        if ($username['rol'] ==0) {
            // Redirigir a la página de estudiantes
            header('Location: ../vistaalumno.php');
        } elseif ($username['rol'] ==2) {
            // Redirigir a la página de maestros
            session_start();
            header('Location: ../vistaprofesor.php');
        } elseif ($username['rol'] ==1) {
            // Redirigir a la página de maestros
            session_start();
            header('Location: ../vistaalumno.php');
        }
    } else {
        // Credenciales incorrectas
        echo "Credenciales incorrectas";
    }
    $cone->close();

?>