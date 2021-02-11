<?php

namespace app\modules\test\controllers;

use app\models\Gangster;
use yii\web\Controller;

/**
 * Default controller for the `test` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMandarin()
    {
//        $gangsters = Gangster::find()->all();
        $gangsters = Gangster::find()->where('status = 0')->all();
        return $this->render('mandarin', ['gangsters' => $gangsters]);
    }
}
