<?php

namespace common\models;

use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public static function tableName() {
        return 'posts';
    }

    public function getAuthor() {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public function rules()
    {
        return [
            [['author_id', 'Title', 'Content', 'picture'], 'required'],
            [['Title', 'Content', 'picture'], 'string'],
            [['picture', 'Facebook', 'Twitter', 'Instagram'], 'url'],
        ];
    }
}