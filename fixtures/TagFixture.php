<?php
use yii\test\ActiveFixture;

class TagFixture extends ActiveFixture{
    public $modelClass='app\models\Tag';
    public $dataFile='@app/fixtures/data/tag.php';
}