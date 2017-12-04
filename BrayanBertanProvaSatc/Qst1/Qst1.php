<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Questão 1</title>

    <style>
        body{
            width:99%;
            height:646px;
            background-color:gray;
        }


        #tituloQuestao{
            width:50%;
            height:16%;
            margin-left:25%;
            margin-top:3%;
            border-radius:12px;
            background-color:forestgreen;
            font-family:Verdana;
        }
        h3{
            color:white;
            margin-left:32%;
            padding-top:4%
        }


    </style>
</head>

<body>


<div id="tituloQuestao"><h3>Questão 1 da avaliação:</h3></div><br><br><br>
<hr>
<?php
/**
 * Created by PhpStorm.
 * User: Brayan Bertan
 * Date: 01/12/2017
 * Time: 16:48
 */
for($i=1; $i<=100; $i++){

   if($i%3==0 and $i%5==0){
       echo "<div id='campoResultado' style='width:5.3%;height:3%;background-color:darkgray;margin-top:1%;margin-left:1%;border-radius:5px;float:left'>Três Cinco</div>";
   }elseif ($i%3==0){
       echo "<div id='campoResultado' style='width:2.2%;height:3%;background-color:darkgray;margin-top:1%;margin-left:1%;border-radius:5px;float:left'>Três</div>";
    }elseif($i%5==0){
       echo "<div id='campoResultado' style='width:2.9%;height:3%;background-color:darkgray;margin-top:1%;margin-left:1%;border-radius:5px;float:left'>Cinco</div>";
   }else{
       echo "<div id='campoResultado' style='width:1.2%;height:3%;background-color:darkgray;margin-top:1%;margin-left:1%;border-radius:5px;float:left'>$i</div>";
   }


}

?>

</body>
</html>
