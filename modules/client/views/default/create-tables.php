<?php

use yii\helpers\Html;


/* @var $this usni\library\web\View */
/* @var $formDTO usni\library\dto\FormDTO */

$this->title = 'Create Client Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info">
        <strong>Please execute the following commands to install the necessary tables.</strong>
        <br/>
        yii table/add app\modules\client\db\ClientTableBuilder
    </div>

</div>