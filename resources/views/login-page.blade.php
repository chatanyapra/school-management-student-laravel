<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('external-links.links')
    <link rel="stylesheet" href="{{URL::asset('css-container/newSch.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css-container/newSch2.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatanya School</title>
</head>
<body>
    <!-- -------------------alert box------------- -->
    <div id="showAlertBox" style="z-index: 1210;"></div>
    <!-- ---------------------------------------- -->
    <div class="navbar-main-box">
        <div class="navber-internal-comp">
            <div class="burger-main-box btn" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <button class="burger-box-btn">
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                </button>
            </div>
            <div class="nav-Logo">
                <div class="logoText">
                    Chatanya
                    <div class="logoLineMake"></div>
                </div>
                <img class="img-logo-class" src="{{URL::asset('assets/websiteImages/newLionLogoPng.png')}}" alt="Logo" />
            </div>
            <div class="nav-element">
                <button class="nav-link-text" value="home" onclick="aboutUsScroll(0, this.value)">
                    <h6>Home</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
            <div class="nav-element">
                <button class="nav-link-text" value="about" onclick="aboutUsScroll(1450, this.value)">
                    <h6>About us</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
            <div class="nav-element">
                <button class="nav-link-text" value="faculty" onclick="aboutUsScroll(1450, this.value)">
                    <h6>Faculty</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
            <div class="nav-element">
                <button class="nav-link-text" value="admission" onclick="aboutUsScroll(1450, this.value)">
                    <h6>Admission</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
            <div class="nav-element">
                <button class="nav-link-text" value="cont" onclick="aboutUsScroll(1450, this.value)">
                    <h6>Contact us</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
            <div class="nav-element">
                <button class="nav-link-text" data-bs-toggle="modal" data-bs-target="#myModal">
                    <h6>Log in</h6>
                </button>
                <div class="nav-bt-line"></div>
            </div>
        </div>
    </div>
    <!-- Icons to direct login to social media page of Right side -->
    <div class="icon-bar" id="icon-bar-leftSide">
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="google"><i class="fa fa-google"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
        <a onclick="document.querySelector('#icon-bar-leftSide').style.display='none';" class="linkedin">&#9587;</a>
    </div>
    <!-- this is for responsive websites offcanvas or sidebar-->
    <div class="offcanvas offcanvas-start bg-white offcanvas-lg w-75
            closeOffcanvas offcanMainBox" id="demo">
        <div class="offcanvas-header">
            <div class="nav-Logo transLogoNav">
                <div class="logoText newLogoText">
                    Chatanya
                    <div class="logoLineMake"></div>
                </div>
                <img class="img-logo-class" src="{{URL::asset('assets/websiteImages/newLionLogoPng.png')}}" alt="Logo" />
            </div>
            <button type="button" class="btn-close w-25px" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column">
            <div class="contBtnBox"><button class="nav-link-Button" data-bs-dismiss="offcanvas" data-bs-toggle="modal"
                    data-bs-target="#myModal">Log in</button><span class="arrowOnOffcanvas">&#8250;</span></div>
            <div class="contBtnBox"><button class="nav-link-Button" data-bs-dismiss="offcanvas" value="about"
                    onclick="aboutUsScroll(2630, this.value)">About us</button><span
                    class="arrowOnOffcanvas">&#8250;</span></div>
            <div class="contBtnBox"><button class="nav-link-Button" data-bs-dismiss="offcanvas" value="faculty"
                    onclick="aboutUsScroll(2600, this.value)">Faculty</button><span
                    class="arrowOnOffcanvas">&#8250;</span></div>
            <div class="contBtnBox"><button class="nav-link-Button" data-bs-dismiss="offcanvas" value="admission"
                    onclick="aboutUsScroll(2600, this.value)">Admission</button><span
                    class="arrowOnOffcanvas">&#8250;</span></div>
            <div class="contBtnBox"><button class="nav-link-Button" data-bs-dismiss="offcanvas" value="cont"
                    onclick="aboutUsScroll(2600, this.value)">Contact
                    Us</button><span class="arrowOnOffcanvas">&#8250;</span></div>
        </div>
    </div>
    <div class="boxShow">
        <img id="imageOpaque" src="{{URL::asset('assets/websiteImages/graduation-students.jpg')}}" alt="Students
                image">
    </div>
    <div class="loginBoard">
        <h3>Students Login</h3>
        <button type="submit" class="clickLoginBox" data-bs-toggle="modal" data-bs-target="#myModal">CLICK TO
            LOGIN</button>
    </div>
    <!------------------ The Modal==----------------------- -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0;" id="forgotpasswordId">
                @include('small-files.login-box')
            </div>
        </div>
    </div>


    <div class="allRelatedInfoBox">
        <h1 style="margin-bottom: 20px;">About <strong style="color: rgb(63,175, 43);">School</strong> Facility</h1>
        <div class="twoCardConatinTogether">
            <!-- card1 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
            <!-- card2 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
        </div>
        <div class="twoCardConatinTogether">
            <!-- card3 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
            <!-- card4 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
        </div>
        <div class="twoCardConatinTogether">
            <!-- card5 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
            <!-- card6 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
        </div>
        <div class="twoCardConatinTogether">
            <!-- card7 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
            <!-- card8 -->
            <div class="cardOfInfo">
                <div class="containerOfDetails">
                    <h4><b>Advertisement Photo</b></h4>
                    <p>Write Something</p>
                </div>
            </div>
        </div>
    </div>

    <div class="loaderMain" id="loaderMainID" style="z-index: 1000;">
        <div class="loaderContainer">
            <div class="spinner-border text-info" style="width: 50px; height: 50px; border-width: 7px;"></div>
            <img src="websiteImages/Infinity-1.2s-215px.gif" alt="LOADING..." width="80" height="80" style="">
        </div>
    </div>
    <!-- About us block Display none--- -->
    <div class="displayAndFetchDivBlock" id="displayAndFetchDivBlock" width="100%">
        <!-- Showing Information on click the buttons -->
    </div>

    <!-- -------------------------------School Images Scrolling-------------------------------- -->
    <div class="facultyMainBox" style="text-align: center;">
        <h1><span style="color: rgb(63,175, 43);">ADMISSION</span> Details</h1>
        <p style="font-weight: lighter; color: rgb(150, 150, 150);">Feel free to call us.</p>
        <h3>Admission Opened : <span style="color: grey"> 00/00/2023</span>
            <br>Admission Close : <span style="color: grey">00/00/2023</span>
        </h3>

        <div class="admissionMainBlock">
            <div class="containBlockInternal">
                <!-- ------------------------------- -->
                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators/dots -->
                    <div class="carousel-indicators circularButton">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{URL::asset('assets/websiteImages/graduation-students.jpg')}}" width="100%" height="100%"
                                alt="Los Angeles" class="d-block" style="min-height: 250px;">
                            <div class="carousel-caption">
                                <p>We had such a great time in School!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::asset('assets/websiteImages/graduation-students.jpg')}}" width="100%" height="100%" alt="Chicago"
                                class="d-block" style="min-height: 250px;">
                            <div class="carousel-caption">
                                <p>Thank you, Chatanya!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::asset('assets/websiteImages/graduation-students.jpg')}}" width="100%" height="100%" alt="New York"
                                class="d-block" style="min-height: 250px;">
                            <div class="carousel-caption">
                                <p>We love this Place!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls/icons -->
                </div>
                <!-- ------------------------------- -->
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------------------- -->

    <!-- Footer of website  -->
    <footer class="footerClassLast">
        <div class="footerBoxEnd">
            <div>
                <h6>GET IN TOUCH</h6>
                <p style="font-size: 13px;"><strong>Address : </strong>Insert some address here <br>
                    Phone : +91-12345-67890 <br>
                    Email : FalanaDhimkana@gmail.com
                </p>
            </div>
        </div>
        <div class="footerBoxEnd">
            <a href="#"><i class="facebook fa fa-facebook"></i></a>
            <a href="#"><i class="twitter fa fa-twitter"></i></a>
            <a href="#"><i class="google fa fa-google"></i></a>
            <a href="#"><i class="linkedin fa fa-linkedin"></i></a>
            <a href="#"><i class="youtube fa fa-youtube"></i></a>
        </div>
    </footer>

    <script type="text/javascript" src="{{URL::asset('js-container/newSch.js')}}"></script>

</body>

</html>