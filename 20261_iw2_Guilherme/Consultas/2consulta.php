<?php
//segunda forma de cosngultar 
include 'conecta.php';

$stmt = $conn->query("SELECT * FROM camisa");

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    echo $row['cor'] . " - " . $row['tamanho'] . "<br>";

}

?>