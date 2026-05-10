<?php

    $host = 'localhost';
    $db_name = 'db_camisa';
    $port = '3307';
    $usuario = 'root';
    $senha = 'usbw';
    $endereco = "mysql:host=$host;dbname=$db_name;port=$port";

    try {
        $conn = new PDO($endereco, $usuario, $senha);
    } catch (PDOException $e) {
        error_log($e->getMessage(), 3, __DIR__  . "/erros.log");
        echo 'Erro na conecxao!';
    }
    //o meu comuptador ta com um problema no mysql, então fiz um codigo para criar a tabela automaticamnete caso não exitir ou não concetar
        $sql = "
        USE db_camisa;
        CREATE TABLE camisa(
             id INT AUTO_INCREMENT PRIMARY KEY,
             cor VARCHAR(50),
             tamanho VARCHAR(10)
        );
    ";

    $conn->exec($sql);

?>