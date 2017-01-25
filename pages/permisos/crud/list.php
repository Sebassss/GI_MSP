<?php

require_once "../../../core/db/class.conexion.php";

if(isset($_POST['pagesize']))
{
	$TAMANO_PAGINA = $_POST['pagesize'];
}
else
{
	$TAMANO_PAGINA=10;
}

//examino la página a mostrar y el inicio del registro a mostrar

if(isset($_POST['page']))
{
	$pagina = $_POST["page"];
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

$consulta = $db->query("select r.RecursoID,
                               u.UsuarioID,
                               u.Nombre,
                               pr.Consultar,
                               pr.Agregar,
                               pr.Editar,
                               pr.Eliminar,
                               p.Nombre,
                               case when r.Parent = 0 then concat('[Principal]',r.Nombre ) else r.Nombre end as Acceso
                        from tbl_perfilesrecursos pr
                          left join tbl_recursos r on r.RecursoID = pr.RecursoID
                          left join tbl_perfiles p on p.PerfilID = pr.PerfilID
                          left join tbl_usuariosperfiles up on up.PerfilID = pr.PerfilID
                          left join tbl_usuarios u on u.UsuarioID = up.UsuarioID order by u.UsuarioID asc, u.Nombre asc");

$num_total_registros = $db->num_rows($consulta);
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


$consulta = $db->query("select r.RecursoID,
                               u.UsuarioID,
                               u.Nombre,
                               pr.Consultar,
                               pr.Agregar,
                               pr.Editar,
                               pr.Eliminar,
                               case when r.Parent = 0 then concat('[Principal]',r.Nombre ) else r.Nombre end as Acceso
                        from tbl_perfilesrecursos pr
                          left join tbl_recursos r on r.RecursoID = pr.RecursoID
                          left join tbl_perfiles p on p.PerfilID = pr.PerfilID
                          left join tbl_usuariosperfiles up on up.PerfilID = pr.PerfilID
                          left join tbl_usuarios u on u.UsuarioID = up.UsuarioID order by r.Parent,  u.UsuarioID asc, u.Nombre asc limit ". $inicio. ",". $TAMANO_PAGINA.";");

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