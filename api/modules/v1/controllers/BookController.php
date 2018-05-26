<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class BookController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Book';
}
