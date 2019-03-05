<?php
namespace noIT\seo\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "seo_page".
 *
 * @property int $id
 * @property string $native_name
 * @property string $slug
 * @property string $seo_text
 * @property string $seo_title
 * @property string $seo_h1
 * @property string $seo_description
 * @property string $seo_keywords
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 */
class SeoPage extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_DISABLE = 0;

    public function behaviors(){
        return [
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'native_name',
                'immutable' => true,
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%seo_page}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seo_text', 'seo_description', 'seo_keywords'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['native_name', 'slug', 'seo_title', 'seo_h1'], 'string', 'max' => 255],
        ];
    }

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'native_name' => 'Название',
			'slug' => 'Slug',
			'seo_text' => 'Seo-текст',
			'seo_title' => 'Seo Title',
			'seo_h1' => 'Seo H1',
			'seo_description' => 'Seo Description',
			'seo_keywords' => 'Seo Keywords',
			'status' => 'Опубликовано',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
		];
	}

    public function init() {
	    parent::init();

	    if ($this->isNewRecord) {
	    	$this->status = self::STATUS_ACTIVE;
	    }
    }

}