<?php

include 'conecta.php';

$tamanho = $_POST['campo2'];
$cor = $_POST['campo1'];
$resposta = array();
//inseri os valores no mysql
if($conn->query("INSERT INTO camisa VALUES (NULL, '".$cor."', '".$tamanho."')")){
    $resposta = 'Camisa registrada!';
}else {
    $resposta = 'Nao Executou o Registro';
};
 
echo $resposta;
?>