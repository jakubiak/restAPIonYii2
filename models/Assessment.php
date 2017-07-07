<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Assessment extends ActiveRecord
{

    /**
     * Specifies which set of fields provided by fields() method will be returned
     * @var string
     */
    public static $fieldsFilter = 'full_list';

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'assessment';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function fields()
    {

        $fields['full_list'] = [
            'id',
            'name',
            'version_number',
            'language_code',
            'assessment_type',
            'created_at',
            'updated_at'
        ];

        if (is_array(static::$fieldsFilter)) {
            return array_intersect(static::$fieldsFilter, $fields['full_list']);
        }
        return $fields[static::$fieldsFilter];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        # ============ Use separate rules ============ #

        return $scenarios;
    }

    public function rules()
    {
        return [
            [['name', 'version_number'], 'trim'],
            [['name','version_number','language_code','assessment_type'], 'required'],
            [['assessment_type' , 'language_code'], 'string', 'length' => [1, 16]],
        ];
    }
}
