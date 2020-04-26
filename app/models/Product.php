<?php


namespace app\models;


class Product extends AppModel
{
    public function setRecentlyViewed($id)
    {
        $recentlyViewed = $this->getAllRecentlyViewed();
        if(!$recentlyViewed){
            setcookie('recentlyViewed', $id, time() + 3600*24, '/');
        }else{
            $recentlyViewed = explode('.', $recentlyViewed);
            if(!in_array($id, $recentlyViewed)){
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.', $recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time() + 3600*24, '/');
            }
        }
    }

    public function getRecentlyViewed()
    {
        if(!empty($_COOKIE['recentlyViewed'])){
            $recentlyViewd = $_COOKIE['recentlyViewed'];
            $recentlyViewd = explode('.', $recentlyViewd);
            return array_slice($recentlyViewd, -3);
        }else{
            return false;
        }
    }

    public function getAllRecentlyViewed()
    {
        if(!empty($_COOKIE['recentlyViewed'])){
            return $_COOKIE['recentlyViewed'];
        }
        return false;
    }
}
