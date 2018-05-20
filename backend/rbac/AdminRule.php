<?php

namespace backend\rbac;

use yii\rbac\Item;
use yii\rbac\Rule;
use Yii;

class AdminRule extends Rule
{
    /**
     * @inheritdoc
     */
    public $name = 'autor';
    /**
     * @inheritdoc
     */
    public function execute($user, $item, $params)
    {
        return isset($params['model']) ? $params['model']['author_id'] == $user : false;
    }
}