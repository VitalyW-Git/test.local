<?php

namespace app\models;


use app\models\common\behaviors\DateToTimeBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "detail".
 *
 * @property int $id
 * @property string $name Название
 * @property string $content Описание
 * @property string|null $detail_picture Изображение
 * @property string|null $preview_picture Изображение предпросмотр
 * @property string $date_t
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UploadedFile $detailPicture
 * @property UploadedFile $previewPicture
 */
class Article extends ActiveRecord
{

    /**
     * @var UploadedFile
     */
    public $previewPicture;

    /**
     * @var UploadedFile
     */
    public $detailPicture;

    public $date_formatted;

    public function behaviors()
    {
        return [
            [
                'class' => DateToTimeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'date_formatted',
                    ActiveRecord::EVENT_AFTER_FIND => 'date_formatted',
                ],
                'timeAttribute' => 'date_t'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'safe'],
//            ['date_t', 'required', 'message' => 'Введите дату', 'on' => ['default']],
            [['date_t'], 'integer'],
            ['date_formatted', 'date', 'format' => 'php:d.m.Y'],
            [['name', 'content', 'detail_picture', 'preview_picture'], 'string', 'max' => 255],
            [['detailPicture', 'previewPicture'], 'file', 'extensions' => 'jpg, jpeg, png, gif'],
            ['detailPicture', 'uploadDetailPicture'],
            ['previewPicture', 'uploadPreviewPicture']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'content' => 'Content',
            'detail_picture' => 'Detail Picture',
            'preview_picture' => 'Preview Picture',
            'date_t' => 'Date',
        ];
    }

//    public function beforeSave($insert)
//    {
//        $this->date_t = date('Y.m.d', strtotime($this->date_t));
//        return parent::beforeSave($insert);
//    }
    /**
     * Загрузка файла основного изображения
     * @param $attribute
     */
    public function uploadDetailPicture($attribute)
    {
        $this->deleteDetailFile();
        if (!file_exists(Yii::getAlias('@articleDetail'))) {
            mkdir(Yii::getAlias('@articleDetail'));
        }
        $this->detail_picture = $this->name . '_base_' . time() . '.' . $this->$attribute->extension;
        if (!$this->$attribute->saveAs(Yii::getAlias('@articleDetail') . '/' . $this->detail_picture)) {
            $this->addError($attribute, 'Ошибка загрузки файла.');
        }
    }
    /**
     * Загрузка файла превью
     * @param $attribute
     */
    public function uploadPreviewPicture($attribute)
    {
        $this->deletePreviewFile();
        if (!file_exists(Yii::getAlias('@articlePreview'))) {
            mkdir(Yii::getAlias('@articlePreview'));
        }
        $this->preview_picture = $this->name . '_preview_' . time() . '.' . $this->$attribute->extension;
        if (!$this->$attribute->saveAs(Yii::getAlias('@articlePreview') . '/' . $this->preview_picture)) {
            $this->addError($attribute, 'Ошибка загрузки файла.');
        }
    }
    /**
     * Получение полного пути к файлу основного изображения
     * @return string
     */
    public function getDetailFilePath()
    {
        return Yii::getAlias('@articleDetail') . '/' . $this->detail_picture;
    }
    /**
     * Получение полного пути к файлу превью
     * @return string
     */
    public function getPreviewFilePath()
    {
        return Yii::getAlias('@articlePreview') . '/' . $this->preview_picture;
    }

    /**
     * Удаление файла основного изображения
     */
    public function deleteDetailFile()
    {
        @unlink($this->getDetailFilePath());
    }

    /**
     * Удаление файла превью
     */
    public function deletePreviewFile()
    {
        @unlink($this->getPreviewFilePath());
    }
}
