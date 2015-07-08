<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= $message ?>, World
    </p>
    
    <p>
        <?= json_encode([1=>'1',2=>'1',3=>'1',4=>'1']) ?>
    </p>

    <code><?= __FILE__ ?></code>
</div>
