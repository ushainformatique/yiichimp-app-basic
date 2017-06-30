<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace app\commands;

use yii\console\Controller;
/**
 * Builds the table from table builder or table manager
 *
 * The command would be as follows yii table/build {managerClassName}
 * managerClassName should be passed with forward slash for example backend/managers/OrderTableManager 
 * @package console\controllers
 */
class TableController extends Controller
{
    /**
     * Run table manager
     * @param string $managerClassName
     */
    public function actionBuild($managerClassName)
    {
        $managerClassName = str_replace('/', '\\', $managerClassName);
        $instance = new $managerClassName();
        $instance->dropTables();
        $instance->buildTables();
    }
    
    /**
     * Run add table
     * @param string $builderClassName
     */
    public function actionAdd($builderClassName)
    {
        $builderClassName = str_replace('/', '\\', $builderClassName);
        $instance = new $builderClassName();
        $instance->buildTable();
    }
}
