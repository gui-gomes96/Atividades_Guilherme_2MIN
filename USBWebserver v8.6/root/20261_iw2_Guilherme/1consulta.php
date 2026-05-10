<?php

include 'conecta.php';
//froma orientada ao objeto(usarei essa)
$resultado = "<table border='1'>";

$stmt = $conn->query("SELECT * FROM camisa");

while($row = $stmt->fetchObject()){
    $resultado .= "<tr><td>$row->cor</td><td>$row->tamanho</td></tr>";}
    
    $resultado .= "</table>";

echo $resultado;

?>