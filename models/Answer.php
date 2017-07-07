<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Answer extends ActiveRecord
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
        return 'answer';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getQuestion()
    {
        Question::$fieldsFilter = 'simple_list';
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }

    public function fields()
    {
        $fields['simple_list'] = [
            'answer_text',
            'answer_image',
            'is_default',
            'answer_score',
            'version_number',
            'display_order'
        ];

        $fields['full_list'] = [
            'id',
            'question_id',
            'question',
            'answer_text',
            'answer_image',
            'is_default',
            'answer_score',
            'version_number',
            'display_order',
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
            [['answer_text', 'answer_image'], 'trim'],
            [['answer_text', 'question_id', 'answer_image', 'is_default', 'answer_score', 'display_order', 'version_number'], 'required'],
            ['question_id', 'exist', 'targetClass' => Question::className(), 'targetAttribute' => 'id'],
            [['display_order'], 'integer'],
            ['is_default', 'in', 'range' => [0, 1]],
        ];
    }
}
