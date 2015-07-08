<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'GridView Sample');

$this->params['breadcrumbs'][] = ['label' => 'GridView & ListView', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    
    <?php echo $this->render('_search', ['model' => $searchModel, 'type'=>'gridview']); ?>
    
    <?= GridView::widget([
        'showHeader' => true,
        'headerRowOptions' => ['a', 'b'],
        
        'caption' => '表格名称',
        'captionOptions' => ['style' => 'text-align:center'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
            
            [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    return $data->sex === 'F' ? '女' : '男';
                },
            ],

            'birthday',
                        
            'country_code',
                        
            'create_time',
            'update_time',
        [
            'attribute' => 'name',
            'format' => 'text'
        ],
        [
            'attribute' => 'birthday',
            'format' => ['date', 'php:Y-m-d']
        ],

                        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '＜{button1}＞ | ＜{button2}＞',
                'buttons' => [
                    'button1' => function ($url, $model, $key) {
                        return "button1";
                    },
                    'button2' => function ($url, $model, $key) {
                        return "button2";
                    },
                 ],
            ],
                        
                        
        ],
    ]); ?>
    
    

</div>
