<?php

namespace app\modules\client\models;

use usni\UsniAdaptor;
/**
 * This is the model class for table "{{%client}}".
 *
 */
class Client extends \usni\library\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
                    return [
                    'id' => 'ID',
                    'name' => 'Name',
                ];
            }
    
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios               = parent::scenarios();
        $scenarios['create']     = $scenarios['update'] = [
            'id',
            'name',
        ];
        return $scenarios;
    }
    
}
