<?php
include_once "includes/loader.php";


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top: 8%;">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <div id="logo" class="text-center">
                <h1>Please enter your 6-digits ticket id:</h1><p></p>
            </div>
            <form role="form" id="form-buscar" method="get" action="">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="number" name="ticketId" placeholder="Ticket ID..."/>
                        <span class="input-group-btn">
<button class="btn btn-primary" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
                    </div>
                </div>
            </form>
        </div>

        <?php

        $cc = new TicketCancellingController();
        if (isset($_GET["ticketId"])):
            $showTime = $cc->searchTicketById($_GET["ticketId"]);
            if ($showTime):
                if (TicketCancellingController::checkCancellationEligibility($showTime)):
                    $_SESSION["cancellationTicketId"] = $_GET["ticketId"];
                    $message = "<div class='alert alert-success' role='alert'>
                              <a href='cancellingTicketPage2.php'>
                              Thicket found. Click here to process the cancellation!
                              </a>
                            </div>";
                    echo ($message);
                else:
                    echo "<div class='alert alert-warning' role='alert'>
                              Thicket found, but not eligible to cancel as we are closer than 72 h to the showtime!
                            </div>";
                endif;
        ?>

        <?php
            else:
        ?>
                <div class="alert alert-danger" role="alert">
                    Ticket was not found! Please try again.
                </div>
        <?php
            endif;
            endif;
        ?>
    </div>
</div>

