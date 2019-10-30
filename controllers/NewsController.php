<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use yii\web\NotFoundHttpException;

/**
 * Class NewsController
 * @package app\controllers
 */
class NewsController extends Controller
{

     public function actionIndex($category = null)
     {
         $query = Article::find()->where(['status' => Article::STATUS_PUBLISHED]);

         if ($category !== null) {
             $query = $query->andWhere(['news_category' => $category]);
         }

         /** @var $articles Article[] */
         $articles = $query->all();

         if (empty($articles)) {
             /** @noinspection PhpUnhandledExceptionInspection */
             throw new NotFoundHttpException();
         }

         return $this->render('index', [
             'articles' => $articles,
         ]);
     }

    /**
     * Show one article
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
            'article' => $article,
        ]);
    }
}