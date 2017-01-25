<?php
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 25/01/2017
 * Time: 8:33
 */
require_once "../../../core/db/class.conexion.php";

$UsuarioID = "";
$Nombre = "";
$Email = "";
$Password = "";
$FechaRegistro = "";

if(isset($_POST['table_field_UsuarioID'])) {
    $UsuarioID = $_POST['table_field_UsuarioID'];
}

if(isset($_POST['table_field_Nombre'])) {
    $Nombre = $_POST['table_field_Nombre'];
}

if(isset($_POST['table_field_Email'])) {
    $Email = $_POST['table_field_Email'];
}

if(isset($_POST['table_field_Password'])) {
    $Password = md5($_POST['table_field_Password']);
}


$db = new Conexion();

$result = $db->query("update  tbl_usuarios set Nombre='$Nombre',
                                               Password='$Password', 
                                                Email= '$Email' where UsuarioID= '$UsuarioID'") ;


$mensaje = "No pudo Editar.";
$estado = "false";

if(!$result)
{
    $mensaje = "Procesado correctamente.";
    $estado = "true";
}
else
{
    $mensaje = "Error: ".$result;
}

$response = array(
    'mensaje' => $mensaje,
    'estado' => $estado,
);

echo json_encode($response);
?>