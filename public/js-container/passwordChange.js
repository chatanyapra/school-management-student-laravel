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
var errorarr= ['Old', 'New', 'Confirm'];
function submitPassword(){
    var err= 0;
    var x = document.forms['formSub']["oldPass"].value;
    var y = document.forms['formSub']["newPass"].value;
    var z = document.forms['formSub']["confPass"].value;
    if(x=="" || x== null, y=="" || y== null, z=="" || z== null){
        paraAlert.innerHTML= "* Enter all field's detail";
        err++;
    }
    else if(err==0){
        for(i=0; i<3; i++){
            if(nullValue[i].value.length <= 5){
                err++;
                paraAlert.innerHTML= `* ${errorarr[i]} Password is very short`;
                break;
            }
        }
    }
    if(newPass.value == confPass.value && err==0){
        checkPassFun(confPass.value, newPass.value, oldPass.value);
    }
    else if(newPass.value != confPass.value && err==0){
        paraAlert.innerHTML= "* New and Confirm password are not matching";
    }
}
function checkPassFun(password, newPass, oldPass){
        $.ajax({
            url: 'queryRunningPage.php',
            method: 'post',
            data: { passValue: password, newPassVal: newPass, oldPassVal: oldPass},
            success: function (pop) {
                console.log(pop);
                $('#paraAlert').html(pop);
            },
            error: function(pop){
                console.log(pop);
            }
        });
}