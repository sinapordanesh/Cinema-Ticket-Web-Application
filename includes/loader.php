<?php
ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
session_start();
require_once ("Singleton.php");
require_once("model/Movie.php");
require_once("model/Theater.php");
require_once("model/Seat.php");
require_once("model/Coupon.php");
require_once("model/ModelsDatabase.php");
require_once("model/Movie.php");
require_once("model/News.php");
require_once("model/RegisteredUser.php");
require_once("model/Ticket.php");
require_once("model/User.php");
require_once("controller/AuthenticationController.php");
require_once("controller/Controller.php");
require_once("controller/NewsController.php");
require_once("controller/DashboardController.php");
require_once("controller/MovieSearchController.php");
require_once("controller/PurchaseController.php");
require_once("controller/TicketCancellingController.php");
require_once("database/Database.php");
require_once("database/db_object.php");


function redirect($location, $get = "")
{
    header("Location: {$location}" . $get);
}

$salam = "salam";
