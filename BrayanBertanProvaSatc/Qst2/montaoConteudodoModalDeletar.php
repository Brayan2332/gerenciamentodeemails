<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 03/12/2017
 * Time: 17:40
 */

/*
 *Recebe a requisição do ajax via javascript e monta e retorna o conteudo que será colocado dentro do modal de Deletar/Desativar...
 * E faz a função de deletar/Desativar e colocar uma observação do motivo da desativação nos dados no usuario

 */
    echo "

     <link rel=\"stylesheet\" href=\"css/estilos.css\">
     <form ACTION='atualizaEdeleta.php' METHOD='POST' id=\"formulario\">
        <div class='row'>
          <div class=\"form-group col-md-12\">
            <button type=\"submit\" value='$_POST[id]' id='idDeletarouDesativar' name='submitDeletar'>Deletar permanentemente!</button>
           </div>
        </div>
        <hr>
        <div class='row'>
          <div class=\"form-group col-md-12\">
            <button type=\"submit\" value='$_POST[id]'  id='idDeletarouDesativar' name='submitDesativar'>Desativar temporariamente!</button>
           </div>
        </div>
         <div class='row'>
          <div class=\"form - group col - md - 12\">
          <label for=\"comment\">Digite o motivo da desativação:</label>
          <textarea class=\"form-control\" rows=\"5\" id=\"obs\" name='obs'></textarea>
          </div>
     </form>
    
    
    
    ";



?>