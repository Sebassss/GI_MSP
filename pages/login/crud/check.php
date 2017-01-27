<?php
session_start();
/**
 * Created by PhpStorm.
 * User: SEbas
 * Date: 27/01/2017
 * Time: 11:11
 */

/*
Array
(
    [txt_usr] => ASDAS
    [txt_pwd] => DASDASD
)
*/

if(!isset($_POST['txt_usr']))
{
    die;
}

if(!isset($_POST['txt_pwd']))
{
    die;
}

$usuario = $_POST['txt_usr'];
$password = md5($_POST['txt_pwd']);

require_once "../../../core/db/class.conexion.php";
$db = new Conexion();

$consulta = $db->query("select Nombre, UsuarioID, Email, Password from tbl_usuarios where Email='$usuario' and Password='$password'");

$response = array('login' => 'ERROR');

if($db->num_rows($consulta) > 0 )
{
    $row = $db->fetch_array($consulta);
    $_SESSION['UsuarioID'] = $row['UsuarioID'];
    $_SESSION['Nombre'] = $row['Nombre'];
    $_SESSION['Email'] = $row['Email'];
    $response = array('login' => 'OK');
}

echo json_encode($response);