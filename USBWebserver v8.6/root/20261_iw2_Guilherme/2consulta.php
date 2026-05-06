<?php
include 'conecta.php';

$stmt = $conn ->query("SELECT * FROM camisetas ")

while ($row = $stmt ->fecth(PDO;; FECTH_ASSOC)) {
    echo $row ['nome'] . "<br>";

}


?>