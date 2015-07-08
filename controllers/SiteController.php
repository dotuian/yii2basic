<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\UploadForm;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model

            // do something meaningful here about $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }


    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionSay($message = "Hello, ") {
        return $this->render('say', ['message' => $message]);
    }
    
    
    
    public function actionUpload()
    {
        $model = new UploadForm();
        
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                // 当前目录是在 {app_path}/web 目录下
                $model->file->saveAs('../uploads/' . $model->file->name);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    function actionLanguage(){
        $language = Yii::$app->request->post['language'];
        Yii::$app->language = $language;

        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->request->cookies->add($languageCookie);

//        $user = Yii::$app->user;
//        $user->language = $language;
//        $user->save();
    }
    
    
    function actionOffline() {
        $this->layout = false;

        return $this->render('offline');
    }

    
    public function actionExif() {

        $input = "E:/BaiduYunDownload/IMG_2161.JPG";
        $exif = @exif_read_data($input);

        return $this->render('exif', ['exif' => $exif]);
    }
    
    public function actionImage(){
        $input = "E:/BaiduYunDownload/IMG_2161.JPG";
        $image = @exif_thumbnail($input);
        header('Content-type: image/jpeg');
        echo $image;
    }
    
}
