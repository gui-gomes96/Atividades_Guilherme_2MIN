<?php

include 'conecta.php';

$tamanho = $_POST['campo2'];
$cor = $_POST['campo1'];
$resposta = array();

if($conn->query("INSERT INTO camisa VALUES (NULL, '".$cor."', '".$tamanho."')")){
    $resposta = 'Camisa registrada com sucesso!';
}else {
    $resposta = 'Nao foi possivel registrar';
};
echo $resposta;
?>