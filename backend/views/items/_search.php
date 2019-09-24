<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ccb3dfa9c4d76f54b877fcd233392fe094f1edc1
    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_on') ?>

<<<<<<< HEAD
=======
>>>>>>> 765d19b39c09f592c2bdf7561dbb5aee25f22366
=======
>>>>>>> ccb3dfa9c4d76f54b877fcd233392fe094f1edc1
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
