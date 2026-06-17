<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Camisas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
$(document).ready(function () {

    $(document).on('click', '.editar', function () {

        var idCamisa = $(this).attr('id'); 
        
        $.ajax({

            url: "select_edit.php",
            type: "POST",
            dataType: "json",

            data: {
                id: idCamisa
            }

        }).done(function(resposta){

            $('#ColorEdit').val(resposta.cor);
            $('#TamanhoEdit').val(resposta.tamanho);

            $('#EditarBtn').attr('data-id', idCamisa);

        }).fail(function(){

            alert("Erro ao buscar dados");

        });
            });

    // 2. Envia os dados via AJAX ao clicar em Editar dentro do modal
    $('#EditarBtn').click(function (e) {
        e.preventDefault();

        // Recupera o ID que guardamos no passo anterior
        var id = $(this).attr('data-id'); 
        var cor = $('#ColorEdit').val();
        var tamanho = $('#TamanhoEdit').val();

        if (cor == '') {
            alert('Digite a cor');
            return;
        }

        $.ajax({
            url: "editar.php",
            type: "POST",
            dataType: "html",
            data: {
                id: id,          // Envia o $_POST['id'] para o editar.php
                cor: cor,        // Envia o $_POST['cor']
                tamanho: tamanho // Envia o $_POST['tamanho']
            }
        }).done(function (resposta) {
            alert(resposta); 
            $('#EditModal').modal('hide');
            location.reload(); // Recarrega a página para atualizar a tabela na tela
        }).fail(function (jqXHR, textStatus) {
            console.log("Erro na requisição: " + textStatus);
        });
    });

    // ffeunção para registrar
    $('#RegistrarBtn').click(function (e) {

        e.preventDefault();

        var cor = $('#Color').val();
        var tamanho = $('#Tamanho').val();

        if (cor == '') {
            alert('Digite a cor');
            return;
        }

        $.ajax({

            url: "insert.php",
            type: "POST",
            dataType: "html",

            data: {
                campo1: cor,
                campo2: tamanho
            }

        }).done(function (resposta) {

            $('#Resposta').html(resposta);

        }).fail(function (jqXHR, textStatus) {

            console.log("Erro: " + textStatus);

        });

    });

    // função para excluir
    $(document).on('click', '.deletar', function () {

        var id = $(this).attr('id');

        var confirmar = confirm(
            "Deseja realmente excluir a camisa ID " + id + " ?"
        );

        if(confirmar == false){
            return;
        }

        $.ajax({

            url: "apaga.php",
            type: "POST",
            dataType: "html",

            data: {
                id: id
            }

        }).done(function (resposta) {

            $('#Resposta').html(resposta);

        }).fail(function (jqXHR, textStatus) {

            console.log("Erro: " + textStatus);

        });

    });
});
</script>
</head>


<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Adicionar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Camiseta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <p>Cor da Camiseta </p>
        <input type="text" id="Color" placeholder="Cor da camisa"><br><br>
        <p>Tamanho</p>
            <select id="Tamanho">
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
                <option value="GG">GG</option>
            </select><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="RegistrarBtn">Registrar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Camiseta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <p>Cor da Camiseta </p>
        <input type="text" id="ColorEdit" placeholder="Cor da camisa"><br><br>
        <p>Tamanho</p>
            <select id="TamanhoEdit">
                <option value="P">P</option>
                <option value="M">M</option>
                <option value="G">G</option>
                <option value="GG">GG</option>
            </select><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="EditarBtn">Editar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<div id="Resposta">
    <?php
        include 'select.php';
         echo exibir();
    ?>
 </div>
</body>
</html>