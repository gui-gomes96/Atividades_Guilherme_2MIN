<?php
// Inclui a sua conexão com o banco de dados (ajuste o nome se necessário)
include 'conecta.php';

// Verifica se os dados necessários foram enviados via POST
if (isset($_POST['id']) && isset($_POST['cor']) && isset($_POST['tamanho'])) {
    
    // Armazena os dados recebidos em variáveis
    $id = $_POST['id'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];

    try {
        // Prepara a query SQL de atualização de forma segura
        $sql = "UPDATE tb_camisa SET cor = :cor, tamanho = :tamanho WHERE cd_camisa = :id";
        $stmt = $conn->prepare($sql);
        
        // Executa passando os valores correspondentes aos parâmetros
        $executou = $stmt->execute([
            ':cor'     => $cor,
            ':tamanho' => $tamanho,
            ':id'      => $id
        ]);
        
        // Se a query deu certo, responde com sucesso
        if ($executou) {
            echo "Camiseta atualizada com sucesso!";
        } else {
            echo "Erro: Não foi possível atualizar os dados.";
        }

    } catch (PDOException $e) {
        // Exibe o erro técnico caso aconteça alguma falha no banco de dados
        echo "Erro no banco de dados: " . $e->getMessage();
    }

} else {
    // Resposta caso alguém tente acessar o arquivo diretamente sem enviar dados
    echo "Dados incompletos enviados.";
}
?>