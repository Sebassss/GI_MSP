<?php
require_once "../../../core/db/class.conexion.php";

$UsuarioID = "";
$Nombre = "";
$Email = "";
$Password = "";
$FechaRegistro = "";




if(isset($_POST['table_field_PerfilID'])) {
    $PerfilID = $_POST['table_field_PerfilID'];
}

if(isset($_POST['table_field_UsuarioID'])) {
    $UsuarioID = $_POST['table_field_UsuarioID'];
}


$db = new Conexion();

$result = $db->query("insert into tbl_usuariosperfiles (PerfilID,UsuarioID)  values ('$PerfilID','$UsuarioID')") ;


  $mensaje = "No pudo Agregar.";
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