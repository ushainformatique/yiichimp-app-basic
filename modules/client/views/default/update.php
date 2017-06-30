<?php

use yii\helpers\Html;
use usni\library\widgets\BrowseDropdown;

/* @var $this usni\library\web\View */
/* @var $formDTO usni\library\dto\FormDTO */
$model  = $formDTO->getModel();
$this->title = 'Update Client: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$browseParams   = ['permission' => 'client.updateother',
                   'data'   => $formDTO->getBrowseModels(),
                   'model'  => $model];
echo BrowseDropdown::widget($browseParams);
?>

<div class="client-update">

    <?= $this->render('_form', [
        'formDTO' => $formDTO, 'caption' => $this->title
    ]) ?>

</div>
