<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Person(ListView)');

$this->params['breadcrumbs'][] = ['label' => 'GridView & ListView', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel, 'type'=>'listview']); ?>

    <?= $listview = ListView::widget( [
            'dataProvider' => $dataProvider,
            'viewParams'=>[],
            'itemView' => '_listview',
        ] ); ?>
    

</div>
