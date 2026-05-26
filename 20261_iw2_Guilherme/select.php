<?php

function exibir(){

    include 'conecta.php';

    $resultado = "<table border='1'>";

    $stmt = $conn->query("SELECT * FROM tb_camisa");

    while($row = $stmt->fetchObject()){

        $resultado .= "
        <tr>
            <td>$row->cd_camisa</td>
            <td>$row->cor</td>
            <td>$row->tamanho</td>
            <td>
                <button class='deletar' id='$row->cd_camisa'>Excluir</button>
                <button class='editar' id='$row->cd_camisa'>Editar</button>
            </td>
        </tr>";
    }

    $resultado .= "</table>";

    return $resultado;
}
?>