<?php
namespace noIT\seo\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "seo_by_url".
 *
 * @property int $id
 * @property string $url
 * @property string $h1
 * @property string $title
 * @property string $description
 * @property string $seo_text
 */
class SeoByUrl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public function behaviors(){
        return [
	        'slug' => [
		        'class' => SluggableBehavior::className(),
		        'attribute' => 'title',
		        'slugAttribute' => 'url',
		        'immutable' => true,
	        ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }

    public static function tableName()
    {
        return 'seo_by_url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'unique'],
            [['description', 'seo_text'], 'string'],
            [['url', 'h1', 'title'], 'string', 'max' => 255],
        ];
    }

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'url' => 'Url',
			'h1' => 'H1',
			'title' => 'Заголовок',
			'description' => 'Description',
			'seo_text' => 'Seo текст',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
		];
	}

}
