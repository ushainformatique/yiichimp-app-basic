<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace app\commands;

use yii\console\Controller;
use usni\library\modules\users\models\User;
use usni\UsniAdaptor;
/**
 * Builds the table and data
 *
 * The command would be as follows yii build/tables
 * @package console\controllers
 */
class BuildController extends Controller
{
    /**
     * Build tables
     */
    public function actionTables()
    {
        $tableManagers  = ['usni\library\db\ApplicationTableManager', 'usni\library\modules\users\db\TableManager',
                            'usni\library\modules\auth\db\TableManager', 'usni\library\modules\language\db\TableManager',
                            'usni\library\modules\notification\db\TableManager'];
        foreach($tableManagers as $tableManager)
        {
            $instance = new $tableManager();
            $instance->dropTables();
            $instance->buildTables();
        }
    }
    
    /**
     * Build Data
     */
    public function actionData()
    {
        $dataManagers  = ['usni\library\db\ApplicationDataManager', 'usni\library\modules\auth\db\AuthDataManager',
                            'usni\library\modules\users\db\UsersDataManager', 'usni\library\modules\language\db\LanguageDataManager'];
        foreach($dataManagers as $managerClassName)
        {
            $modelClassName     = $managerClassName::getModelClassName();
            //Delete existing records
            if($modelClassName != null)
            {
                $records            = $modelClassName::find()->all();
                foreach($records as $record)
                {
                    if($modelClassName == User::className())
                    {
                        if($record->id == User::SUPER_USER_ID)
                        {
                            continue;
                        }
                    }
                    $record->delete();
                }
            }
            $managerClassName::getInstance()->loadDefaultData();
            $managerClassName::getInstance()->loadDemoData();
        }
    }
    
    /**
     * Create super user
     */
    public function actionSuper()
    {
        $userSql = "insert  into `tbl_user`(`id`,`username`,`password_reset_token`,`password_hash`,`auth_key`,`status`,`person_id`,`login_ip`,`last_login`,`timezone`,`type`,`created_by`,`modified_by`,`created_datetime`,`modified_datetime`) values 
(1,'super',NULL,'$2y$13\$G8js1BJBeOnGmoJSwDhVI.a4aJp4Gb.3JLzHEt8rw5ish5674EgQG','bh5QxaZNUknazsE-FFkjZ2vTdnJyklG1',1,1,NULL,NULL,'Asia/Kolkata','system',0,0,NOW(),NOW());";
        $personSql = "insert  into `tbl_person`(`id`,`firstname`,`lastname`,`mobilephone`,`email`,`avatar`,`profile_image`,`created_by`,`modified_by`,`created_datetime`,`modified_datetime`) values 
(1,'Super','Admin','','demo@xyz.com',NULL,NULL,0,0,NOW(),NOW());";
        $addressSql = "insert  into `tbl_address`(`id`,`address1`,`address2`,`city`,`state`,`country`,`postal_code`,`relatedmodel`,`relatedmodel_id`,`type`,`status`,`created_by`,`modified_by`,`created_datetime`,`modified_datetime`) values 
(1,'302','9A/1, W.E.A, Karol Bagh','New Delhi','Delhi','IN','110005','Person',1,1,1,0,0,NOW(),NOW());";
        UsniAdaptor::app()->db->createCommand($personSql)->execute();
        UsniAdaptor::app()->db->createCommand($userSql)->execute();
        UsniAdaptor::app()->db->createCommand($addressSql)->execute();
    }
}
