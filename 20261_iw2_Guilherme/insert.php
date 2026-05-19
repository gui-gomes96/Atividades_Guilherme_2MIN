<?php
include 'select.php';
include 'conecta.php';


$tamanho = $_POST['campo2'];
$cor = $_POST['campo1'];

//inseri os valores no mysql
if($conn->query("INSERT INTO tb_camisa VALUES (NULL, '".$cor."', '".$tamanho."')")){
    //Exibi as respostas do formulario
    $resposta = exibir();
}else{
    $resposta = 'Nao Executou o Registro';
};
 
echo $resposta;
?>