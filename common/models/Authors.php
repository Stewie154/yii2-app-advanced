<?php

namespace common\models;

use yii\db\ActiveRecord;

class Authors extends ActiveRecord {
    public function getPosts() {
        return $this->hasMany(Posts::className(), ['author_id' => 'id']);
    }
}