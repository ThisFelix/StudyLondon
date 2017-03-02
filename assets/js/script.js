function cadastrar() {
    var url = 'editaTrabalho.php';
    var method = 'POST'
    $.ajax({
        url: url
        , method: method
        , success: 
        function (data) {
            // Digite aqui o que fazer com a resposta
            console.log(data);
            if( data == 'True'){
            $("#sucessoModal").html(resp);
            $("#sucessoModalBody").modal('show');
        }}
    });
}