<?php

use yii\helpers\Html;


/* @var $this usni\library\web\View */
/* @var $formDTO usni\library\dto\FormDTO */

$this->title = 'Create Client';
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', ['formDTO' => $formDTO, 'caption' => $this->title]) ?>

</div>
