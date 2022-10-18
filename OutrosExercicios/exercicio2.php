<?php
//Criando array vazio
$meu_array=[];
// populando 7 posições do array com número aleatórios
for ($i=0; $i < 7; $i++) { 
    $meu_array[]= random_int(1,10);
}
//print_r($meu_array);
// printando posição 3 do array
echo "Posicao 3 do array: ".$meu_array[2];
echo "\n";
//transformando array em string
$meuString= implode(',',$meu_array);
echo "String separada por virgula: ".$meuString;
echo "\n";

//transformando string em outro array
$novoArray = explode(",",$meuString);

//removendo array original
unset($meu_array);

// verificando se existe o valor 14  no array
echo in_array(14,$novoArray)? "Número 14 encontrado no array":"Número não encontrado";
echo "\n";

$arr_remove=[];
foreach ($novoArray as $key => $arr) {
    if($key>0 && $arr<$novoArray[$key-1]){
        $arr_remove[$key]=$arr;
    }
}
// Array completo
print_r($novoArray);
// array com numero menores a serem removidos
print_r($arr_remove);
//removendo elementos do array
$novoArray = array_diff_key($novoArray, $arr_remove);
//printando array já com elementos removidos
print_r($novoArray);

//removendo ultimo elemento do array
array_pop($novoArray);
print_r($novoArray);

// Printando a quandidade do array
echo "Quantidade: ".count($novoArray);
echo "\n";

//Invertendo posicao do array , funcao nativa
/* $novoArray= array_reverse($novoArray,true);
print_r($novoArray); */

$arr_tmp=[];
//Invertendo posicao do array com foreach e array_unshift
foreach ($novoArray as $key => $arr) {
   array_unshift($arr_tmp,$arr);
}
$novoArray = $arr_tmp;
print_r($novoArray);
?>