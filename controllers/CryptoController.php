<?php


namespace app\controllers;

use Yii;
use app\components\CryptoCompareApi;
use app\components\widget\UpdateGangsterDataWidget;
use app\models\CryptoForm;
use yii\web\Controller;
use yii\web\Response;

class CryptoController extends Controller
{
    public function actionIndex()
    {
        $cryptoForm = new CryptoForm();
        if ($cryptoForm->load(\Yii::$app->request->get())) {
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }
        return $this->render('index', [
            'cryptoForm' => $cryptoForm,
            'data' => $data ?? [],
            ]);
    }


    public function actionCheckBox()
    {
        $cryptoForm = new CryptoForm();

        $s = \Yii::$app->request->get();
        debug($s);
        if ($cryptoForm->load()) {
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }

        return [
            'error' => $data['error'] ?? $data,
            'success' => $data,
            'html' => UpdateGangsterDataWidget::widget(['gangster' => $data]),
        ];
    }

}