<?php
    include_once "includes/loader.php";

    if (isset($_POST["email"])){
        $_SESSION["ticket"]["email"] = $_POST["email"];
    }

    if (isset($_POST["cancel"])){
        unset($_SESSION["ticket"]);
        redirect("index.php");
    }

    if (isset($_POST["cancel"])){
        unset($_SESSION["ticket"]);
        redirect("index.php");
    }

    if (isset($_POST["couponId"])){
        $newPrice = PurchaseController::couponDiscount($_POST["couponId"], $_SESSION["ticket"]["price"]);
        if ($newPrice){
            $_SESSION["ticket"]["price"] = $newPrice;
            $message = "Coupon successfully applied. Not usable anymore!";
        } else{
            $message = "The coupon is not applicable!";
        }
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                    <img src="https://previews.123rf.com/images/drcmarx/drcmarx1703/drcmarx170300003/75722150-checkout-icon.jpg"
                         class="card-img-top" alt="Apple Computer" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"></h5>
                            <p class="text-muted mb-4">Checkout Page</p>
                        </div>

                        <h5>Ticket details: </h5>
                        <ul class="list-group">
                            <li class="list-group-item">Movie: <b><?= $_SESSION["ticket"]["movie"]?></b></li>
                            <li class="list-group-item">Theater: <b><?= $_SESSION["ticket"]["theater"]?></b></li>
                            <li class="list-group-item">Show Time: <b><?= @date('Y-m-d H:i', $_SESSION["ticket"]["showTime"])?></b></li>
                            <li class="list-group-item">Seat Number: <b><?= $_SESSION["ticket"]["seatNumber"]?></b></li>
                            <li class="list-group-item">Price: $<b><?= round($_SESSION["ticket"]["price"], 2)?></b></li>
                            <li class="list-group-item">Costumer Email: <b><?= $_SESSION["ticket"]["email"]?></b></li>
                        </ul>
                        <br>

                        <form method="post" action="checkoutPage.php">
                            <div>
                                <input type="text" name="couponId" class="form-control" id="inputPassword2" placeholder="Coupon Id">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mb-2">Apply Coupon</button>
                        </form>

                        <?php
                        if (isset($message)){
                            echo "<div class='alert alert-warning' role='alert'>
                                     $message
                                </div>";
                        }
                        ?>

                        <br>

<!--                        <form method="post" action="paymentPage.php">-->
<!--                            <button type="submit" class="btn btn-success">Payment</button>-->
<!--                        </form>-->

                        <a type="submit" class="nav-link active btn btn-success" href="paymentPage.php?action=successPage.php"> <i class="fas fa-credit-card mr-2"></i> Payment </a>
                        <br>

                        <br>

                        <form method="post" action="checkoutPage.php">
                                <input type="text" name="cancel" hidden>
                                <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

