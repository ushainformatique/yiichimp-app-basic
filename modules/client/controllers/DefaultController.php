<?php

namespace app\modules\client\controllers;

use Yii;
use usni\library\web\actions\CreateAction;
use usni\library\web\actions\UpdateAction;
use usni\library\web\actions\IndexAction;
use usni\library\web\actions\DeleteAction;
use usni\library\web\actions\BulkDeleteAction;
use usni\library\web\actions\ViewAction;
use usni\library\web\actions\BulkEditAction;
use usni\library\web\Controller;
use yii\filters\VerbFilter;
use app\modules\client\models\Client;
use usni\UsniAdaptor;
/**
 * DefaultController implements the CRUD actions for Client model.
 *
 * @package app\modules\client\controllers
 */
class DefaultController extends Controller
{   
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        echo $action->id . "<br/>";
        if(parent::beforeAction($action))
        {
            $tableSchema        = UsniAdaptor::app()->db->schema->getTableSchema(Client::tableName());
            if($action->id != 'create-tables' && $tableSchema === null)
            {
                return $this->redirect(UsniAdaptor::createUrl('/client/default/create-tables'))->send();
            }
            return true;
        }
        return false;
    }
        /**
     * inheritdoc
     */
    public function actions()
    {
        return [
            'create' => ['class' => CreateAction::className(),
                         'modelClass' => Client::className(),
                         'updateUrl'  => 'update'
                        ],
            'update' => ['class' => UpdateAction::className(),
                         'modelClass' => Client::className()
                        ],
            'index'  => ['class' => IndexAction::className(),
                         'modelClass' => Client::className()
                        ],
            'view'   => ['class' => ViewAction::className(),
                         'modelClass' => Client::className(),
                        ],
            'delete'   => ['class' => DeleteAction::className(),
                           'modelClass' => Client::className(),
                           'redirectUrl'=> 'index',
                           'permission' => 'client.deleteother'
                        ],
            'bulk-edit' => ['class' => BulkEditAction::className(),
                'modelClass' => Client::className()
            ],
            'bulk-delete' => ['class' => BulkDeleteAction::className(),
                  'modelClass' => Client::className()
            ],
                    ];
    }
    
    /**
     * Create necessary tables
     */
    public function actionCreateTables()
    {
        return $this->render('create-tables');
    }
}    

