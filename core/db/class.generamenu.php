<?php
/**
 * Clase Permiso
 *
 * Clase para validar los permiso de un usuario sobre un recurso del sistema
 *
 * @category   Configuracion
 * @package    base de datos
 * @copyright  Copyright (c) 2016 pseba20@gmail.com
 * @version    $Id:$
 */

class Menu extends Conexion {

    public function __construct (){
        parent::__construct();
    }

    var $mi_miron;

    /**
     * Funcion que retorna los permisos de un recurso como menu
     *
     * @param int $usuario_id
     * @param int $recurso_id
     * @return object|stdClass
     */

    public function GeneraMenu ($parent,$level,$user){


        $consulta = "SELECT a.RecursoID, a.Nombre,a.Icon, a.Link, Deriv1.Count as Count FROM Tbl_Recursos a
                     LEFT OUTER JOIN (SELECT Parent, COUNT(*) AS Count FROM Tbl_Recursos GROUP BY parent) Deriv1 ON a.RecursoID = Deriv1.Parent
                     LEFT JOIN Tbl_PerfilesRecursos pr on pr.RecursoID = a.RecursoID
                     LEFT JOIN Tbl_UsuariosPerfiles up on up.PerfilID = pr.PerfilID
                     WHERE a.Parent =".$parent." and up.UsuarioID = ".$user." group by a.RecursoID,a.Nombre, a.Icon,a.Link, Deriv1.count order by Orden asc";

        $result = $this->query($consulta);

        if($this->num_rows($result)>0){



            while($resultados = $this->fetch_array($result))
            {
                if ($resultados['Count'] > 0)
                {
                    echo '<li class="dropdown">
                          <a href="'.$resultados['Link'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$resultados['Nombre'].' <span class="caret"></span></a>
                          <ul class="dropdown-menu">';

                    $obj_menu = new Menu();
                    $obj_menu->GeneraMenu($resultados["RecursoID"], $level +1,$user);
                    $obj_menu->desconectar();

                    echo '</ul></li>';
                }
                elseif ($resultados['Count']==0 )
                {
                    echo '<li><a href="'.$resultados['Link'].'">'.$resultados['Nombre'].'</a></li>';
                }
                else;
            }

        }

    }

}

/*
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
*/