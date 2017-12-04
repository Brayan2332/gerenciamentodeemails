<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 01/12/2017
 * Time: 20:42
 */

$servidor = 'localhost';
$usuario = 'root';
$senha = 'bb980623';
$banco = 'gerenciaemail';
$con = new mysqli($servidor, $usuario, $senha, $banco);
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>