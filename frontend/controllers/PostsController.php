<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Posts;
use yii\web\HttpException;
use yii;

class PostsController extends Controller
{
    public function actionIndex()
    {
        $query = Posts::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $posts = $query->orderBy('ID')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'posts' => $posts,
            'pagination' => $pagination,
        ]);
    }
    public function actionView($ID) {
        $model=Posts::findOne($ID);
        if ($model === null) {
            throw new HttpException(404, "Couldn't find post");
        }
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionNew() {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // valid data received in $model

            // do something meaningful here about $model ...

            return $this->render('view', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('new', ['model' => $model]);
        }
    }
}