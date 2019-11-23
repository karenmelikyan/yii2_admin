<?php


namespace app\controllers\admin;

use app\models\admin\UpdateForm;
use app\models\Article;
use app\models\Category;
use app\models\Company;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;



class CompanyController extends Controller
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
        $companies = Company::find()->all();

        return $this->render('index', [
            'companies' => $companies,
        ]);
    }

    public function actionCreate()
    {
        $company = new Company();

        if ( $company ->load(\Yii::$app->request->post())) {
            if ( $company ->validate()) {
                $company ->save();

                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'company' => $company,
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
        $company = Company::findOne(['id' => $id]);

        if ($company->load(\Yii::$app->request->post())) {
            if ($company->validate()) {
                $company->save();

                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'company' => $company,
        ]);
    }

    public function actionDelete($id)
    {
        $company = Company::findOne(['id' => $id]);

        if ($company === null) {
            throw new NotFoundHttpException('Current record not found.');
        }

        if (\Yii::$app->request->isPost) {
            $company->delete();
            return $this->redirect('index');
        }

        return $this->render('delete', ['company' => $company]);
    }
}