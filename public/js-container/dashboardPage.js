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
function attendanceButtonFunction() {
    $("#loaderMainId").show();
    $.ajax({
        url: '/user-attendance-page',
        method: 'get',
        success: function (pop) {
            $('#showAllContentMainDiv').html(pop);
            $("#loaderMainId").hide();
        },
        error:function(pop){
            console.log(pop);
        }
    });
}
function selectedSubject(subject){
    $("#loaderMainId").show();
    $.ajax({
        url: '/select-att-user',
        method: 'get',
        data: { subject_name: subject },
        success: function (pop) {
            $('#show-attendance-Box').html(pop);
            $("#loaderMainId").hide();
        },
        error:function(pop){
            console.log(pop);
        }
    });
}
function ajaxFetchData(fetch){
    $("#loaderMainId").show();
    var urlOfPage;
    if(fetch==="Dashboard"){
        urlOfPage= '/dashboard-front-ui';
    }
    if(urlOfPage!=null){
        $.ajax({
            url: urlOfPage,
            method: 'get',
            data: { datavalue: fetch },
            success: function (pop) {
                $('#showAllContentMainDiv').html(pop);
                $("#loaderMainId").hide();
            },
            error:function(pop){
                console.log(pop);
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
        if(retrive=="OnlineExam"){
            alert('Coming soon!');
        }
        else{
            ajaxRetrieveDataNew(retrive);
        }
        // window.open('registrationReceipt.php', "MsgWindow","location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1220,height=900'");
    }
}
function ajaxRetrieveDataNew(retrive){
    $("#loaderMainId").show();
    $.ajax({
        url: '/academic-registration',
        method: 'get',
        data: { datavalues: retrive },
        success: function (pop) {
            // console.log('jj')
            $('#showAllContentMainDiv').html(pop);
            $("#loaderMainId").hide();
        },
        error: function(pop){
            console.log(pop);
        }
    });
}
// ---------------exam result recipt--------------
function downloadReg_exam(passType){
    // monthlyExam
    // registrationRecipt
    $page_name= '';
    if(passType == 'registrationRecipt'){
        $page_name = '/registration-receipt-page';
    }
    else if (passType == 'monthlyExam') {
        $page_name = '/monthly-exam-page';
    }
    if ($page_name != '') {
        $("#loaderMainId").show();
        $.ajax({
            url: $page_name,
            method: 'get',
            success: function (pop) {
                $("#loaderMainId").hide();
                console.log(pop);
                // window.open($page_name, "MsgWindow","location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=1220,height=900'");
            },
            error: function(pop){
                console.log(pop);
            }
        });
    }
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
        url: '/log-out-user',
        method: 'get',
        type: 'DELETE',
        success: function (pop) {
            $("#loaderMainId").hide();
            window.location.replace(pop);
        },
        error: function(pop){
            console.log(pop);
        }
    });
}
function changePassNew(){
    var logoutBox= document.getElementById('logoutBoxContainer');
    logoutBox.classList.remove('logoutBoxContainerToggle');
    document.getElementById("overlay").style.display = "none";
    $("#loaderMainId").show();
    $.ajax({
        url: '/user-password-change',
        method: 'get',
        success: function (pop) {
            $('#showAllContentMainDiv').html(pop);
            $("#loaderMainId").hide();
        },
        error: function(pop){
            console.log(pop);
        }
    });
}