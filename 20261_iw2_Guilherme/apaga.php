<?php

include 'conecta.php';
include 'select.php';

$id = $_POST['id'];

$sql = "DELETE FROM tb_camisa WHERE cd_camisa = $id";

if($conn->query($sql)){

    echo exibir();

}else{

    echo "Erro ao excluir";
}
?>