<?php

    include_once "includes/loader.php";
    $pc = new PurchaseController();

    $pc->searchMovieByName($_GET["movie"]);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Center Align Buttons in Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Style to center grid column */
        .col-centered{
            float: none;
            margin: 0 auto;
        }

        /* Some custom styles to beautify this example */
        .row{
            background: #dbdfe5;
        }
        .demo-content{
            padding: 25px;
            font-size: 18px;
            background: #abb1b8;
        }
    </style>
</head>
<body>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <img src="https://img.freepik.com/premium-vector/movie-ticket-logo-template-design_20029-891.jpg?w=1480"
                         class="card-img-top" alt="Apple Computer" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title">Believing is seeing</h5>
                            <p class="text-muted mb-4">Apple pro display XDR</p>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between">
                                <span>Pro Display XDR</span><span>$5,999</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Pro stand</span><span>$999</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Vesa Mount Adapter</span><span>$199</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                            <span>Total</span><span>$7,197.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
