<?php
require_once ("Controller.php");

class TicketCancellingController extends Controller
{
    /**
     * @var
     */
    private $ticket;
    /**
     * @var
     */
    private $coupon;

    /**
     * @param $id
     * @return int|mixed
     */
    public function searchTicketById($id){
        $result = self::find_this_query("SELECT * FROM tickets WHERE uniqueId='$id'");

        if (!empty($result)){
            $this->ticket = new Ticket($result[0]["uniqueId"], $result[0]["userId"], $result[0]["movie"], $result[0]["theater"], $result[0]["showTime"], $result[0]["purchaseTime"], $result[0]["seatNumber"], $result[0]["price"], $result[0]["email"]);
            return $result[0]["showTime"];
        } else{
            return 0;
        }
    }

    /**
     * @param $showTime
     * @return bool
     */
    public static function checkCancellationEligibility($showTime){
        if(($showTime - time()) < 259200){
            return false;
        } else{
            return true;
        }
    }

    /**
     * @param $amount
     * @param $user
     * @return void
     */
    public function couponCreation($amount, $user){
        if (!$user){
            $amount = $amount * .85;
        }
        $this->coupon = new Coupon(rand(100000, 999999), $amount, time() + 31536000);
        $this->coupon->dbCreate();
    }

    /**
     * @return void
     */
    public function ticketDeleting(){
        $this->ticket->dbDelete();
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param mixed $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return mixed
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param mixed $coupon
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;
    }



}