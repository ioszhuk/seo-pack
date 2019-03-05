<?php

use yii\db\Migration;

class m190206_125956_create_seo_by_url_table extends Migration
{

	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable( 'seo_by_url', [
			'id' => $this->primaryKey(),
			'url' => $this->string(255)->notNull(),
			'h1' => $this->string(255)->null(),
			'title' => $this->string(255)->null(),
			'description' => $this->text()->null(),
			'seo_text' => $this->text()->null(),
			'status' => $this->tinyInteger(2)->unsigned()->notNull()->defaultValue(10),

			'created_at' => $this->integer()->notNull(),
			'updated_at' => $this->integer()->notNull(),
		]);

		$this->createIndex(
			'idx-seo_by_url-url',
			'seo_by_url',
			'url',
			true
		);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		echo "create_seo_by_url_table cannot be reverted.\n";

		$this->dropTable('seo_by_url');

		return true;

	}

}