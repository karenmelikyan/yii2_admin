<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use yii\web\NotFoundHttpException;


class NewsController extends Controller
{
    /**
     *
     */
     public function actionIndex()
     {
         $articles = Article::findAll(['status' => Article::STATUS_PUBLISHED]);
         $categories = Category::find()->all();

         return $this->render('index', [
             'articles' => $articles,
             'categories' => $categories
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
     * @param $id
     * @return string
     */
    public function actionCategory($id)
    {
        $articles = Article::findAll(['news_category' => $id]);
        $categories = Category::find()->all();

        return $this->render('index', [
            'articles' => $articles,
            'categories' => $categories
        ]);

//        $rows = (new \yii\db\Query())
//            ->select(['id', 'email'])
//            ->from('user')
//            ->where(['last_name' => 'Smith'])
//            ->limit(10)
//            ->all();
    }

}