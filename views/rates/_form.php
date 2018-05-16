<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pair') ?>

    <?= $form->field($model, 'addingtime') ?>

    <?= $form->field($model, 'ask') ?>

    <?= $form->field($model, 'bid') ?>

    <?= $form->field($model, 'last') ?>

    <?= $form->field($model, 'high') ?>

    <?= $form->field($model, 'low') ?>

    <?= $form->field($model, 'open') ?>

    <?= $form->field($model, 'averages') ?>

    <?= $form->field($model, 'volume') ?>

    <?= $form->field($model, 'changes') ?>

    <?= $form->field($model, 'volumepercent') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'displaytimestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
