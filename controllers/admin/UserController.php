<?php


namespace app\controllers\admin;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use app\models\EditForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;use yii\db\Query;



class UserController extends Controller
{
    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index', 'edit', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function() {
                    return $this->goHome();
                }
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $data = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);


        return $this->render('index', [
            'data'  => $data,
        ]);
    }


    public function actionEdit($id)
    {
        if(!$user = User::findOne($id)) {
            throw new NotFoundHttpException('User is not found.');
        }

        $user->password = '';

        if ($user->load(\Yii::$app->request->post()) && $user->validate()) {

            $user->save();
            return $this->redirect('index');
        }

        return $this->render('edit', [
            'user' => $user,
            ]);
    }


    public function actionDelete($id)
    {
       User::findOne($id)->delete();

       return $this->redirect('edit');
    }

    /**
     * @return string|Response
     */
    public function actionLogin()
    {
        $loginForm = new LoginForm();

        if ($loginForm->load(Yii::$app->request->post()) && $loginForm->login()) {

          return $this->goBack();
        }

        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();
    }
}