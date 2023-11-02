var nullValue= document.querySelectorAll('.nullValue');
var paraAlert= document.querySelector('#paraAlert');
var newPass= document.querySelector('#newPass');
var confPass= document.querySelector('#confPass');
var oldPass= document.querySelector('#oldPass');
function resetBtnFunc(){
    for(i=0; i<nullValue.length; i++){
        nullValue[i].value = "";
    }
    paraAlert.innerHTML= "";
}
function submitPassword(){
    var err= 0;
    var old_password = document.forms['formSub']["oldPassword"].value;
    var new_password = document.forms['formSub']["newPassword"].value;
    var conf_password = document.forms['formSub']["confirmPassword"].value;
    checkPassFun(conf_password, new_password, old_password);
}
function checkPassFun(password, newPass, oldPass){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token-password-change"]').attr('content')
            }
        });
        $.ajax({
            url: '/password-check-change',
            method: 'post',
            data: { confirmPassword: password, newPassword: newPass, oldPassword: oldPass},
            success: function (pop) {
                $('#paraAlert').html(pop);
                if (pop.success != '') {
                    $('#paraAlert').html(pop.success);
                }
            },
            error: function(pop){
                console.log(pop);
            }
        });
}