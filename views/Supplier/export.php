<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Supplier */
/* @var $form yii\widgets\ActiveForm */

$this->params['breadcrumbs'][] = ['label' => '供应商', 'url' => ['index']];
$this->params['breadcrumbs'][] = '选择字段';
?>
<div>

    <?php $form = ActiveForm::begin(['action' => ['supplier/export'], 'method' => 'post']); ?>

    <?= Html::checkbox('field[id]', true, ['class' => '', "checked" => "checked", "label" => "ID", "onclick" => "return false;"]); ?>
    <?= Html::checkbox('field[name]', true, ['class' => '', "checked" => "checked", "label" => "name"]); ?>
    <?= Html::checkbox('field[code]', true, ['class' => '', "checked" => "checked", "label" => "code"]); ?>
    <?= Html::checkbox('field[t_status]', true, ['class' => '', "checked" => "checked", "label" => "t_status"]); ?>

    <?= Html::activeHiddenInput($model, 'ids') ?>
    <?= Html::activeHiddenInput($model, 'checkAll') ?>
    <?= Html::activeHiddenInput($model, 'id') ?>
    <?= Html::activeHiddenInput($model, 'name') ?>
    <?= Html::activeHiddenInput($model, 't_status') ?>

    <div class="form-group">
        <?= Html::submitButton('导出', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
