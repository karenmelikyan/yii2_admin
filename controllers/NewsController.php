<?php
namespace app\controllers;

use app\models\SignUpForm;
use yii\web\Controller;
use app\models\Article;
use app\models\Signup;
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
             $query = $query->andWhere(['category_id' => $category]);
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

    /**
     * User registration
     * @return string
     */
    public function actionSignup()
    {
        $signUpForm = new SignUpForm();

        if ($signUpForm->load(\Yii::$app->request->post()) && $signUpForm->signup()) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'signupform' => $signUpForm,
        ]);
    }

}