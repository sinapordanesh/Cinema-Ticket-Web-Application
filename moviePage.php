<?php

    include_once "includes/loader.php";
    $pc = new PurchaseController();

    $pc->searchMovieByName($_GET["movie"]);
    $pc->searchTheaterByMovieName($_GET["movie"]);


    $theaterNames = $pc->getAvailableTheaterNames();

    $ticket = [
        "movie" => "",
        "theater" => "",
        "showTime" => 0,
        "seatNumber" => "",
        "price" => 0,
        "email" => ""
    ];
    $_SESSION["pcObject"] = $pc;

    if (isset($_POST["selectedTheater"])){
        $_SESSION["selectedTheater"] = $_POST["selectedTheater"];
    }
    if (isset($_POST["selectedTime"])){
        $_SESSION["selectedTime"] = $_POST["selectedTime"];
    }
    if (isset($_GET["seatId"])){
        $_SESSION["selectedSeat"] = $_GET["seatId"];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="SeatsTemplate/style.css">
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
                    <img src="https://img.freepik.com/premium-vector/movie-ticket-logo-template-design_20029-891.jpg?w=1480"
                         class="card-img-top" alt="Apple Computer" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title text-dark"><?= $pc->getMovie()->getName()?></h5>
                            <p class="text-muted mb-4">Ticket Page</p>
                        </div>

                        <?php
                        if (!isset($_SESSION["selectedTheater"])):
                            ?>

                        <form method="post" action="./moviePage.php?movie=<?=$_GET["movie"]?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-dark">Select Theater</label>
                                <div class="d-flex justify-content-between">
                                    <select name="selectedTheater" id="select_theater" class="form-select" aria-label="Default select example" onselect="<?=@$_SESSION["selectedTheater"]?>">
                                        <?php
                                        foreach ($theaterNames as $theaterName):
                                            ?>
                                            <option value="<?=$theaterName?>"><?=$theaterName?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </form>

                        <?php
                        endif;
                        if (!isset($_SESSION["selectedTime"]) && isset($_SESSION["selectedTheater"])):
                        ?>
                        <h5 class="text-dark">Cinema: <?=@$_SESSION["selectedTheater"]?> is selected</h5>
                        <form method="post" action="./moviePage.php?movie=<?=$_GET["movie"]?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-dark">Select Theater's Showtime</label>
                                <div class="d-flex justify-content-between">
                                    <select name="selectedTime" id="select_time" class="form-select" aria-label="Default select example">
                                        <?php
                                        $selectedTheater = $pc->getTheaterAvailableTime($_SESSION['selectedTheater']);
                                        $i = 0;
                                        foreach ($selectedTheater as $item):
                                            ?>
                                            <option value="<?= $i?>"><?= date('Y-m-d H:i',$item->getShowTime())?></option>
                                            <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </form>

                        <?php
                        endif;
                        if (isset($_SESSION["selectedTheater"]) && isset($_SESSION["selectedTime"]) && !isset($_SESSION["selectedSeat"])):
                            $selectedTheater = $pc->getTheaterAvailableTime($_SESSION['selectedTheater'])
                        ?>

                        <h5 class="text-dark">Cinema: <?=@$selectedTheater[$_SESSION["selectedTime"]]->getName()?></h5>
                        <h5 class="text-dark">Date & Time: <?=@date('Y-m-d H:i',@$selectedTheater[$_SESSION["selectedTime"]]->getShowTime())?></h5>
                            <div class="container">
                                <label for="exampleInputEmail1" class="text-dark">Select Your Seat</label>
                                <div class="row-container">
                                    <div class="row">
                                            <?php
                                            $selectedTheaterObject = $selectedTheater[$_SESSION["selectedTime"]];
                                            foreach ($selectedTheaterObject->getSeats() as $seat):
                                                if ($seat->getAvailable()):
                                                    ?>
                                                    <a href="./moviePage.php?movie=<?=$_GET["movie"]?>&seatId=<?=$seat->getSeatId()?>" class="seat"></a>
                                                <?php
                                                else:
                                                    ?>
                                                    <div class="seat occupied"></div>
                                                <?php
                                                endif;
                                            endforeach;
                                            ?>
                                    </div>
                                </div>
                            </div>

                        <?php
                        endif;
                        if (isset($_SESSION["selectedTheater"]) && isset($_SESSION["selectedTime"]) && isset($_SESSION["selectedSeat"])):

                        $selectedTheater = $pc->getTheaterAvailableTime($_SESSION['selectedTheater']);
                        $ticket["movie"] = $_GET["movie"];
                        $ticket["theater"] = $_SESSION["selectedTheater"];
                        $ticket["showTime"] = @$selectedTheater[$_SESSION["selectedTime"]]->getShowTime();
                        $ticket["seatNumber"] = $_SESSION["selectedSeat"];
                        $ticket["price"] = $pc->getMovie()->getPrice();
                        $_SESSION["ticket"] = $ticket;
                        ?>

                        <h5 class="text-dark">Cinema: <?=@$selectedTheater[$_SESSION["selectedTime"]]->getName()?></h5>
                        <h5 class="text-dark">Date & Time: <?=@date('Y-m-d H:i',@$selectedTheater[$_SESSION["selectedTime"]]->getShowTime())?> </h5>
                        <h5 class="text-dark">Seat Number: <?=$_SESSION["selectedSeat"]?> </h5>
                        <form method="post" action="checkoutPage.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Check Out</button>
                        </form>

                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                            <span>Total</span><span><?= $pc->getMovie()->getPrice()?></span>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <script src='SeatsTemplate/script.js'></script>
</body>
</html>
<?php
?>
