<?php

use yii\helpers\Html;
use usni\library\bootstrap\ActiveForm;

/* @var $this usni\library\web\View */
/* @var $formDTO usni\library\dto\FormDTO */
/* @var $form use usni\library\bootstrap\ActiveForm */

$model          = $formDTO->getModel();

?>

<div class="client-form">

    <?php $form = ActiveForm::begin(['caption' => $caption]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
