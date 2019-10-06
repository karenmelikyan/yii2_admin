<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use yii\web\NotFoundHttpException;


class NewsController extends Controller
{
    /**
     * Show all articles
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
     * Show one article
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionShow($id)
    {
        $article = Article::findOne(['id' => $id]);
        $categories = Category::find()->all();

        if ($article === null) {
            throw new NotFoundHttpException('Article is not found.');
        }

        return $this->render('show', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Show article by chosen category
     * @param $id
     * @return string
     */
    public function actionCategory($id)
    {
        //if no `all` category is selected
        if ($id > 1) {
            $articles = Article::findAll(['news_category' => $id, 'status' => Article::STATUS_PUBLISHED]);
            $categories = Category::find()->all();

            //if url not content right id for particular category
            if (count($categories) < $id) {
                throw new NotFoundHttpException('There is no such category');
            }

            return $this->render('index', [
                'articles' => $articles,
                'categories' => $categories
            ]);

        }else{
            return $this->redirect(['news/']);
        }


//        $rows = (new \yii\db\Query())
//            ->select(['id', 'email'])
//            ->from('user')
//            ->where(['last_name' => 'Smith'])
//            ->limit(10)
//            ->all();
    }

}