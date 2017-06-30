<?php
use usni\UsniAdaptor;
use usni\library\grid\GridView;
use yii\grid\CheckboxColumn;
use usni\library\grid\ActionColumn;
use usni\library\grid\ActionToolbar;
use app\modules\client\models\Client;

/* @var $this usni\library\web\View */
$title          = 'Manage Clients';
$this->title    = $this->params['breadcrumbs'][] = $title;
$toolbarParams  = [
    'createUrl'     => 'create',
    'bulkEditFormView' => '@app/modules/client/views/default/_bulkedit',
    'showBulkEdit'  => true,
            'showBulkDelete'  => true,
        'bulkDeleteUrl' => 'bulk-delete',
        'gridId'        => 'clientgridview',
        'pjaxId'        => 'clientgridview-pjax',
        'bulkEditFormTitle' => 'Client' . ' ' . UsniAdaptor::t('application', 'Bulk Edit'),
    'bulkEditActionUrl' => 'bulk-edit',
    'bulkEditFormId'    => 'clientbulkeditview',
    'usePermissions'  => false,
    ];
$widgetParams   = [
                        'id'            => 'clientgridview',
                        'dataProvider'  => $gridViewDTO->getDataProvider(),
                        'filterModel'   => $gridViewDTO->getSearchModel(),
                        'caption'       => $title,
                        'modelClass'    => Client::className(),
                        'enablePjax'    => true,
                        'columns' => [
                                                            ['class' => CheckboxColumn::className()],
                                        'id',
            'name',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view} {update} {delete}',
                                'modelClassName' => Client::className()
                            ]
                        ],
                ];
    echo ActionToolbar::widget($toolbarParams);
echo GridView::widget($widgetParams);
