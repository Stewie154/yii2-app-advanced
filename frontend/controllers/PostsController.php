<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\Posts;
use yii\web\HttpException;
use common\models\Authors;
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

        $posts = $query->orderBy('id')
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

    public function actionEdit($ID) {
        $model=Posts::findOne($ID);

        if ($model === null) {
            throw new HttpException(404, "Couldn't find post");
        }

        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash ('success', "Post Updated");
                return $this->redirect('/posts/view/' . $model->id);
            }
        }

        return $this->render('edit', [
            'model' => $model
        ]);
    }
    
    public function actionDelete($ID) {
        $model=Posts::findOne($ID);
        $model->delete();
        Yii::$app->getSession()->setFlash ('danger', "Post Deleted");
        return $this->redirect('/posts/index');
    }

    public function actionFilter($ID) {
        
        $model = Authors::findOne(['id' => $ID]);
        if ($model == null) {
            throw new HttpException(404, "Couldn't find Author");
        }
        return $this->render('filter', ['model' => $model]);
    }

}