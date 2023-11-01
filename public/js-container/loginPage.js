// Disable right-click
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

var navBurgerButton= document.querySelector('#navBurgerButton');
var leftOffcanvasNav= document.querySelector('.leftOffcanvasNav');
var navBurgerDiv= document.querySelector('.navBurgerDiv');
var hidingAllCanvas= document.querySelector('.hidingAllCanvas');
var allContentMainDiv= document.querySelector('.allContentMainDiv');
var btnAllClass= document.querySelectorAll('.btnAllClass');
var closeBoxFont= document.querySelectorAll('.closeBoxFont');
var symbolSideMenu= document.querySelectorAll('.symbolSideMenu');
var leftCanvInsideBtn= document.querySelectorAll('.leftCanvInsideBtn');
var incNo=1;
var widthOfWindow=200;
window.onload= (()=>{
    widthOfWindow= window.innerWidth;
    if(widthOfWindow <= 900){
        hidingAllCanvas.classList.add("hidingAllCanvasToggle");
    }
    allContentMainDiv.classList.add("allContentMainDivToggle");
    ajaxFetchData('Dashboard');
});
window.addEventListener('resize', ()=>{
    incNo=1;
    widthOfWindow= window.innerWidth;
    leftOffcanvasNav.classList.remove("leftOffcanvasNavToggle");
    hidingAllCanvas.classList.remove("hidingAllCanvasToggle");
    for(i=0; i<leftCanvInsideBtn.length; i++){
        leftCanvInsideBtn[i].classList.remove("toggleAllNavItems");
        closeBoxFont[i].classList.remove("toggleAllNavItems");
    }
    hidingAllCanvas.classList.remove("hidingAllCanvasToggle");
    if(widthOfWindow <= 900){
        hidingAllCanvas.classList.add("hidingAllCanvasToggle");
    }
    toggleBurgerFunc(incNo);
});
function navBurgerFunc(){
    incNo++;
    toggleBurgerFunc(incNo);
    if(widthOfWindow >= 901){
        leftOffcanvasNav.classList.toggle("leftOffcanvasNavToggle"); 
    }
    else{
        hidingAllCanvas.classList.toggle("hidingAllCanvasToggle");
    }
    for(i=0; i<leftCanvInsideBtn.length; i++){
        closeBoxFont[i].classList.toggle("toggleAllNavItems");
    }
}
function toggleBurgerFunc(incNo){
    if(incNo%2==0){
        navBurgerButton.classList.toggle("toogleNavburgerProperty");
        navBurgerDiv.classList.toggle("leftOffcanvasNavToggle");
        allContentMainDiv.classList.remove("allContentMainDivToggle");
        // console.log('0')
    }
    else{
        navBurgerButton.classList.remove("toogleNavburgerProperty");
        navBurgerDiv.classList.remove("leftOffcanvasNavToggle");
        allContentMainDiv.classList.add("allContentMainDivToggle");
        // console.log('1')
    }
}
function allButtonOfNav(classNm, fetch){
    leftCanvInsideBtn[classNm].classList.toggle("heightToggleBox");
    closeBoxFont[classNm].classList.toggle("closeBoxFont-color");
    symbolSideMenu[classNm].classList.toggle("togglesymbolSideMenu");
    if(leftCanvInsideBtn[classNm].style.display==="block"){
        leftCanvInsideBtn[classNm].style.display="none";
    }
    else{
        leftCanvInsideBtn[classNm].style.display="block";
    }
    if(fetch){
        ajaxFetchData(fetch);
        console.log("pop")
    }
}
function ajaxFetchData(fetch){
    $("#loaderMainId").show();
    var urlOfPage;
    if(fetch==="Dashboard"){
        urlOfPage= 'graphAndMessage.php';
    }
    if(urlOfPage!=null){
        $.ajax({
            url: urlOfPage,
            method: 'post',
            data: { datavalue: fetch },
            success: function (pop) {
                $('#showAllContentMainDiv').html(pop);
                $("#loaderMainId").hide();
            }
        });
    }
    else{
        alert("coming soon...");
    }

}
function internalButtons(retrive){
    if(retrive =="" || retrive  == null){
        alert('Coming soon!');
    }
    else{
        if(retrive=="RegistrationReceipt"){
            window.open('registrationReceipt.php', "MsgWindow","location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1220,height=900'");
        }
        else if(retrive=="MonthlyExam"){
            window.open('resultOfStudent.php', "MsgWindow","location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1220,height=900'");
        }
        else{
            ajaxRetrieveDataNew(retrive);
        }
    }
}
function ajaxRetrieveDataNew(retrive){
    $("#loaderMainId").show();
    $.ajax({
        url: 'registrationAndOther.php',
        method: 'post',
        data: { datavalues: retrive },
        success: function (pop) {
            // console.log('jj')
            $('#showAllContentMainDiv').html(pop);
            $("#loaderMainId").hide();
        }
    });
}
// -------------logout js--------------------

var navBurgerDiv= document.querySelector('.navBurgerDiv');
function logOutBlockFun(){
    var logoutBox= document.getElementById('logoutBoxContainer');
    overlayon();
    logoutBox.classList.toggle('logoutBoxContainerToggle');
}
function overlayon() {
    document.getElementById("overlay").style.display = "block";
}

function overlayoff() {
    logOutBlockFun()
    document.getElementById("overlay").style.display = "none";
}
function buttonLogoutBox(){
    $("#loaderMainId").show();
    $.ajax({
        url: 'logOutPage.php',
        method: 'post',
        success: function () {
            $("#loaderMainId").hide();
            window.location.replace('newSch.php');
        }
    });
}
function changePassNew(){
    var logoutBox= document.getElementById('logoutBoxContainer');
    logoutBox.classList.remove('logoutBoxContainerToggle');
    document.getElementById("overlay").style.display = "none";
    $("#loaderMainId").show();
    $.ajax({
        url: 'passwordChange.php',
        method: 'post',
        success: function (pop) {
            $('#showAllContentMainDiv').html(pop);
            $("#loaderMainId").hide();
        }
    });
}