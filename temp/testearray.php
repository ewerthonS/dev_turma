<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::: Teste Array :::</title>
</head>
<body>

<?php

 echo "TESTE DE ARRAY <br>" ;

//atribuiçao de um array

$array_numeros = array (5,10,15,20,25);


print_r ($array_numeros) ;

echo "<br><br>";
//verificar a quantidade de itens
echo "quantidade de itens da coleção =" . $qtdeitens = count($array_numeros);

//Apresentar os dados utilizando estrutura de repetição 
//for
echo "<br><br>";

for($i=0;$i< $qtdeitens;$i++) {
echo "índice =" . $i . " Valor = " . $array_numeros [$i] . "<br>";
}

echo "<br>";
//Foreach mesma função do de cima 
foreach ($array_numeros as $i){
    echo $i . "<br>";
}

echo "<br>";

$salarios = array();
$salarios ["Claudia"] = 10000;
$salarios ["João"] = 15000;
$salarios ["Luiza"] = 12000;

//Mostrar o salário e o nome de quem pertence
foreach ($salarios as $key_arr => $var_arr){
    echo $var_arr . "=" . $key_arr .  "<br>";
}

//arrays multidimensional
$produtos = array (
    array ("Maçã",20,10),
    array ("Banana",10,15),
    array ("Laranja",15,7),
    array ("Pera", 20,5)
);

//for dentro de outro for 
for ($linha =0; $linha < 4; $linha++){
    echo "<p><b> Linha número:" . $linha . "</b></p>";
    echo "<ul>";
   
    for ($coluna = 0; $coluna < 3; $coluna++){
        echo "<li>" .$produtos [$linha] [$coluna] . "</li>";

    }
    echo "<ul>";

}

echo "<br>";

$idade = array("Marcos"=>"35", "Suzana"=>"37", "Joel"=>"43");

    session_start();

    //se a session não existir, será criada

    if (empty($_SESSION['lista'])) {
        $_SESSION['lista'] =[];
    }

 array_push($_SESSION["lista"], $idade);
$tabela = "<Table border ='1'>
        
        <tr></tr>
        <th>Nome</th>
        <th>Idade</th>
        
        <tbody>";

        $retorno = $tabela;

        // print_r($_SESSION["lista"]);

    foreach ($_SESSION['lista'] as $linhadoarray){
        //Busca o indíce na linha que é o nome e procura o valor dele que é idade
        foreach ($linhadoarray as $key_nome => $var_idade){

        $retorno .= "<tr>";
        $retorno .= "<td>" . $key_nome . "</td>";
        $retorno .= "<td>" . $var_idade . "</td>";
        $retorno .= "</tr>";
    }
    }  


    $retorno .= "<tr>";
    $retorno .= "<td>*****</td>";
    $retorno .= "<td>*****</td>";
    $retorno .= "</tr>";

        //pegando as chaves que são os nomes e entregando para o indice
    $indice = array_keys($idade);
    //ele classica 
    rsort($indice);
    //faça enquanto, ele sempre faz teste no inicio, ! é negação
    while (!empty($indice)) {
        $retorno .= "<tr>";

        $nomecoluna = array_pop($indice);
        $retorno .= "<td>" . $nomecoluna . "</td>";
        $retorno .= "<td>" . $idade[$nomecoluna] . "</td>";
        $retorno .= "</tr>";

    }

    $retorno .= "<tr>";
    $retorno .= "<td>*****</td>";
    $retorno .= "<td>*****</td>";
    $retorno .= "</tr>";

    //do faz o teste no final
    $indice = array_keys($idade);

    do {
        $retorno .= "<tr>";

        $nomecoluna = array_pop($indice);
        $retorno .= "<td>" . $nomecoluna . "</td>";
        $retorno .= "<td>" . $idade[$nomecoluna] . "</td>";
        $retorno .= "</tr>";


     }
     while (!empty($indice));




    $retorno .= "<tr>";
    $retorno .= "<td>*****</td>";
    $retorno .= "<td>*****</td>";
    $retorno .= "</tr>";


        foreach ($idade as $coluna=>$conteudodacoluna){
            
        $retorno .= "<tr>";
        $retorno .= "<td>" . $coluna . "</td>";
        $retorno .= "<td>" . $conteudodacoluna . "</td>";
        $retorno .= "</tr>";

        }

    $retorno .="</tbody></table>";
    echo $retorno ;  
  
    
    session_destroy();

?>  

    
</body>
</html>