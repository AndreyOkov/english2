<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Words */
/* @var $uploadim app\models\ImageUpload */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="words-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($uploadim, 'image')->fileInput(); ?>

    <?= $form->field($model, 'enword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ruword')->textInput(['maxlength' => true])->dropDownList(\app\models\Tags::find()->select(['name','id'])->indexBy('id')->column(),['prompt'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
