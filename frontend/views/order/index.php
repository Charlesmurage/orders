<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Create Order', ['value'=>Url::to('index.php?r=order/create'),'class' => 'btn btn-success', 'id' =>'modalButton']) ?>
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'item',
            'quantity',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
