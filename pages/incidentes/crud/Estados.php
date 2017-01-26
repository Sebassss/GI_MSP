<?php
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 25/01/2017
 * Time: 12:34
 */

require_once "../../../core/db/class.conexion.php";

$db = new Conexion();

$consulta = $db->query("select IncidenteEstadoID, Nombre from tbl_incidenteestado");

$i=0;
$x = array();
while($row = $db->fetch_array($consulta))
{
    $x[$i] =array("value" => $row['IncidenteEstadoID'], "text" => $row['Nombre']);
    $i++;
}

echo json_encode($x);