<?php


namespace app\controllers\admin;

use app\models\admin\UpdateForm;
use app\models\Article;
use app\models\Category;
use app\models\Verification;
use app\models\Company;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class CategoryController extends Controller
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
        $categories = Category::find()->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();

        if ( $category->load(\Yii::$app->request->post())) {
            if ( $category->validate()) {
                $category->save();

                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'id' => $id,
        ]);
    }

    public function actionUpdate($id)
    {
        $category = Category::findOne(['id' => $id]);

        if ($category->load(\Yii::$app->request->post())) {
            if ($category->validate()) {
                $category->save();

                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'category' => $category,
        ]);
    }

    public function actionDelete($id)
    {
        $category = Category::findOne(['id' => $id]);

        if ($category === null) {
            throw new NotFoundHttpException('Current record not found.');
        }

        if (\Yii::$app->request->isPost) {
            $category->delete();
            return $this->redirect('index');
        }

        return $this->render('delete', ['category' => $category]);
    }
}