<?php

require_once "../../../core/db/class.conexion.php";

if(isset($_GET['pagesize']))
{
	$TAMANO_PAGINA = $_GET['pagesize'];
}
else
{
	$TAMANO_PAGINA=10;
}

//examino la página a mostrar y el inicio del registro a mostrar

if(isset($_GET['page']))
{
	$pagina = $_GET["page"];
    if (!$pagina)
    {
    	$inicio = 0;
        $pagina = 1;
    }
    else
    {
    	$inicio = ($pagina - 1) * $TAMANO_PAGINA;
    }
                //calculo el total de páginas
}
else
{
	$inicio = 0;
    $pagina=1;
}


$db = new Conexion();

$consulta = $db->query("select i.IncidenteID,
       u.UsuarioID,
       i.Titulo,
       i.Detalles,
       ip.IncidentePrioridadID,
       ie.IncidenteEstadoID
from tbl_incidentes i
  left join tbl_incidenteprioridad ip on ip.IncidentePrioridadID = i.IncidentePrioridadID
  left join tbl_incidenteestado ie on ie.IncidenteEstadoID = i.IncidenteEstadoID
  left join tbl_usuarios u on u.UsuarioID = i.UsuarioID");
$num_total_registros = $db->num_rows($consulta);
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


$consulta = $db->query("select i.IncidenteID,
       u.UsuarioID,
       i.Titulo,
       i.Detalles,
       ip.IncidentePrioridadID,
       ie.IncidenteEstadoID
from tbl_incidentes i
  left join tbl_incidenteprioridad ip on ip.IncidentePrioridadID = i.IncidentePrioridadID
  left join tbl_incidenteestado ie on ie.IncidenteEstadoID = i.IncidenteEstadoID
  left join tbl_usuarios u on u.UsuarioID = i.UsuarioID limit ". $inicio. ",". $TAMANO_PAGINA.";");

$x = array();

$i=0;
while($row = $db->fetch_array($consulta))
{
	$x[$i] = $row;
	$i++;
}


$t = array(array(
    'rows' => $i,
    'page' => $pagina,
    'page_count' => $total_paginas,
    'total_rows' => $num_total_registros,
    'start' => $inicio));


//array_push($x, $t);
//echo json_encode($x);



class resultado {

    public function __construct($a,$b){
        $this->values = $a;
        $this->info = $b;
    }

    public $values;
    public $info;
}

$elresultado = new resultado($x,$t);

echo json_encode($elresultado);


?>