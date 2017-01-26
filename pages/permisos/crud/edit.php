<?php
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 25/01/2017
 * Time: 8:33
 */
require_once "../../../core/db/class.conexion.php";

if(isset($_POST['table_field_PerfilID'])) {
    $PerfilID = $_POST['table_field_PerfilID'];
}

if(isset($_POST['table_field_UsuarioID'])) {
    $UsuarioID = $_POST['table_field_UsuarioID'];
}


$db = new Conexion();

$result = $db->query("update  tbl_usuariosperfiles set UsuarioID ='$UsuarioID', PerfilID = '$PerfilID' where UsuarioID= '$UsuarioID' and $PerfilID='$PerfilID'") ;


$mensaje = "No pudo Eliminar.";
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