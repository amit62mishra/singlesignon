<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearfix"></div>
<div class="container">
<section class="content" >   
<div class="application-index box-footer box-danger">

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

                        return Url::toRoute(['users/update', 'id' =>base64_encode($key)]);
                    }
                    else if ($action == "view") {
                        return Url::toRoute(['users/view', 'id' =>$key]);
                    }

                }

            ],
        ],
    ]); ?>


</div>
</section> 
</div>
