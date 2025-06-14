<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'db.php';
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <meta name="viewport" content="-------=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a4bf4d7b7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* div{
                border: 1px solid black;
            } */
        .navbar-parent {
            background-color: white;
        }

        .navbar_link_list {
            margin-left: 30%;
            gap: 20px;
        }

        .navbar-nav {
            gap: 20px;
        }

        .navbar-links {
            color: rgb(5, 15, 25);
            font-weight: 500;
            font-size: 15px;
        }

        .registration-buttion {
            display: flex;
        }

        .section1-heading {
            margin-top: 160px !important;
        }

        .section1-card2 {
            gap: 5px;
        }

        .section1-heading>h1 {
            font-size: 62px;
            color: rgb(5, 15, 25);
        }
        .section1-subheading{
            font-size: 20px;
            font-weight: 400;
        }
        .email-action-buttion {
            padding: 9px;
            /* border-radius: 20%; */
            background-color: rgb(0, 82, 255);
            color: white;
            margin-left: 9px;
        }

        .section2 {
            gap: 20px;
        }

        .section2-card2 {
            align-content: center;
        }

        .register-action {
            margin-right: 0px !important;
            padding-right: 0px !important;
        }

        .card-font {
            font-size: 14px;
        }

        p {
            margin-top: 13px;
            margin-bottom: 1rem;
        }

        .blur-load {
            filter: blur(10px);
            opacity: 0;
            transition: filter 1s ease, opacity 1s ease;
        }

        .blur-load.loaded {
            filter: blur(0);
            opacity: 1;
        }

        .fade-up-blur {
            opacity: 0;
            filter: blur(8px);
            transform: translateY(40px);
            transition: all 1s ease;
        }

        .fade-up-blur.visible {
            opacity: 1;
            filter: blur(0);
            transform: translateY(0);
        }
        .navbar-light .navbar-nav .nav-link:hover{
            background-color: blue;
            color: white;
            border-radius: 5px;
        }
        .last-buttion{
            background-color: blue;
            color: white;
            border-radius: 10px;
        }
        .last-buttion:hover{
            color: white;
            background-color: rgba(11, 11, 235, 0.795);
        }
        @media (max-width: 575.98px) {
            .section1-heading {
                margin-top: 85px !important;
        }
            .section1-heading>h1{
                font-size: 36px;
                font-weight: 500;
            }
            .section1-subheading{
                font-size: 14px;
                font-weight: 400;
                margin-top: 15px;
            }
            .section1-para>p{
                font-size: 14px;
                font-weight: 400;
            }
            .notify-buttion{
                margin-top: 10px;
            }
            .section4-content-heading>h1{
                font-size: 22px;
            }
            .section4-content1-para>p{
                font-size: 14px;
                color: red;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-lg-5" href="#" style="color: blue;"><b>Coinbase</b></a>

            <!-- Toggler button for mobile -->
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item"><a href="cryptocurreny.php" class="nav-link">Cryptocurrencies</a></li>
                    <li class="nav-item"><a href="#info-scroll" class="nav-link">Trade</a></li>
                    <li class="nav-item"><a href="#instruction-scroll" class="nav-link">Wallet</a></li>
                    <li class="nav-item"><a href="#participate-scroll" class="nav-link">Security</a></li>
                    <li class="nav-item"><a href="#transaction-scroll" class="nav-link">About</a></li>
                </ul>

                <!-- Login Button (optional collapse) -->
                 <a href="#" class="d-flex"  style="color: black; text-decoration: none;">
                <h6 class="mt-2"><?php echo htmlspecialchars($username); ?>!</h6>
                <div class="ms-1 mt-1 me-2"><i class="fa-solid fa-user"></i></div>
                </a>
            </div>
        </div>
    </nav>

    <div class="container d-flex flex-column flex-lg-row section1-card2">
        <div class="col-12 col-lg-6">
            <div class="section1-card1">
                <div class="section1-heading">
                    <h1 class="fade-up-blur" id="mainHeading">Namaste, India! Meet Coinbase<span class="d-none d-sm-inline">IN</span></h1>
                </div>
                <div>
                    <h3 class="section1-subheading mt-lg-4 fade-up-blur" id="mainPara">Coinbase is the world's safest
                        and most <span class="d-none d-lg-inline"><br></span> trusted platform to buy, sell and<span
                            class="d-none d-lg-inline"><br></span> manage crypto.</h3>
                </div>
                <div class="section1-para mt-lg-3">
                    <p>We're launching soon! Add your email and you'll be the first to <span
                            class="d-none d-lg-inline"><br></span> know when you can join.</p>
                </div>
                <div class="notify-box mt-lg-4 d-flex flex-column flex-lg-row">
                    <div class="col-12 col-lg-6 mt-lg-3">
                        <input type="email" id="email" placeholder="Enter your email"
                            class="form-control">
                    </div>
                    <div>
                        <button class="email-action-buttion mt-lg-3 notify-buttion" onclick="showMessage()">Get Notified</button>
                    </div>
                </div>
                <div class="message text-success fw-bold mt-lg-2" id="message">Thanks. You'll be notified when we officially
                    launch
                    Coinbase in India.
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div>
                <img src="section1-image.avif" height="1000px" width="600px" class="img-fluid mt-lg-5 blur-load "
                    id="myImage">
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-lg-row section2 ms-lg-4">
        <div class="section2-card1 col-12 col-lg-6 ms-lg-3">
            <img src="section2-image.avif" class="img-fluid">
        </div>
        <div class="section2-card2  col-12 col-lg-6 ms-lg-5">
            <div class="section2-card2-content1 align-items-center justify-content-center">
                <h1 class="mb-lg-4 mt-3 ms-1">Build for India</h1>
                <div class="ms-lg-4 ms-3 mt-3">
                    <p class="fw-bold">Trade 200+ assets securely<p>
                    <p>From Bitcoin to Ethereum to your favorite tokens.</p>
                </div>
            </div>
            <div class="section2-card2-content2 ms-lg-4 ms-3">
                <p class="fw-bold"><span style="color: blue;"><i class="fa-solid fa-square-check"></i></span>Yield on your crypto assets<p>
                <p>Earn up to 4.1% yield on USDC and up to 14% yield on our <span class="d-none d-lg-inline"><br></span>staking assets.</p>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container mt-lg-5">
            <div class="mt-lg-5">
                <h3 class="mt-4 mt-lg-5 ms-0">The most trusted crypto assets exchange</h3>
                <p class="font-size: 18px;">See why millions of users trust us. The proof is in our platform:
                <p>
            </div>
            <div class="card-group mt-lg-5 mb-5 gap-5">
                <div class="card hover-lift shadow-sm p-3">
                    <div class="card-body">
                        <div class="sc-bsTXSN jyrFdc mb-3"><img alt="" height="48" src="home-card-img1.jpg" width="48"></div>
                        <h4 class="card-title mt-lg-4">The largest public crypto company</h4>
                        <p class="card-text card-font mt-lg-3">In April 2021, Coinbase became the largest publicly
                            traded
                            crypto company in the world. That means we operate with more financial transparency, and
                            make
                            our financial statements available each quarter.</p>
                        <div class="mt-lg-5 mb-lg-3">
                            <a href="#" class="card-link ">Learn more --</a>
                        </div>
                    </div>
                </div>
                <div class="card hover-lift shadow-sm p-3">
                    <div class="card-body">
                        <div class="sc-bsTXSN jyrFdc mb-3"><img alt="" height="48" src="home-card-img2.jpg" width="48"></div>
                        <h4 class="card-title mt-lg-4">The largest public crypto company</h4>
                        <p class="card-text card-font mt-lg-3">In April 2021, Coinbase became the largest publicly
                            traded
                            crypto company in the world. That means we operate with more financial transparency, and
                            make
                            our financial statements available each quarter.</p>
                        <div class="mt-lg-5 mb-lg-3">
                            <a href="#" class="card-link ">Learn more --</a>
                        </div>
                    </div>
                </div>
                <div class="card hover-lift shadow-sm p-3">
                    <div class="card-body">
                        <div class="sc-bsTXSN jyrFdc mb-3"><img alt="" height="48" src="home-card-img3.jpg" width="48"></div>
                        <h4 class="card-title mt-lg-4">The largest public crypto company</h4>
                        <p class="card-text card-font mt-lg-3">In April 2021, Coinbase became the largest publicly
                            traded
                            crypto company in the world. That means we operate with more financial transparency, and
                            make
                            our financial statements available each quarter.</p>
                        <div class="mt-lg-5 mb-lg-3">
                            <a href="#" class="card-link ">Learn more --</a>
                        </div>
                    </div>
                </div>
                <div class="card hover-lift shadow-sm p-3">
                    <div class="card-body">
                        <div class="sc-bsTXSN jyrFdcmb-3"><img alt="" height="48" src="home-card-img4.jpg" width="48"></div>
                        <h4 class="card-title mt-lg-4">The largest public crypto company</h4>
                        <p class="card-text card-font mt-lg-3">In April 2021, Coinbase became the largest publicly
                            traded
                            crypto company in the world. That means we operate with more financial transparency, and
                            make
                            our financial statements available each quarter.</p>
                        <div class="mt-lg-5 mb-lg-3">
                            <a href="#" class="card-link ">Learn more --</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section4-parent mt-lg-5 pt-5">
        <div class="container d-flex flex-column flex-lg-row-reverse gap-5">
            <div class="section4-content2">
                <img src="home-section4-img.avif" class="img-fluid">
            </div>
            <div class="section4-content1 mt-lg-5">
                <div class="section4-content-heading">
                    <h1>Get lower, volume-based pricing with Advanced Trade</h1>
                </div>
                <div class="mt-lg-5 section4-content1-para">
                    <p>Real-time order books with as low as 0.0%, maker fees</p>
                    <p>Deep liquidity across hundreds of spot and derivatives markets</p>
                    <p>More order types: Market, Limit, Stop Limit,<br> and Auction Mode orders</p>
                    <p>Charts powered by TradingView with EMA,<br> MA, MACD, RSI, and Bollinger Bands.</p>
                </div>
                <div">
                    <button type="button" class="btn button p-2 last-buttion">Learn more</button>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px;">

    </div>
    
    <script>
        function showMessage() {
            const email = document.getElementById("email").value.trim();
            const messageDiv = document.getElementById("message");

            // Simple email check (you can improve this)
            if (email !== "" && email.includes("@")) {
                messageDiv.style.display = "block";
            } else {
                alert("Please enter a valid email address.");
                messageDiv.style.display = "none";
            }
        }

        // Force hide message every time the page loads/refreshed
        window.onload = function () {
            document.getElementById("message").style.display = "none";
        };

        window.addEventListener("load", () => {
            document.getElementById("myImage").classList.add("loaded");
        });
        window.addEventListener("load", function () {
            document.getElementById("mainHeading").classList.add("visible");
            document.getElementById("mainPara").classList.add("visible");
        });


    </script>
</body>

</html>