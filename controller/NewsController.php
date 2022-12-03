<?php
require_once ("Controller.php");
require_once ("Subject.php");

class NewsController extends Controller implements Subject
{
    private $news = array();
    private $observers = array();


    public function getAllNews(){
        $result = self::find_this_query("SELECT * FROM news");
        foreach ($result as $item){
            $this->news [] = new News($item["title"], $item["content"], $item["date"]);
        }
    }

    public function registerObserver($observer)
    {
        $this->observers[] = $observer;
        $observer->update($this->news);
    }

    public function removeObserver($observer)
    {
        // TODO: Implement removeObserver() method.
    }

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