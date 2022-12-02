<?php
    include_once "includes/loader.php";
    if (isset($_SESSION["login"]) && $_SESSION["subscribed"]){
        $user = true;
    } else{
        $user = false;
    }

    $cc = new TicketCancellingController();
    $cc->searchTicketById($_SESSION["cancellationTicketId"]);
    $ticket = $cc->getTicket();
    $cc->couponCreation($ticket->getPrice(), $user);
    $coupon = $cc->getCoupon();
    $cc->ticketDeleting();
?>

<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Center Align Buttons in Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }
    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
    }
    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
<body>
<div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1>
    <h3>We cancelled your ticket</h3>
    <br/>
    <h4>You'll get an email from us within cancellation confirmation and your coupon</h4>
    <br/>
    <h5>Coupon ID: <b><?=$coupon->getUniqueId()?></b></h5>
    <br/>
    <h5>Coupon Amount: $<b><?=round($coupon->getAmount(), 2)?></b></h5>
    <?php
    if (!$user){
        echo "As you are not a subscribed use, you charged 15% due to the administration fee!";
    } else{
        echo "As you are a subscribed use, you won't charged 15% administration fee!";
    }
    ?>
    <br/>
    <br/>
    <h5>Coupon Expiry Date: <b><?=date('Y-m-d', $coupon->getExpiryDate())?></b></h5>
    <br/>
    <br/>
    <h5>Please keep the Coupon ID safe to use it in your next purchase!</h5>
    <br/>
    <form method="get" action="index.php">
        <button type="submit" class="btn btn-primary">Return</button>
    </form>
</div>
</body>
</html>

