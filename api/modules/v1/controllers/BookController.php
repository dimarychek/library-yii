<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\ServerErrorHttpException;
use api\modules\v1\models\Book;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class BookController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Book';
    public $scenario = Model::SCENARIO_DEFAULT;

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);

        return $actions;
    }

    /**
     * @return array
     */
    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['update'] = ['POST'];

        return $verbs;
    }

    /**
     * Custom action update
     *
     * @param $id
     * @return \yii\db\ActiveRecordInterface the model being updated
     * @throws ServerErrorHttpException
     */
    public function actionUpdate($id)
    {
        $model = Book::findOne($id);
        $model->load(Yii::$app->request->queryParams, '');

        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
        }

        return $model;
    }
}
