<?php


require_once("../functions/funcoes.php");

// echo $_POST["txtnome"]  ."<br>";
// echo $_POST["txtdata"] ."<br>";
// echo $_POST["txtcpf"]  ."<br>";
// echo $_POST["txtcep"]  ."<br>";
// echo $_POST["txtendereco"]  ."<br>";
// echo $_POST["txtbairro"]  ."<br>";
// echo $_POST["txtcidade"] ."<br>";
// echo $_POST["txtuf"]  ."<br>";
// echo $_POST["txtemail"]  ."<br>";
// echo $_POST["txtfone"]."<br>";


//Atribuindo as variáveis



//definir o conjunto de dados


//Testar botões

if (isset($_POST["btnenviar"])){
    if(isset($_POST["txtnome"])){
        
$nome = $_POST["txtnome"];
$email = $_POST["txtemail"];
$fone = $_POST["txtfone"];
$endereco = $_POST["txtendereco"];
$cidade = $_POST["txtcidade"];
$uf = $_POST["txtuf"];
$cep = $_POST["txtcep"];
$bairro = $_POST["txtbairro"];


      
   


$array = ["nome" =>"{$nome}", "cep" =>"{$cep}","endereco" =>"{$endereco}", "bairro" =>"{$bairro}","cidade" =>"{$cidade}","uf" =>"{$uf}","email" =>"{$email}","fone" =>"{$fone}"];
    


array_push($_SESSION["lista"], $array);

     echo "Botão enviar" . "<br>";
        echo $nome . " Seus dados foram cadastrados com sucesso";
    }
}

    if (isset($_POST["btnlistar"])){
        if(empty($_SESSION["lista"])){
            echo "Você não têm dados cadastrados";
        }
        
  
        else {
            $exibirdados = listar();
            echo $exibirdados;
            session_destroy();
        }
    }
 
// //Resultado
// // echo " nome " . $nome . "<br>";
// // echo " email " . $email . "<br>";

// //Verificar se os campos foram preenchidos

//  if (isset($_POST["txtnome"])) {
//  $email = $_POST["txtemail"];
//  $fone = $_POST["txtfone"];

// // //Apresentar valor
// // echo " email: " . $email . "<br>";
// // }

// //atribuir resultado da variável body
// $body = "=================================================" . "<br>";
// $body = $body . "FALE CONOSCO - TESTE DE EXIBIÇAO " . "<br>";
// $body = $body . "=================================================" . "<br>";

// $body = $body . "Nome:" . $nome . "<br>";
// $body = $body . "Email:" . $email . "<br>";
// $body = $body . "Telefone:" . $fone . "<br>";
// $body = $body . "=================================================" . "<br>";

// //Apresentar valor da variável.
// echo $body;

// //Chamar a função dia atual
// date_default_timezone_set('America/Sao_Paulo');
// $dia = dia_atual();



// echo $dia . "<br>";

// $hora = date("H:i:s");



// echo $hora. "<br>";

// if (($hora >= "00:00:00") && ($hora <="11:59:59")) {
//     echo "Bom Dia !!!";

    
// }

// elseif (($hora >= "12:00:00") && ($hora <="17:59:59")) {
//     echo "Boa Tarde !!!";

    
// }

// else {
//     echo "Boa noite !!!";

    
//  }

//  }
?>