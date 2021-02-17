<?php


namespace app\controllers;

use app\components\CryptoCompareApi;
use app\components\widget\UpdateGangsterDataWidget;
use app\models\Gangster;
use Yii;
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
        Yii::$app->response->format = Response::FORMAT_JSON;

        $cryptoForm = new CryptoForm();
        if ($cryptoForm->load(\Yii::$app->request->get())) {
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }

        return [
            'error' => $data['error'] ?? $data,
            'success' => $data,
            'html' => UpdateGangsterDataWidget::widget(['gangster' => $data]),
        ];
    }

}