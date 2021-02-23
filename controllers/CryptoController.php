<?php


namespace app\controllers;

use Yii;
use app\components\widget\CryptoConverterWidget;
use app\components\CryptoCompareApi;
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
        if ($cryptoForm->load(\Yii::$app->request->get())) {
            $data = (new CryptoCompareApi($cryptoForm))->getData();
        }

        if(empty($data)){
            $firstErrorAsArray = $cryptoForm->firstErrors;
            $firstKey = array_key_first($firstErrorAsArray);
            $error = $firstErrorAsArray[$firstKey];
            $success = false;
        }

        return [
            'error' => $error,
            'success' => $success,
            'html' => CryptoConverterWidget::widget([
                'data' => $data,
                'cryptoForm' => $cryptoForm,
                ]),
        ];
    }


   /* public function actionCheckBox()
    {
        // Создаём экземпляр модели.
        $cryptoForm = new CryptoForm();
        // Устанавливаем формат ответа JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // Если пришёл AJAX запрос
        if (Yii::$app->request->isAjax) {
            // Получаем данные модели из запроса
            if ($cryptoForm->load(Yii::$app->request->get())) {
                $data = (new CryptoCompareApi($cryptoForm))->getData();
                //Если всё успешно, отправляем ответ с данными
                return [
                    "error" => null,
                    "html" => CryptoConverterWidget::widget([
                        'data' => $data,
                        'cryptoForm' => $cryptoForm,
                    ]),
                ];
            } else {
                // Если нет, отправляем ответ с сообщением об ошибке
                return [
                    "html" => null,
                    "error" => "error1"
                ];
            }
        } else {
            // Если это не AJAX запрос, отправляем ответ с сообщением об ошибке
            return [
                "html" => null,
                "error" => "error2"
            ];
        }
    }*/


}