<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 10.03.2017
 * Time: 21:18
 */

namespace app\models;


namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;

    // другие свойства
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload(UploadedFile $file, $currentImage)
    {
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'images/';
    }

    private function genFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName))) . '.' . $this->image->extension;
    }

    public function deleteCurrentImage($currentImage)
    {


        if ($this->fileExists($currentImage)) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->genFilename();
        $this->image->saveAs($this->getFolder() . $filename);
        return $filename;
    }

    public function fileExists($currentImage)
    {

        if (!empty($currentImage) && $currentImage != null) {

            return file_exists($this->getFolder() . $currentImage);
        }
    }
}