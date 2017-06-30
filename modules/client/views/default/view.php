<?php

use yii\helpers\Html;
use usni\library\widgets\DetailView;
use usni\library\widgets\DetailBrowseDropdown;
use usni\UsniAdaptor;

/* @var $this usni\library\web\View */
$model          = $detailViewDTO->getModel();

$this->title = $model['name'];
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">
<?php
$editUrl        = UsniAdaptor::createUrl('client/default/update', ['id' => $model['id']]);
$deleteUrl      = UsniAdaptor::createUrl('client/default/delete', ['id' => $model['id']]);
$browseParams   = ['permission' => 'client.viewother',
                   'model' => $model,
                   'modalDisplay' => $detailViewDTO->getModalDisplay(),
                   'data'  => $detailViewDTO->getBrowseModels()];
$toolbarParams  = ['editUrl'   => $editUrl,
                   'deleteUrl' => $deleteUrl];
$widgetParams   = [
                    'detailViewDTO' => $detailViewDTO,
                    'caption'       => $model['name'],
                    'attributes'    => [
                                                        'id',
            'name',
                                       ],
                    
                    'actionToolbar' => $toolbarParams
                 ];
echo DetailBrowseDropdown::widget($browseParams);
echo DetailView::widget($widgetParams);
?></div>