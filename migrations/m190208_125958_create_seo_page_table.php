<?php

use yii\db\Migration;

class m190208_125958_create_seo_page_table extends Migration
{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable( 'seo_page', [
			'id' => $this->primaryKey(),
			'native_name' => $this->string(255)->null(),
			'slug' => $this->string(255)->null(),
			'seo_text' => $this->text()->null(),
			'seo_title' => $this->string(255)->null(),
			'seo_h1' => $this->string(255)->null(),
			'seo_description' => $this->text()->null(),
			'seo_keywords' => $this->text()->null(),
			'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),

			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "create_seo_page_table cannot be reverted.\n";

		$this->dropTable('seo_page');

		return true;

	}

}