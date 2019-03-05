<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use noIT\seo\models\SeoPage;

/* @var $this yii\web\View */
/* @var $model noIT\seo\models\search\SeoPageSearch */
/* @var $form yii\widgets\ActiveForm */

$__params = require __DIR__ .'/__params.php';

?>

<div class="quote-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

	<?= $form->field($model, 'native_name') ?>

	<?= $form->field($model, 'slug') ?>

	<?= $form->field($model, 'seo_keywords') ?>

	<?= $form->field($model, 'status')->widget(\backend\widgets\MetronicSingleCheckbox::className(),[
		'label' => 'Видимый',
		'value' => SeoPage::STATUS_ACTIVE
	]) ?>

    <div class="form-group">
        <br>
		<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
