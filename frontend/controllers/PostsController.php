<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\Posts;
use yii\web\HttpException;

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
}