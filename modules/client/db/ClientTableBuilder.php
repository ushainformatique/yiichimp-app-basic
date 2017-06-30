<?php
/**
 * @copyright Copyright (c) 2017 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://github.com/ushainformatique/yiichimp/blob/master/LICENSE.md
 */
namespace app\modules\client\db;

use usni\library\db\TableBuilder;
/**
 * ClientTableBuilder class file.
 * 
 * @package app\modules\client\db
 */
class ClientTableBuilder extends TableBuilder
{
    /**
     * @inheritdoc
     */
    protected function getTableSchema()
    {
        return [
            'id' => $this->primaryKey(11)->notNull(),
            'name'  => $this->string(64)->notNull()
        ];
    }
    
    /**
     * @inheritdoc
     */
    protected function doesCreateUpdateFieldsRequired()
    {
        return false;
    }
}