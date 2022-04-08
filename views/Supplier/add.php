<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->params['breadcrumbs'][] = ['label' => '供应商', 'url' => ['index']];
$this->params['breadcrumbs'][] = '添加供应商';
?>
<div class="supplier-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 't_status')->dropDownList(['ok' => 'Ok', 'hold' => 'Hold',], ['prompt' => '']) ?>
    <div class="form-group">
        <?= Html::submitButton('添加', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
