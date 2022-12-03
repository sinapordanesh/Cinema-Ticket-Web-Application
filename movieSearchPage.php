<?php

    include_once "includes/loader.php";

    $movieController = new MovieSearchController();
    @$movieController->searchMovieByName($_GET["search"]);
    unset($_SESSION["selectedTheater"]);
    unset($_SESSION["selectedTime"]);
    unset($_SESSION["selectedSeat"]);

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
                <h1>Search through a world of movies</h1><p>Say</p>
            </div>
            <form role="form" id="form-buscar" method="get">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="text" name="search" placeholder="Search..."/>
                        <span class="input-group-btn">
<button class="btn btn-success" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if (!empty($movieController->getMoviesList())):
            $movies = $movieController->getMoviesList();
            ?>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Name
                    </th>
                    <th class="th-sm">Price
                    </th>
                    <th class="th-sm">Release Date
                    </th>
                </tr>

                <tbody>

                <?php
                foreach ($movies as $movie):
                ?>
                <tr>
                    <td>
                        <a href="moviePage.php?movie=<?= $movie->getName();?>" methods="get">
                            <?= $movie->getName(); ?>
                        </a>
                    </td>
                    <td>$ <?= number_format($movie->getPrice(),2,'.','');?></td>
                    <td><?= date('m/d/Y', $movie->getReleaseDate()); ?></td>
                </tr>
                <?php
                endforeach;
                ?>
                </tbody>
                </thead>
            </table>
        <?php
        endif;
        ?>
    </div>
</div>