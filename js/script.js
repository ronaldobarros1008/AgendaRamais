function fn_excluir(){
    $('.form_excluir').submit(function(){
        return confirm("Click Ok para continuar?");
    });
}

function load_modal(nome, ramal, email, id){
    $('#text_nome').val(nome);
    $('#text_ramal').val(ramal);    
    $('#text_email').val(email);
    $('#id_uii').val(id);
}

$(document).ready(function(){    

    var $seuCampoFone = $("#fone");
    $seuCampoFone.mask('9999');
   
});

$(document).ready(function(){    

    var $seuCampoFone = $("#text_ramal");
    $seuCampoFone.mask('9999');
   
});






