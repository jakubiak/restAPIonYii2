<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Question extends ActiveRecord
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
        return 'question';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getAnswers()
    {
        Answer::$fieldsFilter = 'simple_list';
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }

    public function fields()
    {

        $fields['simple_list'] = [
            'id',
            'question_text',
            'language_code',
            'question_type',
            'is_required',
            'selection_type',
        ];
        $fields['full_list'] = [
            'id',
            'question_text',
            'version_number',
            'language_code',
            'question_type',
            'is_required',
            'selection_type',
            'display_order',
            'answers',
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
            [['question_text', 'version_number'], 'trim'],
            [['question_text', 'version_number', 'language_code', 'question_type', 'display_order'], 'required'],
            [['question_type', 'language_code'], 'string', 'length' => [1, 16]],
            [['display_order', 'selection_type', 'is_required'], 'integer'],
            ['is_required', 'in', 'range' => [0, 1]],
        ];
    }
}
