<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => base64_encode($model->user_id)], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <?= Html::a('All Users', ['index'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'user_name',
            'user_full_name',
            'email_id:email',
            // 'password',
            'mobile_number',
            // 'district_id',
            /*'is_active',
            'is_deleted',
            'created_on',
            'modified_on',*/
        ],
    ]) ?>

</div>
</div>