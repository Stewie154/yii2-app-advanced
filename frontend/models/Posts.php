<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public static function tableName() {
        return 'posts';
    }

    public function rules()
    {
        return [
            [['Author', 'Title', 'Content', 'picture'], 'required'],
            [['Author', 'Title', 'Content', 'picture'], 'string'],
            [['picture'], 'url']
        ];
    }
}