<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- all links-- -->
     @include('external-links.links')
    <!-- ------------->
    <link rel="stylesheet" href="{{URL::asset('css-container/loginPage.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css-container/loginPageSec.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css-container/registrationAndOther.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css-container/password_change.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css-container/graphAndMessage.css')}}">

    
    <title>Dashboard</title>
</head>
<body>
    <div class="navbarMainContainer">
        <div class="fullBurgerDiv" style="z-index: 7;">
            <!-- ------------------log out html----------------- -->
            <div id="overlay" style="width:100%; height:100vh; display:none;
                background-color: rgba(137, 135, 135, 0.016); position:fixed; top: 0; left: 0;"
             onclick="overlayoff()"></div>
            <div class="logoutClipDiv">
                <div class="chip" onclick="logOutBlockFun();">
                    <img src="" alt="Person" width="45" height="45">
                
                    <button style="border: none; display: inline-flex; rotate: 90deg; 
                        margin-left: 0px; font-size: 14px; background-color: transparent;" >&#10095;
                    </button>
                </div>
                <div id="logoutBoxContainer" class="logoutBoxContainer" style="z-index: 1400;">
                    <div class="firstLogoutDiv">
                        <img src='{{URL::asset("$user_about->photo")}}' width="60" height="60" alt="Student" style="border-radius: 49%;">
                        <span style="height: auto; margin-left: 40px;">
                            <div>{{$user_about->Name}}</div>
                            <div>{{$user_about->registrationNo}}</div>
                            <div style="text-transform: capitalize;">
                                {{$class_name}}
                            </div>
                        </span>
                    </div>
                    <div class="secLogoutDiv">
                        <button class="buttonLogout1" onclick="buttonLogoutBox();">Log out</button>
                        <button class="buttonLogout2" onclick="changePassNew();">Change Password</button>
                    </div>
                </div>
                <span class="chipsideText">Papapa</span>
            </div>
            <!-- -------------------------------------------------->
        </div>
        <div class="navBurgerDiv" style="z-index: 7;">
            <button class="internalNavBurger" id="navBurgerButton" onclick="navBurgerFunc()">
                    <li></li>
                    <li></li>
                    <li></li>
            </button>
        </div>
        <div class="hidingAllCanvas">
            <div class="leftOffcanvasNav">
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(0, 'Dashboard')"><img style="rotate: 1deg;" src="websiteImages\icons8-link-50.png" width="22px" height="20px"><span class="closeBoxFont" style="font-weight: 400;"> Dashboard <span class="symbolSideMenu" style="font-weight: lighter;"></span></span></span>
                    <div class="leftCanvInsideBtn" style="margin:0; padding: 0;">
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(1)"><img src="websiteImages\icons8-rocket-50.png" width="22px" height="20px"><span class="closeBoxFont">Registration <span class="symbolSideMenu" style="font-weight: lighter;">&#10095;</span></span></span>
                    <div class="leftCanvInsideBtn">
                        <!-- hidden buttons in left canvas -->
                        <button class="btnAllClass" onclick="internalButtons('AcademicRegistration')"> Academic Registration</button>
                        <button class="btnAllClass" onclick="internalButtons('RegistrationReceipt')"> Registration Receipt</button>
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(2)"><img src="websiteImages\icons8-rocket-50.png" width="22px" height="20px"><span class="closeBoxFont"> Main Account<span class="symbolSideMenu" style="font-weight: lighter;">&#10095;</span></span></span>
                    <div class="leftCanvInsideBtn">
                        <!-- hidden buttons in left canvas -->
                        <button class="btnAllClass" onclick="internalButtons('myProfile')"> My Profile</button>
                        <button class="btnAllClass" onclick="attendanceButtonFunction()">Attendence</button>
                        <button class="btnAllClass" onclick="internalButtons()"> Leave Request</button>
                        <button class="btnAllClass" onclick="internalButtons('TimeTable')"> Time Table</button>
                        <button class="btnAllClass" onclick="internalButtons()"> Syllabus</button>
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(3)"><img src="websiteImages\icons8-rocket-50.png" width="22px" height="20px"><span class="closeBoxFont"> My Faculty <span class="symbolSideMenu" style="font-weight: lighter;">&#10095;</span></span></span>
                    <div class="leftCanvInsideBtn">
                        <!-- hidden buttons in left canvas -->
                        <button class="btnAllClass" onclick="internalButtons('MyAdvisor')"> My Class Advisor</button>
                        <button class="btnAllClass" onclick="internalButtons('MyPrincipal')"> My Principal</button>
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(4)"><img src="websiteImages\icons8-rocket-50.png" width="22px" height="20px"><span class="closeBoxFont"> Fee Details <span class="symbolSideMenu" style="font-weight: lighter;">&#10095;</span></span></span>
                    <div class="leftCanvInsideBtn">
                        <!-- hidden buttons in left canvas -->
                        <button class="btnAllClass" onclick="internalButtons('AcademicFees')"> Academic Fees</button>
                        <button class="btnAllClass" onclick="internalButtons('BusFees')"> Bus Fees</button>
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(5)"><img  style="rotate: 1deg;" src="websiteImages\icons8-link-50.png" width="22px" height="20px"><span class="closeBoxFont"> Club Registration <span class="symbolSideMenu" style="font-weight: lighter;"></span></span></span>
                    <div class="leftCanvInsideBtn" style="margin:0; padding: 0;">
                    </div>
                </div>
                <div class="leftOffNavDivs">
                    <span onclick="allButtonOfNav(6)"><img src="websiteImages\icons8-rocket-50.png" width="22px" height="20px"><span class="closeBoxFont"> Result <span class="symbolSideMenu" style="font-weight: lighter;">&#10095;</span></span></span>
                    <div class="leftCanvInsideBtn">
                        <!-- hidden buttons in left canvas -->
                        <button class="btnAllClass" onclick="internalButtons('MonthlyExam')">Monthly Exam Result</button>
                        <button class="btnAllClass" onclick="internalButtons('OnlineExam')">Online Exam Result</button>
                        <!-- <button class="btnAllClass" onclick="internalButtons()">Annual Exam Result</button> -->
                    </div>
                </div>
                <div class="leftOffNavDivs">
                <span onclick="allButtonOfNav(7, 'OnlineTest')"><img style="rotate: 1deg;" src="websiteImages\icons8-link-50.png" width="22px" height="20px"><span class="closeBoxFont" style="font-weight: 400;"> Online Test <span class="symbolSideMenu" style="font-weight: lighter;"></span></span></span>
                    <div class="leftCanvInsideBtn" style="margin:0; padding: 0;">
                    </div>
                </div>
            </div>
        </div>
        
            <!----- loader---- -->
            <div class="loaderMain" id="loaderMainId" style="z-index: 6;">
                <div class="loaderContainer">
                    <div class="spinner-border text-info" style="width: 50px; height: 50px; border-width: 7px;"></div>
                    <img src="websiteImages/Infinity-1.2s-215px.gif" alt="LOADING..." width="80" height="80">
                </div>
            </div>
        <div class="allContentMainDiv" id="showAllContentMainDiv">

        </div>
    </div>

    <script src="{{URL::asset('js-container/dashboardPage.js')}}"></script>
</body>
</html>
<?php 
    // }
    // else{
    //     echo "<script>window.location.replace('newSch.php')</script>";
    // }
?>



