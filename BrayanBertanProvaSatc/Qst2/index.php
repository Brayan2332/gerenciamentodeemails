<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="imagens/icone.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de e-mails</title>
    <link href="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!--
Começo do ajax que ira enviar a requisição para o php onde será gerarado o conteudo do modal de deletar/desativar
e retornar aqui onde será coloca no campo certo.
-->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        function carregaModalDeletar(id){
            var parametros = 'id='+id;
            action = 'montaoConteudodoModalDeletar.php';
            $.ajax({
                type: "POST",
                url: action,
                data: parametros,
                beforeSend: function() {
                    $('#modalConteudoDeletar').empty().append('Aguarde...');
                },
                success: function(txt) {
                    $('#modalConteudoDeletar').empty().append(txt);
                },
                error: function(txt) {
                    $('#modalConteudoDeletar').empty().append('Erro!');
                }
            });
        }
    </script>
<!--
Fim do ajax que ira gerar o conteudo do modal de deletar/desativar.
-->

    <!--
Começo do ajax que envia uma requisição para o php onde será verificado se aquele email já existe.
-->
    <script type="text/javascript">
        $(function(){

            $("form[id='formulario']").submit( function(){

                var emailUsuario = $("input[name='email']").val();

                $.post('verificaEmailExistente.php',{emailUsuario: emailUsuario},function(data){
                    $('#testeEmailRepetido').html(data);

                });

            });

        });


    </script>
    <!--
Final do ajax que envia uma requisição para o php onde será verificado se aquele email já existe.
-->


</head>
<body id="topo">

<!--
Começo do navbar que ira redirecionar para a parte desejada do site.
-->

 <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top" >Gerenciador de Emails</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li  class="page-scroll">
                    <a href="#cadastro"><span class="glyphicon glyphicon-pencil">Cadastro</span></a>
                </li>
                <li  class="page-scroll">
                    <a href="#editar"><span class="glyphicon glyphicon-edit">Edição</span></a>
                </li>
                <li  class="page-scroll">
                    <a href="#desativos"><span class="glyphicon glyphicon-user">Desativados</span></a>
                </li>
            </ul>
        </div>
    </div>
 </nav>

<!--
Fim do navbar que ira redirecionar para a sessão desejada do site.
-->


<!--
Começo do modal que vai conter as opções(Conteudo que foi gerado pelo php via ajax) de deleter permanentemente um usuario ou desativar temporariamente ele
juntamente com a opção de anotar ou não o motivo de desativar ele.
-->
  <div class="modal fade" id="modal-deletar">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                 <h4 id="deletarTitulo" class="modal-title">Deletar</h4>
             </div>
             <div class="modal-body" id="modalConteudoDeletar">
             </div>
             <div class="modal-footer">
                 <button type="button" id="fecharTexto" class="btn btn-default" data-dismiss="modal">Fechar</button>
             </div>
         </div>
     </div>
  </div>

 <!--
Fim do modal que vai conter as opções de deleter ou desativar o usuario.
-->

 <!--
Começo da div que ira conter o conteudo do site.
-->

  <div class="container-fluid" id="principal">
      <!--
Começo do cadastro do site.
-->
   <section id="cadastro">
       <h3><span class="glyphicon glyphicon-pencil" id="tituloCadastro">Cadastro</span></h3>
       <form method="POST" action="cadastraDados.php" id="formulario">
           <div class="row">
               <div class="form-group col-md-12">
                   <label for="nome">Nome</label>
                   <input type="text"  class="form-control" id="nome" name="nome">
               </div>
           </div>
           <div class="row">
               <div class="form-group col-md-12">
                   <label for="email">Email</label>
                   <input type="text"   class="form-control" id="email" name="email">
                   <label id="testeEmail"></label><label id="testeEmailRepetido"></label>
               </div>
           </div>
           <div class="row">
               <div class="form-group col-md-12">
                   <button type="submit" id="cadastrarBotao" class="btn btn-primary">Cadastrar</button>
               </div>
           </div>
       </form>
   </section>
      <!--
Fim do cadastro do site.
-->

      <!--
Começo do cadastro do site(Parte com até no máximo 600px de largura.)
-->
   <section id="cadastroTelaPequena">
        <h3><span class="glyphicon glyphicon-pencil" id="tituloCadastro">Cadastro</span></h3>
        <table class='table table-striped'>
            <thead>
             <tr>
                <th>Nome:</th>
                <th>Email:</th>
                <th>Cadastrar:</th>
             </tr>
             </thead>
             <tbody>
             <form action='atualizaEdeleta.php' METHOD='POST' id="formulario">
                <tr>
                    <td class="tdCadastro"><input type='text' class='form-control' id='nome' name='nome' required></td>
                    <td class="tdCadastro"><input type='text' class='form-control' id='email' name='email' required></td>
                   <td class="tdCadastro"><button type="submit" id="cadastrarBotao" class="btn btn-primary"><span id="botaoCadastrar" class='glyphicon glyphicon-ok'></span></button></td>
                </tr>
             </form>
             </tbody>
        </table>
    </section>

      <!--
