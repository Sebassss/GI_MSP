<?php
/**
 * Created by PhpStorm.
 * User: Calopsia
 * Date: 26/01/2017
 * Time: 16:37
 */
/*
    [table_field_IncidenteID] =>
    [table_field_UsuarioID] => asdasd
    [table_field_Titulo] => titulo
    [table_field_Detalles] => <p>detalle</p>
    [table_field_IncidentePrioridadID] => 1
    [table_field_IncidenteEstadoID] => 1
 */

$IncidenteID = $_POST['table_field_IncidenteID'];
$UsuarioID = $_POST['table_field_UsuarioID'];
$Titulo = $_POST['table_field_Titulo'];
$Detalles = $_POST['table_field_Detalles'];
$IncidentePrioridadID = $_POST['table_field_IncidentePrioridadID'];
$IncidenteEstadoID = $_POST['table_field_IncidenteEstadoID'];

require_once "../../../core/db/class.conexion.php";

$db = new Conexion();

$result = $db->query("insert into tbl_incidentes (UsuarioID, Titulo, Detalles, IncidenteEstadoID, IncidentePrioridadID) 
                      values ('$UsuarioID','$Titulo','$Detalles','$IncidenteEstadoID','$IncidentePrioridadID')");


$result2 = $db->query("select Nombre from tbl_incidenteprioridad where IncidentePrioridadID = ".$IncidentePrioridadID );
$Prioridad = $db->fetch_array($result2);

$result3 = $db->query("select Nombre from tbl_incidenteestado where IncidenteEstadoID = ".$IncidenteEstadoID );
$Estado = $db->fetch_array($result3);




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
    'Titulo' => $Titulo,
    'Detalles' => $Detalles,
    'Estado' => $Estado['Nombre'],
    'Prioridad' => $Prioridad['Nombre']
);

echo json_encode($response);

