<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\backend\web;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
    <p style=""><?= LinkPager::widget(['pagination' => $pagination]) ?></p>

    <!-- new card format -->
 
<?php foreach ($items as $item): ?>


  <div class="card-group" style="">
  <div class="card" style="float: left; width: 25%; height: 400px; text-align: center; border-radius: 5px; margin: 0px 0px 2px ;">
    <img src="<?php echo Yii::getAlias('@web').'/'.$item->imageFile; ?>" class="card-img-top" alt="find" style="width: 70%; height: 40%; border-radius: 5px;">
    <div class="card-body" style="">
      <h5 class="card-title" style="font-size: x-large;"><?= Html::encode("{$item->name}") ?></h5>
      <p class="card-text" style="font-size: small;"><?= Html::encode("{$item->description}") ?></p>
    </div>
    <div class="card-footer">
      <p>
        <?= Html::button('Order now!', ['value'=>Url::to('index.php?r=order/create'),'class' => 'btn btn-success', 'id' =>'modalButton']) ?>
    </p>

    <?php
           Modal::begin([
    // 'header' => '<h2>Make An Order</h2>',
    'id' => 'modal',
    // 'toggleButton' => ['label' => 'click me'],
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
            ?>
      <!-- <small class="text-muted" style="font-size: large;"><a href="http://localhost/order3/orders/frontend/web/index.php?r=order%2Findex">Order</a></small> -->
    </div>
  </div>
</div>
<?php endforeach; ?>


    <!-- end of new card format -->
    
</div>

    