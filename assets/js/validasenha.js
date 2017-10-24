

$('#repeteSenha').click(function() {
$('#repeteSenha').val() != $('#senha').val() ? $('#status-repeteSenha').html('Confirmação não pode ser diferente da senha<br>') : $('#status-repeteSenha').html(' Ok!<br>');
if($('#repeteSenha').val() != $('#senha').val()) $('#repeteSenha').val('');
if($('#repeteSenha').val() != $('#senha').val()) $('#repeteSenha').focus();
if($('#repeteSenha').val() != $('#senha').val()) $('#status-repeteSenha').css("color","red");
});

