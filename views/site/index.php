<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">


        <?= Html::a('Товары из Steam', ['/products'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('Курсы валют', ['/rates'], ['class'=>'btn btn-primary']) ?>


    </div>
</div>
