<?php

//verificar se existe valor na passagem do parâmetro
if( isset($_GET['cor']) ) {


//declaração de variaveis

$nome; 
$idade;


//parâmetro
$cor = $_GET["cor"];


//atribuir valor para uma variável
//popular a variável

//variável nome que recebe
$nome = 'luiz' ;

//aprensentar o valor da variável
echo $nome;
?> <br>


<?php
//feche o php antes do conteudo e depois abra outra php depois da variavel 
//concatenar = juntar um conteudo com variavel

echo "Olá " . $nome ;
$idade = 1 ;

echo $idade;

$a = $idade + 1 ;

$b = " 2 ";

$c = $b + $a ;

echo $a ."<br>";
echo $b ."<br>";
echo $c ."<br>";

echo " A cor escolhida foi " .$cor;

}
?>