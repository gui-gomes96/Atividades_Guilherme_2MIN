<?php

include 'conecta.php';
$resultado = "<table borader = 1>"
$stmt = $conn ->query("SELECT * FROM camisa");

whille ($row = $stmt -> fetchObject()){
    $resultado = " <tr><td> $row ->cor</td><td> $row ->tamanho  </tr> <td>";
}
$resultado = "</table>"

?>