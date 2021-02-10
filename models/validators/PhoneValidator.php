<?php

namespace app\models\validators;

use yii\i18n\Formatter;
use yii\validators\Validator;

class PhoneValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $phoneValue = $model->$attribute;
        $pattern = '#\d \d{3} \d{3} \d{4}#';
        preg_match($pattern, $phoneValue, $matches);
        if( !$matches){
            $this->addError($model, $attribute, 'Ваш телефон не сответствует формату!');
        }
    }
}

//return preg_replace( "/^(\d)(\d{3})(\d{3})(\d{2})(\d{2})$/", "+$1 ($2) $3-$4-$5", $value );