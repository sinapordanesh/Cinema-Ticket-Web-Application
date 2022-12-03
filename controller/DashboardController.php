<?php
require_once ("Controller.php");
require_once ("Observer.php");

class DashboardController extends Controller implements Observer
{

    private $user;
    private $news = array();

    public function userLoad(){
        global $singleton;
        if (User::dbGet($_SESSION["userId"])){
            $this->user = $singleton->getUserObject();
        }
    }

    public function feePayment(){
        $this->user->dbUpdate("feePayment");
        redirect("paymentPage.php", "?action=dashboardPage.php");
    }

    public function update($news)
    {
        $this->news = $news;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param mixed $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }

}