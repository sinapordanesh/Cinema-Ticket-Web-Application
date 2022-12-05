<?php
require_once ("Controller.php");

/**
 *
 */
class PurchaseController extends Controller
{

    /**
     * @var
     */
    private $movie;
    /**
     * @var array
     */
    private $theaters = array();

    /**
     * @param $name
     * @return void
     */
    public function searchMovieByName($name = ""){
        $result = self::find_this_query("SELECT * FROM movies WHERE name LIKE '%$name%'");

        if (!empty($result)){
            $this->movie = new Movie($result[0]["name"], $result[0]["price"], $result[0]["releaseDate"], $result[0]["available"]);
        } else{
            echo "No movie found!";
        }
    }

    /**
     * @param $name
     * @return void
     */
    public function searchTheaterByMovieName($name = ""){
        $result = self::find_this_query("SELECT * FROM theaters WHERE movie LIKE '%$name%'");

        foreach ($result as $item){
            $this->theaters [] = new Theater($item["name"], $item["movie"], $item["showTime"]);
        }
    }

    /**
     * @return array
     */
    public function getAvailableTheaterNames(){
        $theaterNames = array();
        foreach ($this->theaters as $theater){
            $theaterNames [] = $theater->getName();
        }
        $theaterNames = array_unique($theaterNames);
        return $theaterNames;
    }

    /**
     * @param $theaterName
     * @return array
     */
    public function getTheaterAvailableTime($theaterName){
        $theaterObjects = array();

        foreach ($this->theaters as $theater){
            if ($theater->getName() == $theaterName){
                $theaterObjects [] = $theater;
            }
        }

        return $theaterObjects;
    }

    /**
     * @param $userId
     * @param $movie
     * @param $theater
     * @param $showTime
     * @param $purchaseTime
     * @param $seatNumber
     * @param $price
     * @param $email
     * @return bool
     */
    public static function ticketCreation($userId, $movie, $theater, $showTime, $purchaseTime, $seatNumber, $price, $email){
        $uniqueId = rand(100000, 999999);
        $ticket = new Ticket($uniqueId, $userId, $movie, $theater, $showTime, $purchaseTime, $seatNumber, $price, $email);
        if ($ticket->dbCreate()){
            $singleton = Singleton::getOnlyInstance();
            $singleton->addTicket($ticket);
            return true;
        } else{
            return false;
        }
    }

    /**
     * @return bool
     */
    public static function emailSender(){
        $singleton = Singleton::getOnlyInstance();
        $ticket = $singleton->getLastAddedTicket();

        $to = $ticket->getEmail();
        $subject = "Ticket Purchase Confirmation";
        $message = "Salam";
        $header = "From: " . strip_tags("noreply@calgarycinema.ca") . "\r\n";
        $header .= "Reply-To: " . strip_tags("noreply@calgarycinema.ca") . "\r\n";
        if (mail("cegeh34615@cosaxu.com", $subject, $message, $header)){
            return true;
        } else{
            return false;
        }
    }

    /**
     * @param $uniqueId
     * @param $ticketPrice
     * @return false|mixed
     */
    public static function couponDiscount($uniqueId, $ticketPrice){
        $result = self::find_this_query("SELECT * FROM coupon WHERE uniqueId = '$uniqueId'");
        if (!empty($result)){
            $coupon = new Coupon($result[0]["uniqueId"], $result[0]["amount"], $result[0]["expiryDate"]);
            if ($coupon->getAmount() > $ticketPrice){
                return false;
            } else{
                $return = $ticketPrice - $coupon->getAmount();
                $coupon->dbDelete();
                return $return;
            }
        } else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param mixed $movie
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

    /**
     * @param array $theaters
     */
    public function setTheaters($theaters)
    {
        $this->theaters = $theaters;
    }

    /**
     * @return array
     */
    public function getTheaters()
    {
        return $this->theaters;
    }
}

