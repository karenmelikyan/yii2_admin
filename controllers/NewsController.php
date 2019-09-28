<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\News;


class NewsController extends Controller
{
    /**
     *
     */
     public function actionIndex()
     {

         $news = new News();
         $news = News::find()->all();

         return $this->render('index', [
         "news" => $news
         ]);
     }

    /**
     *  Show all article
     */
    public function actionShow()
    {

        //return $this->render('show');
    }

}