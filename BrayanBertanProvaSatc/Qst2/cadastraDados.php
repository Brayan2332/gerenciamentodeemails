<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 01/12/2017
 * Time: 20:39
 */

include('conexao.php');



if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$sql="INSERT INTO dados (nome,email,dataHora,dataHoraModificacao,status_sys) VALUES ('$_POST[nome]','$_POST[email]',now(),now(),'A')";

if (!mysqli_query($con,$sql))
{

    die('Error: ' . mysqli_error($con));

}else{
    echo"Cadastrado com sucesso!";
    echo('<meta http-equiv="refresh" content="0.6;url=index.php">');
}










mysqli_close($con);

?>
