


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Camisas</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

    // Função para registrar
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
    $(document).on('click', '.excluir', function () {

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
    <h1>Registrr camisa</h1>

  

        <input type="text" id="Color" placeholder="Cor da camisa">

        <select id="Tamanho">
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
        </select>
        

        <button type="button" id="RegistrarBtn">Registrar</button>

        <!--<<button type="button" id="ExibirBtn1">Exibir</button> -->
        <!--<button type="button" id="ExibirBtn2">Exibir 2</button> -->



    <div id="Resposta">
        <?php
            include 'select.php';
            echo exibir();
        ?>

    </div>
     <!--<div id="Exibir2"></div> -->

</body>

</html>