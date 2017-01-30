<?php
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 25/01/2017
 * Time: 12:34
 */

require_once "../../../core/db/class.conexion.php";

$db = new Conexion();

$consulta = $db->query("SELECT  a.CategoriaID, case a.Parent when 0 then a.Nombre else concat((select Nombre from tbl_categorias where CategoriaID = a.Parent),'-->',a.Nombre) end as Nombre    FROM tbl_categorias a
  LEFT OUTER JOIN (SELECT  c.Parent, COUNT(*) AS Count FROM tbl_categorias c  GROUP BY c.Parent) Deriv1 ON a.CategoriaID = Deriv1.Parent where Deriv1.Count is NULL");

$i=0;
$x = array();
while($row = $db->fetch_array($consulta))
{
    $x[$i] =array("value" => $row['CategoriaID'], "text" => $row['Nombre']);
    $i++;
}

echo json_encode($x);