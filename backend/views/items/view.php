<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\app\web;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Items */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            //'imageFile',
            //'created_at',
            //'updated_on',
        ],
    ]) ?>
     <img src="<?php echo Yii::getAlias('@web').'/'.$model->imageFile; ?>">

</div>