Fim do cadastro do site(Parte com até no máximo 600px de largura.)
-->

      <!--
Começo da edição/exclusão/desativação de usuarios ativos do site
-->
    <center><h3>Ativos:</h3></center>
    <section id="editar">
    <?php
    $sql = mysqli_query($con,"SELECT * FROM dados WHERE status_sys='A'");
    $qtde = mysqli_num_rows($sql);

    if ($qtde>=1) {
echo"

    <table class='table table-striped'>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data/Hora</th>
            <th>Ultima Modificação</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>";
            while ($dado = mysqli_fetch_assoc($sql)) {
                echo "
            <tr>
              <form ACTION='atualizaEdeleta.php' METHOD='POST'>
                <td ><input type='text' class='form-control' id='nome' name='nome' value='$dado[nome]'  minlength='3' required></td>
                <td><input type='text' class='form-control' id='email' name='email' value='$dado[email]' required></td>
                <td><input type='text' class='form-control' id='data' name='data' value='$dado[dataHora]' disabled></td>
                <td><input type='text' class='form-control' id='dataModificacao' name='dataModificacao' value='$dado[dataHoraModificacao]' disabled></td>
                <td><button  value='$dado[id]'  name='submitEditar' <span id='botaoEditar' class='glyphicon glyphicon-edit' ></button></td>
                <td><a data-toggle=\"modal\" data-target=\"#modal-deletar\"><button  value='$dado[id]'  name='Deletar' <span id='botaoDeletar'  class='glyphicon glyphicon-trash' onclick='carregaModalDeletar(this.value)';></button></a></td>
              </form>
           </tr>
        
          ";
            }
        }else{
            echo " <link rel='stylesheet' type='text/css' href='css/estilos.css'>";
            echo "<center>";
            echo "<div id='camposemDados'>";
            echo "<h1>Edição/Exclusão!</h1>";
            echo "<h2>Você ainda não tem dados cadastrados ou ativos!</h2>";
            echo "</div>";
            echo "</center>";

        }


        ?>

        </tbody>
        </table>
    </section>

      <!--
Fim da edição/exclusão/desativação de usuarios ativos do site
-->

      <!--
Começo da ativação de usuarios desativos do site(Não poderá ser alterador nenhum dado enquanto o usuario estiver inativo.)
-->

    <center><h3>Inativos:</h3></center>
    <section id="desativos">
        <?php
        $sql = mysqli_query($con,"SELECT * FROM dados WHERE status_sys='I'");
        $qtde = mysqli_num_rows($sql);

        if ($qtde>=1) {
            echo"

    <table class='table table-striped'>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data/Hora</th>
            <th>Ultima modificação</th>
            <th>Observação</th>
            <th>Ativar</th>
        </tr>
        </thead>
        <tbody>";



            while ($dado = mysqli_fetch_assoc($sql)) {
                echo "
            <tr>
              
            <td ><input type='text' class='form-control' id='nome' name='nome' value='$dado[nome]' disabled></td>
            <td><input type='text' class='form-control' id='email' name='email' value='$dado[email]' disabled></td>
            <td><input type='text' class='form-control' id='data' name='data' value='$dado[dataHora]' disabled></td>
            <td><input type='text' class='form-control' id='dataModificacao' name='dataModificacao' value='$dado[dataHoraModificacao]' disabled></td>
            <td><input type='text' class='form-control' id='obs' name='obs' value='$dado[obs]' disabled></td>
            <form ACTION='atualizaEdeleta.php' METHOD='POST'>
               <td><button  value='$dado[id]'  name='submitAtivar' <span id='botaoAtivar' class='glyphicon glyphicon-ok' ></button></td>
            </form>
        </tr>
        
          ";
            }
        }else{
            echo " <link rel='stylesheet' type='text/css' href='css/estilos.css'>";
            echo "<center>";
            echo "<div id='camposemDados'>";
            echo "<h1>Inativos!</h1>";
            echo "<h2>Você ainda não tem dados inativos!</h2>";
            echo "</div>";
            echo "</center>";

        }


        ?>

        </tbody>
        </table>
    </section>

      <!--
Fim da ativação de usuarios desativos do site(Não poderá ser alterador nenhum dado enquanto o usuario estiver inativo.)
-->


  </div>
 <!--
Fim da div que ira conter o conteudo do site.
-->

<footer>
    <h3>Brayan Bertan!</h3>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/jquery.min.js"></script>
<script src="jquery/jquery.validate.min.js"></script>
<script src="JavaScript/validacoes.js"></script>
<script src="JavaScript/validaEmail.js"></script>
</body>
</html>