<?php
session_start();
$servidor="localhost";
$usuario="root";
$password="";
$base="citas_tutorias";
$cone= new mysqli($servidor,$usuario,$password,$base);

if($cone->connect_error){
    die("ConexionExitosa".$cone->connect_error);
}

$sql= "SELECT nombre,apellidos from usuarios limit 1 ";
$result =$cone->query($sql);
if($result->num_rows > 0){
    while($row = $result->Fetch_assoc()){
        echo "<label id='aqui' for='btn-modal'>
        {$row['nombre']}{$row['apellidos']}
        </label>";
    }
}else{
    echo"<tr><td colspan='7'>No hay usuarios</td></tr>";
}
$cone->close();
?>