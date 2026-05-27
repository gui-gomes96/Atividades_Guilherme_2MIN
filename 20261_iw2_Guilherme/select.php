<?php 
function exibir(){ 
    include 'conecta.php'; 
    
    $resultado = '<table class="table table-bordered table-striped table-hover">'; 
    $resultado .= '<thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cor</th>
                            <th>Tamanho</th>
                        </tr>
                   </thead>';
    $resultado .= '<tbody>';
    $stmt = $conn->query("SELECT * FROM tb_camisa"); 
    while($row = $stmt->fetchObject()){ 
        $resultado .= '<tr> 
                            <td>'. $row->cd_camisa .'</td> 
                            <td>'. $row->cor .'</td> 
                            <td>'. $row->tamanho .'</td> 
                            <td> 
                                <button class="btn btn-danger btn-sm deletar" id="'. $row->cd_camisa .'">Excluir</button> 
                                <button class="btn btn-primary btn-sm editar" id="'. $row->cd_camisa .'">Editar</button> 
                            </td> 
                       </tr>'; 
    } 
    
    $resultado .= '</tbody></table>'; 
    return $resultado; 
} 
?>
