<?php


use app\models\UserSearch;
use app\assets\TestAsset;
use yii\data\ActiveDataProvider;
use yii\web\View;
use app\widgets\TeamWidget;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;


/** @var View $this */
/** @var UserSearch $userSearch */
/** @var ActiveDataProvider $dataProvider */

TestAsset::register($this)
?>

<!-- виджет с командами -->
<?//= TeamWidget::widget()?>

<?php Pjax::begin(); ?>
    <h1>Фильтрация пользователей.</h1>

        <div class="container">

            <?= $this->render('_form_search', ['userSearch' => $userSearch]) ?>

        </div>
        <table class="table table-bordered thead-dark">


            <?= $this->render('_user_search', ['dataProvider' => $dataProvider]) ?>


        </table>

    <div class="container">
        <?/*php
        echo LinkPager::widget([
            'pagination' => $dataProvider->pagination,
        ]);
        */?>
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_user', // по умолчанию
        ]);
         ?>
    </div>

<?/*= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $userSearch,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'], // нумирация массива
        'name',
        'last_name',
        'email',
        'salary',
//        'age',
        [
            'attribute' => 'age',
            'filter' => ['30', '40', '50'], // добавлен выподающий список с фильтром
            'headerOptions' => ['class' => 'btn btn-warning'] // меняем класс
        ],
//        'date_create:datetime', // добавление новых колонок
//        'date_update:datetime',
        //иконки для виджета
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}{delete}{buttons}', //значения по умолчанию
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('update', $url);
                },
                // передаём action страницы {buttons}
                'buttons' => function ($url, $model, $key) {
                    return Html::a('<button type="submit" class="btn btn-success">button</button>', $url);
                },
            ],
            'visibleButtons' => [
                    // скроет кнопку user 43
                'delete' => function ($model, $key, $index) {
                    return $model->age == 43 ? false : true;
                },
            ],
        ],
    ],
]); */?>


<!--    <div class="container">-->
        <?php /*
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_user', // по умолчанию
        ]);
        */ ?>
<!--    </div>-->
<?php Pjax::end(); ?>