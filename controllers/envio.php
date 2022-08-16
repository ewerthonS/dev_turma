<?php

// echo $_POST["txtnome"]. "<br>" ;
// echo $_POST["txtmes"]. "<br>" ;
// echo $_POST["txtcep"]. "<br>" ;
// echo $_POST["txtcpf"]. "<br>" ;
// echo $_POST["txtend"]. "<br>" ;
// echo $_POST["txtbar"]. "<br>" ;
// echo $_POST["txtcid"]. "<br>" ;
// echo $_POST["txtuf"]. "<br>" ;
// echo $_POST["txtEmail"]. "<br>" ;
// echo $_POST["txttef"]. "<br>" ;

require_once("..//functions/funcoes.php");



 
// testar botôes
if(isset($_POST["btnEnviar"])){
    
if(!empty($_POST["txtnome"])){
    $nome = $_POST["txtnome"];
    $email = $_POST['txtEmail'];
    $fone = $_POST['txtfone'];
    $endereco = $_POST['txtendereco'];
    $cidade = $_POST['txtcidade'];
    $uf = $_POST['txtuf'];
    $cep = $_POST['txtcep'];
    $bairro = $_POST['txtbairro'];
   
    $array = ["nome"=>"{$nome}", "cep"=>"{$cep}","endereço"=>"{$endereco}",
     "bairro"=>"{$bairro}","cidade"=>"{$cidade}","uf"=>"{$uf}","Email"=>"{$email}",
      "telefone"=>"{$fone}"];
    
    array_push($_SESSION['listar'], $array);

    echo "Ola ".  $nome . " seus dados foram cadastrados com sucesso !!!" . "<br>";
}
else{
    echo"preencha os campos";
}
}


if(isset($_POST["btnlistar"])){
    if(empty($_SESSION['lista'])){
        echo "não foi preenchido nenhum dado !!!" . "<br>";

        }
   else{
    $exibirdados = listar();
        echo $exibirdados;
        session_destroy();
    }
     }

      
    


    
    




//     $body = "===================================" . "<br>";
//     $body = $body . "FALE CONOSCO - TESTE EXIBIÇÃO" . "<br>";
//     $body = $body . "===================================" . "<br>";

//     $body = $body .  "Nome: " . $nome . "<br>";
//     $body = $body ."Email: " . $email . "<br>";
//     $body = $body . "fone: " . $fone . "<br>";
//     $body = $body . "===================================" . "<br>";

//     echo $body;

//     // chamar a função dia_atual

//     date_default_timezone_set('America/Sao_Paulo');


//     $dia = dia_atual();
//     echo $dia . "<br>";

//         $hora = date('h:i:s');

//     echo $hora. "<br>";

// if(($hora >= "00:00:00") && ($hora <= "11:59:59") ){
//     echo "boa dia !!!";
// }

// elseif(($hora >= "12:00:00") && ($hora <= "17:59:59") ){
//     echo "bom tarde !!!";
// }
// else{
//     echo "boa noite !!!";
// }



?>