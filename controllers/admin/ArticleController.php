<?php
namespace app\controllers\admin;

use app\models\admin\UpdateForm;
use app\models\Article;
use app\models\Category;
use app\models\Company;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\data\Pagination;



class ArticleController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public $layout = 'admin';

    public function actionIndex()
    {
//        $articles = Article::find()->where(['status' => Article::STATUS_PUBLISHED]);
//        $pages = new Pagination([
//            'totalCount' => $articles->count(),
//            'defaultPageSize' => 3,
//        ]);
//
//        $articles = $articles
//            ->joinWith(['category', 'company'])
//            ->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();

        $articles = Article::find()->where(['status' => Article::STATUS_PUBLISHED])->joinWith(['category', 'company']);
        $data = new ActiveDataProvider([
            'query' => Article::find(),
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);

        //var_dump($data); die();

        return $this->render('test', [
            'articles' =>  $articles,
            'data' => $data,
        ]);
    }

    public function actionCreate()
    {
        $article = new Article();

        if ($article->load(\Yii::$app->request->post())) {
            if ($article->validate()) {
                $article->save();

                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'article' => $article,
            'categories' => Category::find()->all(),
            'companies'  => Company::find()->all(),
        ]);
    }


    public function actionView($id)
    {
        //?????????????????????????
        $articles = Article::find()->joinWith(['category', 'company'])->all();

        return $this->render('view', [
            'articles' => $articles,
            'id' => $id,
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
            'companies' => Company::find()->all(),
        ]);
    }


    public function actionDelete($id)
    {
        $article = Article::findOne(['id' => $id]);
        if ($article === null) {
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
            }
            throw new NotFoundHttpException('Current record not found.');
        }

//        if (\Yii::$app->request->isAjax) {
//            try {
//                if (true) {
//                if ($article->delete() !== false) {
//                    \Yii::$app->response->format = Response::FORMAT_JSON;
//                    return ['status' => 'ok'];
//                }
//            } catch (\Throwable $e) {
//                // todo
//            }
//        }

        if (\Yii::$app->request->isPost) {
            $article->delete();
            return $this->redirect('index');
        }

        return $this->render('delete', ['article' => $article]);
    }

}