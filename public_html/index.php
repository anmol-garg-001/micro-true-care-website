<!doctype html>
<html lang="en">

<head>
    <title>Welcome to MicroTrueCare</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/new-jq-file.js"></script>
    <script src="js/bootstrap.js"></script>


</head>
<style>
    body {
        background-color: #232F3E;
    }

    #ourServices {
        color: whitesmoke;
        font-style: italic;
        font-weight: bold;
        font-size: 40px;
    }

    #ourServicesBox {
        background-color: #232F3E;
    }

    #ourServicesBox .card {
        float: left;
        margin: auto;
    }

    #ourServices_cards {
        background-color: #232F3E;
    }

    /*
    .card img:hover {
        transform: scale(1.5);
        transition: ease all 1.3s;

    }*/
    nav {
        background-color: #232F3E;
    }

    nav a {
        color: whitesmoke;
    }

    #navbar-collapse-button {
        color: white;
    }

    .card-body {
        background-color: #232F3E;
        color: whitesmoke;
    }

    .card {
        border: 0px #232F3E;
        margin-left: 50%;
        margin: auto;
    }

    .worker-apply card-img {
        border-image: url("pics/photo-1486312338219-ce68d2c6f44d.jpeg");
        background-size: contain;
        background-attachment: fixed;
    }

    @media only screen and (max-width:700px) {
        .worker-apply-img {
            width: 100%;
            height: 200px;
        }
    }

    @media only screen and (min-width:700px){
        .worker-apply .card-title{
            margin-top: 3rem !important;
        }
        .worker-apply .card-text{
            margin-top: 0.5rem !important;
        }
    }
    .copyright {
        color: whitesmoke;
        /*background-color: red;*/
        margin-bottom: 0px;
    }
    .modal-content{
        background-color: #232F3E;
        color: whitesmoke;
    }

</style>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="index.php">
                MicroTrueCare.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="navbar-collapse-button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="customer_signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="customer_login.php">Customer</a>
                            <a class="dropdown-item" href="worker_login.php">Employee</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="admin_login.php">Administrator</a>
                        </div>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reach Us</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About Us</a>
                    </li>
                </ul>
                <!--<button class="btn btn-outline-light my-2 my-sm-0" type="button" data-toggle="modal" data-target="#exampleModalCenter">Buy Website</button>-->

            </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="pics/photo-1555421689-3f034debb7a6_Fotor.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Connie Elder</h5>
                        <p>“Excellent customer service is the number one job in any company! It is the personality of the company and the reason customers come back. Without customers there is no company!”</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="pics/photo-1526948128573-703ee1aeb6fa_Fotor.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ken Blanchard</h5>
                        <p>“Just having satisfied customers isn’t good enough anymore. If you really want a booming business, you have to create raving fans.”</p>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="pics/photo-1526948531399-320e7e40f0ca_Fotor.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Shep Hyken</h5>
                        <p> “The key is when a customer walks away, thinking ‘Wow, I love doing business with them, and I want to tell others about the experience.’”</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="pics/photo-1556740772-1a741367b93e_Fotor.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Maya Angelou</h5>
                        <p>“People will forget what you said. They will forget what you did. But they will never forget how you made them feel.”</p>

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div id="ourServicesBox" class="">
            <div id="ourServices">
                <center>Our Services</center>
            </div>
            <div class="row row-cols-1 row-cols-md-1 card-deck">

                <div class="card mb-3 text-center" style="width: 18rem;">
                    <img src="pics/d2dservice%20(2).jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Doorstep Service</h5>
                        <p class="card-text">We always avail the service at your doorstep no matter what the problem is.</p>
                    </div>
                </div>

                <div class="card mb-3 text-center" style="width: 18rem;">
                    <img src="pics/multilingual_customer_support_WIDE.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">24X7 Support</h5>
                        <p class="card-text">We will always listen to your request everyday and at any time of the day.</p>
                    </div>
                </div>

                <div class="card mb-3 text-center" style="width: 18rem;">
                    <img src="pics/photo-1556745753-b2904692b3cd.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Free Service</h5>
                        <p class="card-text">If not necessary then we will not charge you anything for the service.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="worker-apply">
            <div class="card bg-dark text-white text-center">
                <!--<span class="card-img"></span>-->
                <img src="pics/photo-1499750310107-5fef28a66643_Fotor.jpg" class="card-img worker-apply-img img-fluid" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title ">Join MicroTrueCare</h5>
                    <p class="card-text ">Click on the button below to join MicroTrueCare or Login if you are already a customer.</p>
                    <a href="customer_signup.php" class="btn mt-1 btn-outline-light ">Join Now</a>
                    <a href="customer_login.php" class="btn mt-1 btn-outline-light ">Login Now</a>
                </div>
            </div>
        </div>
        <div class="worker-apply">
            <div class="card bg-dark text-white text-center">
                <!--<span class="card-img"></span>-->
                <img src="pics/photo-1547447175-a68d11e30d6b_Fotor.jpg" class="card-img worker-apply-img img-fluid" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title  ">Apply as a worker</h5>
                    <p class="card-text ">If you wish to apply as a worker for MicroTrueCare.com then you can Contact our Administartor.</p>
                    <a href="tel:+919056549331" class="btn mt-1 btn-outline-light ">Contact Now</a>
                    <a href="mailto:garganmol53@gmail.com" class="btn mt-1 btn-outline-light ">Email Now</a>
                </div>
            </div>
        </div>
        <div class="text-center copyright text-muted">
            <p>Copyrights Reserved 2020 @Anmol_Garg MicroTrueCare.com All rights reserved.</p>
        </div>
    </div>
    

    <!-- Modal -->
    <!--<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
    <!--    <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--        <div class="modal-content">-->
    <!--            <div class="modal-header">-->
    <!--                <h5 class="modal-title" id="exampleModalCenterTitle">Buy This Website</h5>-->
    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                    <span aria-hidden="true">&times;</span>-->
    <!--                </button>-->
    <!--            </div>-->
    <!--            <div class="modal-body">-->
    <!--                If you want to buy this website then you can contact the owner of the website Mr. Anmol Garg via email or you can call him.-->
    <!--            </div>-->
    <!--            <div class="modal-footer">-->
    <!--                <a href=""><button type="button" class="btn btn-outline-light" >Email Now</button></a>-->
    <!--                <a href=""><button type="button" class="btn btn-outline-light">Contact Now</button></a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</body>

</html>
