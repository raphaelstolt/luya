<?php

namespace luya\validators;

use Yii;
use yii\validators\Validator;

/**
 * Checks a given string for given strength attributes.
 * 
 * This validator is commonly used to validate the strength of passwords.
 * 
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.6
 */
class StrengthValidator extends Validator
{
    /**
     * @var integer The minimum length of the string.
     */
    public $length = 8;
    
    /**
     * @var boolean Whether special chars are required in the string or not.
     */
    public $specials = true;
    
    /**
     * @var boolean Whether numbers are required in the string or not.
     */
    public $numbers = true;
    
    /**
     * @var boolean Whether letters are required in the string or not.
     */
    public $letters = true;
    
    /**
     * @var boolean Whether at least one upper char must exist in the string or not.
     */
    public $uppercase = true;
    
    /**
     * @var boolean Whether at least one lower case char must exist in the string or not.
     */
    public $lowercase = true;
    
    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        $value = $model->{$attribute};
        
        if ($this->length && strlen($value) <= $this->length) {
            return $model->addError($attribute, Yii::t('luya', 'The string must have a minimum length of {length} characters.', ['length' => $this->length]));
        }
        
        if ($this->specials && !preg_match('/\W/', $value)) {
            return $model->addError($attribute, Yii::t('luya', 'The string must include at least one special character.'));
        }
        
        if ($this->numbers && !preg_match('/\d/', $value)) {
            return $model->addError($attribute, Yii::t('luya', 'The string must include at least one digit'));
        }
        
        if ($this->letters && !preg_match('/\p{L}/', $value)) {
            return $model->addError($attribute, Yii::t('luya', 'The string must include at least one letter.'));
        }
        
        if ($this->uppercase && !preg_match('/[A-Z]/', $value)) {
            return $model->addError($attribute, Yii::t('luya', 'The string must include at least one uppercase letter.'));
        }
        
        if ($this->lowercase && !preg_match('/[a-z]/', $value)) {
            return $model->addError($attribute, Yii::t('luya', 'The string must include at least one lowercase letter.'));
        }
    }
}