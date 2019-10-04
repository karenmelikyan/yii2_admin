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
     *
     */
    public function actionCategory($id)
    {

        $articles = Article::findAll(['status' => Article::STATUS_PUBLISHED]);




//        $rows = (new \yii\db\Query())
//            ->select(['id', 'email'])
//            ->from('user')
//            ->where(['last_name' => 'Smith'])
//            ->limit(10)
//            ->all();
    }

}