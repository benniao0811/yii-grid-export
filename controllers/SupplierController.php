<?php

namespace app\controllers;

use Yii;
use app\models\Supplier;
use app\models\SupplierSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SupplierController extends Controller
{

    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 列表
     */
    public function actionIndex()
    {
        $searchModel = new SupplierSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 添加
     */
    public function actionAdd()
    {
        $model = new Supplier();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->load($data) && $model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

//    /**
//     *详情
//     */
//    public function actionInfo($id)
//    {
//        return $this->render('info', [
//            'model' => Supplier::findOne($id),
//        ]);
//    }
//
//    /**
//     *更新
//     */
//    public function actionEdit($id)
//    {
//        $model = Supplier::findOne($id);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['info', 'id' => $model->id]);
//        }
//
//        return $this->render('edit', [
//            'model' => $model,
//        ]);
//    }

    /**
     * 删除
     */
    public function actionDelete($id)
    {
        $id = Yii::$app->request->get('id');
        $model = Supplier::findOne($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * 导出
     */
    public function actionExportShow()
    {
        $model = new Supplier();
        $model->ids = $this->request->post('ids');
        $model->checkAll = $this->request->post('checkAll');
        $model->id = $this->request->post('id');
        $model->name = $this->request->post('name');
        $model->code = $this->request->post('code');
        $model->t_status = $this->request->post('t_status');
        if ($this->request->isPost) {
            return $this->render('export', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 导出
     */
    public function actionExport()
    {
//        dd($this->request->post('Supplier'));
        if ($this->request->isPost) {
            $fields = array_keys($this->request->post("field"));
            $fileName = '供应商信息'.date('Ymd').'.csv';

            $where = $whereValues = [];
            $param = $this->request->post('Supplier');
            if ($param["checkAll"] == 'true') {
                if ($id = $param["id"]) {
                    $where[] = "id=:id";
                    $whereValues[":id"] = $id;
                }
                if ($name = $param["name"]) {
                    $where[] = "name like :name";
                    $whereValues[":name"] = '%'.$name.'%';
                }
                if ($code = $param["code"]) {
                    $where[] = "code like :code";
                    $whereValues[":code"] = '%'.$code.'%';
                }
                if ($tStatus = $param["t_status"]) {
                    $where[] = "t_status=:t_status";
                    $whereValues[":t_status"] = $tStatus;
                }

            } else {//不全选的情况
                $ids = explode(",", $param["ids"]);
                foreach ($ids as $k => $v) {
                    $ids[$k] = intval($v);
                }
                $where[] = "id in (".implode(",", $ids).")";
            }

            $data = Supplier::find()->select($fields)->where(implode(" and ", $where), $whereValues)->asArray()->all();

            $content = [];
            foreach ((array) $data as $row) {
                if (empty($content)) {
                    $column_header = [];
                    foreach ((array) $row as $field => $value) {
                        $column_header[] = $field;
                    }
                    $content[] = implode(",", $column_header);
                }
                $content[] = implode(",", $row);
            }
            $content_csv = implode("\n", $content);
            $content_csv = iconv("utf-8", "GBK//ignore", $content_csv);

            header("Content-Type: application/vnd.ms-excel; charset=utf-8");
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename={$fileName}");
            header("Content-Transfer-Encoding: binary");

            echo $content_csv;
            exit;

        }


    }
}
