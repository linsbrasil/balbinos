
function loginVazio(){
    if(formlogin.email.value =="" || formlogin.email.value == null){
       formlogin.email.focus();
       return false;
    }else{
        return true;
    }
    if(formlogin.senha.value =="" || formlogin.senha.value == null){
       formlogin.senha.focus();
       return false;
    }
    else{
        return true;
    }
}
function reenvioVazio(){
    if(formreenvio.email.value =="" || formlogin.email.value == null){
        return formreenvio.email.focus();
    }
}

function cadastroVazio(){
    if(cadastro.nome.value =="" || cadastro.nome.value == null){
        return cadastro.nome.focus();
    }
    if(cadastro.sobreNome.value =="" || cadastro.sobreNome.value == null){
        return cadastro.sobreNome.focus();
    }
    if(cadastro.nascimento.value =="" || cadastro.nascimento.value == null){
        return cadastro.nascimento.focus();
    }
    if(cadastro.email.value =="" || cadastro.email.value == null){
        return cadastro.email.focus();
    }
        if(cadastro.cargo.value =="" || cadastro.cargo.value == null){
        return cadastro.cargo.focus();
    }
    if(cadastro.plantao.value =="" || cadastro.plantao.value == null){
        return cadastro.plantao.focus();
    }
}

