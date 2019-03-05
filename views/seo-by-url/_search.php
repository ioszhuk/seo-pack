<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model noIT\seo\models\search\SeoByUrlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
	'action' => ['index'],
	'method' => 'get',
	'options' => [
		'data-pjax' => 1
	],
]); ?>

<?= $form->field($model, 'id') ?>

<?= $form->field($model, 'url') ?>

<?= $form->field($model, 'h1') ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'description') ?>

    <div class="form-group">
        <br>
		<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Сбросить', Url::canonical(), ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>