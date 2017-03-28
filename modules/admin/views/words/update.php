<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Words */
/* @var $uploadim app\models\ImageUpload */


$this->title = 'Update Words: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Words', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="words-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    $uploadim = new \app\models\ImageUpload();
    $uploadim->image = $model->image;
    ?>
    <?= $this->render('_form', [
        'model' => $model,
        'uploadim' => $uploadim,
    ]) ?>

</div>
