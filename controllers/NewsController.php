<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Article;
use yii\web\NotFoundHttpException;


class NewsController extends Controller
{
    /**
     *
     */
     public function actionIndex()
     {
         $articles = Article::findAll(['status' => Article::STATUS_PUBLISHED]);

         return $this->render('index', [
             'articles' => $articles
         ]);
     }

    /**
     * Show all articles
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionShow($id)
    {
        $article = Article::findOne(['id' => $id]);

        if ($article === null) {
            throw new NotFoundHttpException('Article is not found.');
        }

        return $this->render('show', [
            'article' => $article
        ]);
    }

    /**
     *
     */
    public function actionCategory()
    {

    }

}