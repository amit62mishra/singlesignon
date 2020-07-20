<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_name',
            'user_full_name',
            'email_id:email',
            // 'password',
            //'mobile_number',
            //'district_id',
            //'is_active',
            //'is_deleted',
            //'created_on',
            //'modified_on',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'urlCreator' => function( $action, $model, $key, $index ){
                    if ($action == "update") {
                        return Yii::$app->urlManager->createAbsoluteUrl("users/update?id=".base64_encode($key));
                    }
                    else if ($action == "view") {
                        return Yii::$app->urlManager->createAbsoluteUrl("users/view/".$key);
                    }

                }

            ],
        ],
    ]); ?>


</div>
