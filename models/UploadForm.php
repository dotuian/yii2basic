<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file'],
        ];
    }
    
    public function afterValidate() {
        parent::afterValidate();
        
        
        Yii::error("========== validate ==========");
    }
}

?>
