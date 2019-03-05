<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model noIT\seo\models\SeoByUrl */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row justify-content-between">
    <div class="col like-box">
		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
        <?= $form->field($model, 'seo_text')->widget(Widget::className(), [
	        'settings' => [
		        'lang' => 'ru',
		        'minHeight' => 620,
		        'buttons' => ['html', 'formatting', 'bold', 'italic', 'underline', 'deleted', 'unorderedlist', 'orderedlist', 'image', 'link', 'alignment', 'horizontalrule'],
		        'formatting' => ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],

		        'imageUpload' => Url::to(['seo-by-url/body-image-upload']),
		        'imageManagerJson' => Url::to(['seo-by-url/body-images-get']),
		        'imageDelete' => Url::to(['seo-by-url/body-file-delete']),
		        'plugins' => [
			        'fullscreen',
			        'table',
			        'video',
		        ],
	        ],
	        'plugins' => [
		        'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',
	        ],
        ]) ?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col">
        <div class="form-group">
            <br>
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>