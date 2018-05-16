<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'pair') ?>

    <?= $form->field($model, 'addingtime') ?>

    <?= $form->field($model, 'ask') ?>

    <?= $form->field($model, 'bid') ?>

    <?php // echo $form->field($model, 'last') ?>

    <?php // echo $form->field($model, 'high') ?>

    <?php // echo $form->field($model, 'low') ?>

    <?php // echo $form->field($model, 'open') ?>

    <?php // echo $form->field($model, 'averages') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'changes') ?>

    <?php // echo $form->field($model, 'volumepercent') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'displaytimestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
