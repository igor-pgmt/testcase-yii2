<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

<h1><?= $this->title ?></h1>

<?php if ($product->data['price'] !="") {?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'appid',
            'name',
            [
                'label' => 'USD',
                'value' =>($product->data['price']/100)
            ],
            [
                'label' => 'BTC',
                'value' => ($product->data['price']/100)/$rates['BTCUSD']
            ],
            [
                'label' => 'ETH',
                'value' => ($product->data['price']/100)/$rates['ETHUSD']
            ],
            [
                'label' => 'LTC',
                'value' => ($product->data['price']/100)/$rates['LTCUSD']
            ],
            [
                'label' => 'XMR',
                'value' => ($product->data['price']/100)/$rates['XMRUSD']
            ],
            [
                'label' => 'XRP',
                'value' => ($product->data['price']/100)/$rates['XRPUSD']
            ],
            [
                'label' => 'ZEC',
                'value' => ($product->data['price']/100)/$rates['ZECUSD']
            ],
            [
                'label' => 'BCH',
                'value' => ($product->data['price']/100)/$rates['BCHUSD']
            ],
        ],
        ]) ?>
        
        <?php } else { ?>
            
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'appid',
                    'name',
                    [
                        'label' => 'USD',
                        'value' =>"No value"
                    ],
                ],
                ]) ?>
                
                <?php }  ?>
                
                </div>
                