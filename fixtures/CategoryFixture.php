<?php
use yii\test\ActiveFixture;

class CategoryFixture extends ActiveFixture{
    public $modelClass='app\models\Category';
    public $dataFile='@app/fixtures/data/category.php';
}