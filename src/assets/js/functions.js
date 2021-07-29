function refresh(){
    $.ajax({
        url: "../../Validations/list_link.php",
        success: function(result){
            $(".result").html(result);
        },
        error: function(){
            $(".result").html("Error");
        }
    });
}



/* function validaLogin(){
    let usr = document.getElementById('iptUsername');
    let passwd = document.getElementById('iptPassword');

    if(usr.value === '' || passwd.value === ''){
        alert('Favor Preencher os campos!');
    }

}
function validaCadastro(){

    let name = document.getElementById('iptUser');
    let usr = document.getElementById('iptUsername');
    let passwd = document.getElementById('iptPassword');

     if(usr.value === '' || passwd.value === '' || name.value === ''){
        alert('Favor Preencher os campos!');
    }

} */