<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Article;


class NewsController extends Controller
{
    /**
     *
     */
     public function actionIndex()
     {
         $news = Article::find()->where(['status' => 1])->all();

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