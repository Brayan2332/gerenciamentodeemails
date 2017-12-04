<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 03/12/2017
 * Time: 22:51
 */

include('conexao.php');

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $sql = "SELECT email FROM dados WHERE email = '{$_POST['emailUsuario']}' ";

        $q = mysqli_query($con,$sql );

        if( mysqli_num_rows( $q ) > 0 ){
            echo 'Já existe algum usuario usando este email confira na lista de usuarios!(Isso não impede que o email seja inserido novamente';
        }

?>