<?php

//verificar o dia da semana
//Extraído de: http://www.linhadecodigo.com.br/artigo/3565/trabalhando-com-funcoes-em-php.asp



session_start();


    if (empty($_SESSION["lista"])) {
        $_SESSION["lista"] = [];
    }

function listar() {
    echo "Espelho de array - Apresentação didática <br>";
    echo "===========================================" . "<br>";
    print_r($_SESSION["lista"]);
    echo "<br><br>";

    $qtderegistros = count ($_SESSION["lista"]);
    echo "Quantidade de registros no array = " . $qtderegistros;
    echo "<br><br>";



echo "Tabela com dados <br>";
echo "============================================". "<br>";
echo "<br>";

$tabela = "<table border='1'>
    <thead>
        <tr>
        <th>NOME</th>
        <th>CEP</th>
        <th>ENDEREÇO</th>
        <th>BAIRRO</th>
        <th>CIDADE</th>
        <th>UF</th>
        <th>EMAIL</th>
        <th>TELEFONE</th>
        </tr>
        </thead>
        <tbody>";


 $retorno = $tabela;
 
 foreach ($_SESSION["lista"] as $linhadoarray){
     $retorno .= "<tr>";
     foreach ($linhadoarray as $coluna =>$conteudodacoluna){
         $retorno .= "<td>" .$conteudodacoluna . "</td>";

         
     }

     $retorno .= "</tr>";
     
    }     
    foreach ($_SESSION["lista"] as $linhadoarray){
        $retorno .= "<tr>";
        foreach ($linhadoarray as $coluna =>$conteudodacoluna){
            $retorno .= "<td>" .$conteudodacoluna . "</td>";
   
            
        }
   
        $retorno .= "</tr>";
        
       }     
    

    

     $retorno .= "</tbody></table>";
    //  session_destroy();
     return $retorno;
    
     
}




// function dia_atual(){
//     $hoje = getdate();
//     // return $hoje;
//     // print_r($hoje);
//     switch($hoje["wday"]){
//         case 0:
//             return "Domingo";
//             break;
//             case 1:
//                 return "Segunda-feira";
//                 break;

//                 case 2:
//                     return "Terça-feira";
//                     break;
                    
//                     case 3:
//                         return "Quarta-feira";
//                         break;

//                         case 4:
//                             return "Quinta-feira";
//                             break;

//                             case 5:
//                                 return "Sexta-Feira";
//                                 break;

//                                 case 6:
//                                     return "Sábado";
//                                     break;
                                    
                                   
//     }

// }
?>