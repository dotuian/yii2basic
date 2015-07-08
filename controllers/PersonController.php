<?php

namespace app\controllers;

use Yii;
use app\models\PersonSearch;

class PersonController extends \yii\web\Controller
{
    
    public function actionIndex(){
        
        return $this->render('index');
    }
    
    public function actionGridview()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('gridview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);        
        
    }
    
    public function actionListview()
    {
        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listview', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);        
        
    }

}
