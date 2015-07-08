<?php

use yii\helpers\Html;
$this->title = Yii::t('app', 'GridView & ListView Sample');

$this->params['breadcrumbs'][] = ['label' => 'GridView & ListView', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a(Yii::t('app', 'ListView'), ['listview'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a(Yii::t('app', 'GridView'), ['gridview'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>