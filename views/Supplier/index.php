<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Supplier;

$this->params['breadcrumbs'][] = '供应商';

//$url = Url::toRoute(['supplier/export']);
$url = Url::toRoute(['supplier/export-show']);

?>
<div>
    <p>
        <?= Html::a('添加', ['add'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('导出', 'javascript:;', [
            'class' => 'btn btn-success',
            'onclick' => "formExport(this);",
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataColumnClass' => "yii\grid\DataColumn",
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //默认layout的表格三部分可不写：几条简介，表格，分页；可以去掉任意部分
        //'layout' => "{summary}\n{items}\n{pager}" ,
        //没有数据时候显示的内容和html样式
        'emptyText' => '当前没有内容',
        'emptyTextOptions' => ['style' => 'color:red;font-weight:bold'],
        //给所有的行属性增加id，或class，方便后面选择后整行改变颜色
        'rowOptions' => function ($model) {
            return ['id' => "tr-".$model->id];
        },
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
            ],
            'id',
            'name',
            'code',
            [
                'attribute' => 't_status',
                'filter' => ['hold' => 'hold', 'ok' => 'ok'],
            ],
            [
                'class' => ActionColumn::className(),
                "header" => "操作",
                'headerOptions' => ['width' => '80'],
                'template' => '{delete}',
//                'template' => '{view} {update} {delete}',
                "buttons" => [
                    //下面buttons可以不写delete函数，delete默认调用当前控制器下面的delete方法
//                    "delete" => function ($url, $model, $key) {//print_r($key);exit;
//                        return "<a href='javascript:;' class='_delete' data-url='".Yii::$app->urlManager->createUrl(['/supplier/delete', 'id' => $model->id])."'>删除</a>";
//                    },
//                    "update" => function ($url, $model, $key) {//print_r($key);exit;
//                        //$model 为当前的1条数据
//                        //key就是id
//                        //$url就是根据id自动拼出链接 /supplier/update?id=1
//                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['supplier/edit', 'id' => $model->id]), ['title' => '修改']);
//                    },
                ],
            ],
        ],
    ]); ?>


</div>

<script>
    function formExport(_this) {
        // alert($("input[name='SupplierSearch[name]']").val());
        // var tStatus = $("input[name='SupplierSearch[t_status]']").find("option:selected").text();
        var id = $("input[name='SupplierSearch[id]']").val();
        var name = $("input[name='SupplierSearch[name]']").val();
        var code = $("input[name='SupplierSearch[code]']").val();
        // var tStatus = $("input[name='SupplierSearch[t_status]']").val();
        var tStatus = $("input[name='SupplierSearch[t_status]']").find("option:selected").text();
        var checkAll = $('[name=selection_all]').is(':checked');
        var many_check = $("input[name='selection[]']:checked");
        var ids = "";
        $(many_check).each(function () {
            ids += this.value + ',';
        });
        //去掉最后一个逗号
        if (ids.length > 0) {
            ids = ids.substr(0, ids.length - 1);
        } else {
            alert('请选择至少一条记录！');
            return false;
        }

        // alert(ids);
        document.write("<form action='<?=$url?>' method=post name=myForm style='display:none'>");
        // var ids = $('#grid').yiiGridView('getSelectedRows');
        document.write("<input type=hidden name=ids value=" + ids + ">");
        document.write("<input type=hidden name=checkAll value=" + checkAll + ">");
        document.write("<input type=hidden name=id value=" + id + ">");
        document.write("<input type=hidden name=name value=" + name + ">");
        document.write("<input type=hidden name=code value=" + code + ">");
        document.write("<input type=hidden name=t_status value=" + tStatus + ">");
        document.write("</form>");
        document.myForm.submit();
    }
</script>
