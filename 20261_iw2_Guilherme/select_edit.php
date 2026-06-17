<?php

header('Content-Type: application/json; charset=utf-8');

include 'conecta.php';

$id = $_POST['id'];

$sql = "SELECT * FROM tb_camisa WHERE cd_camisa = :id";

$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

$camisa = $stmt->fetch(PDO::FETCH_ASSOC);

if($camisa){

    echo json_encode([
        'cor' => $camisa['cor'],
        'tamanho' => $camisa['tamanho']
    ]);

    exit();
}

echo json_encode([
    'cor' => '',
    'tamanho' => ''
]);

exit();
?>xx'