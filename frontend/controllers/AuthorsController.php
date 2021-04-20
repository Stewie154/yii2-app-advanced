<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Authors;
use yii\web\HttpException;
use yii;

class AuthorsController extends Controller {

    public function actionIndex() {

        $query = Authors::find();

        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $authors = $query->orderBy('ID')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'authors' => $authors,
            'pagination' => $pagination
        ]);
    }

    public function actionView($ID) {
        $model = Authors::findOne($ID);
        if ($model === null) {
            throw new HttpException(404, "Couldn't find post");
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }
}