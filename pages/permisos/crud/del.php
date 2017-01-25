<?php
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 25/01/2017
 * Time: 8:33
 */
require_once "../../../core/db/class.conexion.php";

$UsuarioID = "";

if(isset($_POST['table_field_UsuarioID'])) {
    $UsuarioID = $_POST['table_field_UsuarioID'];
}


$db = new Conexion();

$result = $db->query("delete from  tbl_usuarios where UsuarioID= '$UsuarioID'") ;


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