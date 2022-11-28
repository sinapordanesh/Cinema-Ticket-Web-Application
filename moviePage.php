<?php

    include_once "includes/loader.php";
    $pc = new PurchaseController();

    $pc->searchMovieByName($_GET["movie"]);
    $pc->searchTheaterByMovieName($_GET["movie"]);


    $theaterNames = $pc->getAvailableTheaterNames();

    $ticket = [
        "movie" => "",
        "theater" => "",
        "time" => 0,
        "seat" => "",
    ];

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
                    <img src="https://img.freepik.com/premium-vector/movie-ticket-logo-template-design_20029-891.jpg?w=1480"
                         class="card-img-top" alt="Apple Computer" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title"><?= $pc->getMovie()->getName()?></h5>
                            <p class="text-muted mb-4">Ticket Page</p>
                        </div>

                        <form method="post" action="./moviePage.php?movie=<?=$_GET["movie"]?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Theater</label>
                                <div class="d-flex justify-content-between">
                                    <select name="select_theater" id="select_theater" class="form-select" aria-label="Default select example">
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

                        <form method="post" action="./moviePage.php?movie=<?=$_GET["movie"]?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Theater's Showtime</label>
                                <div class="d-flex justify-content-between">
                                    <select name="select_time" id="select_time" class="form-select" aria-label="Default select example">
                                        <?php
                                        $selectedTheater = $pc->getTheaterAvailableTime($_POST['select_theater']);
                                        $i = 0;
                                        foreach ($selectedTheater as $item):
                                            ?>
                                            <option value="<?= $i?>"><?= date('Y-m-d H:i:s',$item->getShowTime())?></option>
                                            <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Select</button>
                        </form>

                        <form>

                            <script>
                                // $(function (){
                                //     $("#select_theater").change(function (){
                                //         var displaycourse = $("#select_theater option:selected").text();
                                //         $("#id").val(displaycourse);
                                //     })
                                // })
                            </script>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


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
