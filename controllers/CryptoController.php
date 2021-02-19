<?php


namespace app\controllers;

use app\components\widget\CryptoConverterWidget;
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
        Yii::$app->response->format = Response::FORMAT_JSON;

        $cryptoForm = new CryptoForm();
        $success = true;
        $error = null;
        if ( Yii::$app->request->isAjax && $cryptoForm->load(\Yii::$app->request->get())) {
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }
        if(empty($data)){
            $firstErrorAsArray = $cryptoForm->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $data['error'] ?? $error,
            'success' => $success,
            'html' => CryptoConverterWidget::widget([
                'data' => $data,
                'cryptoForm' => $cryptoForm,
                ]),
        ];
    }

}