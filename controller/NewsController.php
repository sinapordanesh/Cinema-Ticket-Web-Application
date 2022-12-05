<?php
require_once ("Controller.php");
require_once ("Subject.php");

class NewsController extends Controller implements Subject
{
    /**
     * @var array
     */
    private $news = array();
    /**
     * @var array
     */
    private $observers = array();


    /**
     * @return void
     */
    public function getAllNews(){
        $result = self::find_this_query("SELECT * FROM news");
        foreach ($result as $item){
            $this->news [] = new News($item["title"], $item["content"], $item["date"]);
        }
    }

    /**
     * @param $observer
     * @return mixed|void
     */
    public function registerObserver($observer)
    {
        $this->observers[] = $observer;
        $observer->update($this->news);
    }

    /**
     * @param $observer
     * @return mixed|void
     */
    public function removeObserver($observer)
    {
        // TODO: Implement removeObserver() method.
    }

    /**
     * @return mixed|void
     */
    public function notifyAllObservers()
    {
        for ($i = 0; $i < sizeof($this->observers); $i++){
            $this->observers[$i]->update();
        }
    }

    /**
     * @return array
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param array $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }
}