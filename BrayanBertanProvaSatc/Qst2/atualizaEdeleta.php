<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 01/12/2017
 * Time: 22:16
 */

  include('conexao.php');

/**
 Edita os dados do usuario
 */
if(isset($_POST["submitEditar"])) {
    mysqli_query($con,"UPDATE dados SET nome='$_POST[nome]',email='$_POST[email]',dataHoraModificacao=now() WHERE id='$_POST[submitEditar]'");
    echo"Editado com sucesso!";
    echo('<meta http-equiv="refresh" content="0.6;url=index.php">');

}

/**
Delete os dados do usuario
 */
  if(isset($_POST["submitDeletar"])) {
      mysqli_query($con, "DELETE FROM dados WHERE id ='$_POST[submitDeletar]'");
      echo"Deletado com sucesso!";
      echo('<meta http-equiv="refresh" content="0.6;url=index.php">');
  }


/**
Desativa o usuario
 */
if(isset($_POST["submitDesativar"])) {
    mysqli_query($con,"UPDATE dados SET dataHoraModificacao=now(),status_sys='I',obs='$_POST[obs]' WHERE id='$_POST[submitDesativar]'");
    echo"Desativado com sucesso!";
    echo('<meta http-equiv="refresh" content="0.6;url=index.php">');

}

/**
Ativa o usuario
 */

if(isset($_POST["submitAtivar"])) {
    mysqli_query($con,"UPDATE dados SET dataHoraModificacao=now(),status_sys='A' WHERE id='$_POST[submitAtivar]'");
    echo"Ativado com sucesso!";
    echo('<meta http-equiv="refresh" content="0.6;url=index.php">');

}

   mysqli_close($con);

   ?>