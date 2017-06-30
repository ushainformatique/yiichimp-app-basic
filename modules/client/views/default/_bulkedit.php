<?php
use usni\library\bootstrap\BulkEditActiveForm;
use usni\library\bootstrap\BulkEditFormButton;
use usni\UsniAdaptor;

$model          = new app\modules\client\models\Client(['scenario' => 'bulkedit']);
$form = BulkEditActiveForm::begin([
            'id'        => 'clientbulkeditview',
            'layout'    => 'horizontal',
            'caption'   => 'Client' . ' ' . UsniAdaptor::t('application', 'Bulk Edit')
        ]);
?>
Need to add the fields here for bulk edit
<?php echo BulkEditFormButton::widget();

BulkEditActiveForm::end();