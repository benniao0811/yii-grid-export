<?php

namespace app\models;

use Yii;


class Supplier extends \yii\db\ActiveRecord
{
    public $ids;
    public $checkAll;


    public static function tableName()
    {
        return 'supplier';
    }

    public function rules()
    {
        return [
            [['t_status'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 6],
            [['code'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'code' => '编码',
            't_status' => '状态',
            'op' => '操作',
        ];
    }


}
