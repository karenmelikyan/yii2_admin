<?php
namespace app\controllers\admin;

use app\models\Article;
use app\models\Category;
use yii\web\Controller;

class ArticleController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $articles = Article::find()->joinWith(['category'])->all();

        return $this->render('index', ['articles' => $articles]);
    }

    public function actionUpdate($id)
    {
        $article = Article::findOne(['id' => $id]);
        if ($article->load(\Yii::$app->request->post())) {
            var_dump($article); die();
        }
//        var_dump(\Yii::$app->request->post());die();


        $categories = Category::find()->all();

        return $this->render('update', [
            'article' => $article,
            'categories' => $categories,
            ]);
    }

    public function actionDelete()
    {

    }

    public function actionView()
    {

    }

    public function actionCreate()
    {

    }

}