// alert('To Log in This Website, Enter \nRegistration Number - 456789 \nPassword - 456789 ' );
// // Disable right-click
// document.addEventListener('contextmenu', (e) => e.preventDefault());

// function ctrlShiftKey(e, keyCode) {
//   return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
// }

// document.onkeydown = (e) => {
//   // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
//   if (
//     event.keyCode === 123 ||
//     ctrlShiftKey(e, 'I') ||
//     ctrlShiftKey(e, 'J') ||
//     ctrlShiftKey(e, 'C') ||
//     (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
//   )
//     return false;
// };

// Nav bar toggle in javascript code-------
var x = window.matchMedia("(min-width: 700px)");
var bodyElem = document.querySelector('.navber-internal-comp');
window.addEventListener('scroll', () => {
    bodyElem.classList.toggle('toggleClassList', window.scrollY > 0);
    myFunctionCall(x);
    // x.addListener(myFunction)
});
function myFunctionCall(x) {
    if (x.matches) { bodyElem.classList.toggle('toggleAnimation', window.scrollY < 1); }
    else { bodyElem.classList.remove('toggleAnimation', window.scrollY < 1); }
}
// onclick About us scroll the webpage
function aboutUsScroll(scrValue, btnValue) {
    // console.log(btnValue);
    $('#loaderMainID').show();
    $.ajax({
        url: 'contactNewSch.php',
        method: 'post',
        data: { datavalue: btnValue },
        type: 'html',
        success: function (pop) {
            $('#displayAndFetchDivBlock').html(pop);
            $('#loaderMainID').hide();
                window.scrollTo(0, scrValue);
        }
    });
}
var captchaPass= "";
window.onload= reloadCaptcha();
function reloadCaptcha(){
    $.ajax({
        url: '/captchaReload',
        method: 'get',
        type: 'html',
        success: function (pop) {
            console.log(pop);
            $('#showPhpCaptchaCode').html(pop);
        }
    });
}
function off() {
    document.getElementById("overlay").style.display = "none";
  }
var loginClassSelect= document.querySelector('#login-class-select');
var password= document.querySelector('#login-pass-id');
var loginForgotEmailId= document.querySelector('#login-forgot-email-id');
var registrationNo = document.querySelector('#login-reg-id');
var loginCaptchaId= document.querySelector('#login-captcha-id');

function checkPasswordRecover(param){
    var textMessage= '';
    // if (loginClassSelect.value== "" || registrationNo.value== "") {
    //     textMessage="Please Enter Registration No / Class!";
    // }
    // else if(loginCaptchaId.value.length < 1){
    //     textMessage= "Please Enter The Captcha Code!";
    // }
    // if(textMessage != '' ){
    //     alert(textMessage);
    // }
    // else{
        if(param== 'passRec'){
            ajaxPassRec();
        }
        else if(param== 'login'){
            if(password.value== ""){
                textMessage= "Please Enter Correct Password!";
            }
            else{
                // console.log(loginCaptchaId.value, loginClassSelect.value, registrationNo.value, password.value);
                ajaxAlertOnMain(loginCaptchaId.value,loginClassSelect.value, registrationNo.value, password.value);
            }
        }
    // }
    // if(textMessage != null ){
    //     // alert(textMessage);
    //     loginCaptchaId.value= null;
    //     reloadCaptcha();
    //     ajaxAlertOnMain(textMessage, null, null, null);
    // }
}
function ajaxAlertOnMain(captcha, loginClassSelect, registrationNo, password){
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/login_credentials',
        method: 'post',
        data: {captcha: captcha,studentClass:loginClassSelect, registrationNo:registrationNo, password:password},
        type: 'html',
        success: function (pop) {
            loginCaptchaId.value= null;
            $('#showAlertBox').html(pop);
            reloadCaptcha();
            // console.log(pop);
        },
        error: function(pop){
            console.log(pop);
        }
    });
}
// function ajaxPassRec(){
//     $.ajax({
//         url: 'checkAllLoginInfo.php',
//         method: 'post',
//         data: { datavalue: captchaPass, loginClassSelect:loginClassSelect.value,
//             registrationNo:registrationNo.value, password:password.value, loginCaptchaId:loginCaptchaId.value,
//             loginForgotEmailId: loginForgotEmailId.value},
//         type: 'html',
//         success: function (pop) {
//             alert(pop);
//             window.location.replace('successfulPage.php');
//         }
//     });
// }
var loginPassText= document.querySelector('#login-forgot-pass');
var loginText= document.querySelector('#loginText');
var loginTextRecover= document.querySelector('#loginTextRecover');
// function refreshLoginPage(){
//     $.ajax({
//         url: '/login-page-box',
//         method: 'get',
//         type: 'html',
//         success: function (pop) {
//             loginCaptchaId.value= null;
//             reloadCaptcha();
//             $('#forgotpasswordId').html(pop);
//         }
//     });
// }
function forgotPassword(){
    $.ajax({
        url: '/forgot-password-page',
        method: 'get',
        type: 'html',
        success: function (pop) {
            loginCaptchaId.value= null;
            reloadCaptcha();
            $('#forgotpasswordId').html(pop);
        }
    });
}