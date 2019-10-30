<?php
namespace app\controllers\admin;

use app\models\admin\UpdateForm;
use app\models\Article;
use app\models\Category;
use app\models\Company;
use yii\web\Controller;

class ArticleController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $articles = Article::find()->joinWith(['category', 'company'])->all();

        return $this->render('index', [
            'articles' => $articles,
        ]);
    }

    public function actionCreate()
    {
        $article = Article::find()->one();
        $createdArticle = new Article();

        if ($createdArticle->load(\Yii::$app->request->post())) {
            if ($createdArticle->validate()) {
                $createdArticle->save();

                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'article' => $article,
            'categories' => Category::find()->all(),
            'companies'  => Company::find()->all(),
        ]);
    }


    public function actionUpdate($id)
    {
        $article = Article::findOne(['id' => $id]);

        if ($article->load(\Yii::$app->request->post())) {
            if ($article->validate()) {
                $article->save();

                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'article' => $article,
            'categories' => Category::find()->all(),
        ]);
    }


    public function actionDelete($id, $status = 0)
    {
        switch($status)
        {
            case 0:
                return $this->render('delete', ['id' => $id]);
                break;

            case 1:
                $article = Article::findOne(['id' => $id]);
                $article->delete();
                return $this->redirect('index');
                break;

            case 2:
                return $this->redirect('index');
                break;
        }

    }


    public function actionView()
    {

    }


}