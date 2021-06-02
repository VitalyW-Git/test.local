<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @return string
//     */
//    public function actionCreate()
//    {
//        $model = new Article();
//        $post = Yii::$app->request->post();
//        if($model->load($post))
//            {
//                $model->detailPicture = UploadedFile::getInstance($model, 'detailPicture');
//                $model->previewPicture = UploadedFile::getInstance($model, 'previewPicture');
//                if ($model->save()) {
//                    return $this->redirect(['update', 'id' => $model->id]);
//                }
//            }
//        return $this->render('create',[
//            'model' => $model
//        ]);
//    }


    public function actionCreate()
    {
        $model = new Article();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->save()) {
                $model->detail_picture = UploadedFile::getInstance($model, 'detail_picture');
                if ($model->validate()) {
                    $path = realpath(dirname(__FILE__)).'/../web/img/preview/'.'444.';
                    $model->detail_picture->saveAs($path . $model->detail_picture->extension);
                }
            }
        }
        return $this->render('create', ['model' => $model]);
    }


    /**
     * @param $id
     * @return string|Response
     */
    public function actionUpdate($id)
    {
        $model = Article::findOne($id);

        if($model->load(Yii::$app->request->post()))
        {
            $model->detailPicture = UploadedFile::getInstance($model, 'detailPicture');
            $model->previewPicture = UploadedFile::getInstance($model, 'previewPicture');
            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }

}
