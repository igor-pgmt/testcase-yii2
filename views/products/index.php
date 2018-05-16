<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

<h1><?= Html::encode($this->title) ?></h1>
<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<p>
<?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // '_id',
        'appid',
        [
            'attribute' => 'name',
            'value' => function ($model) {
                return Html::a(Html::encode($model['name']), Url::to(['view', 'appid' => Html::encode($model['appid'])]));
            },
            'format' => 'raw',
        ],
        // ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); ?>
    <?php Pjax::end(); ?>
    </div>
    