<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class HomeController extends Controller
{

    public $layout = 'home'; //用属性的方法定义父模板

//    public $enableCsrfValidation = false;

    public function init()
    {
//        parent::init();
//        $this->enableCsrfValidation = false;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        dd(Yii::getVersion());
//        return $this->render('index');

//        $request = Yii::$app->request;
//        $id = $request->get('id');

        if (Yii::$app->request->isPost) {
            $postData = Yii::$app->request->post();
            $username = Yii::$app->request->post('username', 'hahah');
            print_r($_POST['username']);
            die;
        }

//        $request = Yii::$app->request;
        $username = Yii::$app->request->get('username', 'aaa');
        echo $username;//echo $_GET['username'];

//        die;

        $date = date('Ymd');
        $data['class'] = 'student';
        $data['age'] = 18;

//        return  $this->render('index',['date'=>$date,'data'=>$data] );
//        return  $this->render('index', compact('date', 'data'));


        return $this->render('index', compact('date', 'data'));

//        return $this->renderPartial('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
