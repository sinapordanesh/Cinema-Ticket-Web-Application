<?php
    include_once "includes/loader.php";

    if ($_SESSION["login"]):

        global $singleton;
        if (AuthenticationController::userObject($_SESSION["userQuery"])){
            $user = $singleton->getUserObject();
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

    <style>
        body{background: #f5f5f5}.rounded{border-radius: 1rem}.nav-pills .nav-link{color: #555}.nav-pills .nav-link.active{color: white}input[type="radio"]{margin-right: 5px}.bold{font-weight:bold}
    </style>

    <script>
    </script>
</head>
<body>

<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">User Dashboard</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <ul class="list-group">
                                <li class="list-group-item">Email: <b><?= $user->getEmail()?></b></li>
                                <li class="list-group-item">User Name: <b><?= $user->getName()?></b></li>
                                <li class="list-group-item">Address: <b><?= $user->getAddress()?></b></li>
                                <li class="list-group-item">Credit Card Number: <b><?= $user->getCreditCardNumber() ?></b></li>
                                <li class="list-group-item">Subscription:
                                    <br>
                                    <ul class="list-group">
                                        <li class="list-group-item">Fee Payment: <b><?= ($user->getFeePayment() == 0) ? "Not Paid!!" : "Paid" ?></b></li>
                                        <li class="list-group-item">Expiry Date: <b><?= ($user->getFeePayment() == 0) ? "N/A" : $user->getExpiryDate()?></b></li>
                                    </ul>

                                </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
                <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                    <!-- Credit card form tabs -->
                    <form action="">
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <button data-toggle="pill" href="#credit-card" class="nav-link active btn-success" <?= ($user->getFeePayment() == 1) ? "disabled" : "" ?>> <i class="fas fa-credit-card mr-2"></i> Pay the $20 subscription fee </button> </li>
                        </ul>
                    </form>
                    <form action="">
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <button type="submit" class="nav-link active btn btn-danger"> <i class="fas fa-credit-card mr-2"></i> Log Out </button> </li>
                        </ul>
                    </form>

                </div> <!-- End -->

            </div>
        </div>
</body>
</html>

<?php
    else:
        redirect("index.php");
    endif;
    ?>
