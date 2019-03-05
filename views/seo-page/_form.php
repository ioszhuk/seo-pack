<?php

use noIT\core\helpers\BackendHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \dosamigos\selectize\SelectizeDropDownList;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model noIT\seo\models\SeoPage */
/* @var $form yii\widgets\ActiveForm */

$__params = require __DIR__ .'/__params.php';
?>

<?php $form = ActiveForm::begin() ?>

<h3>Основное</h3>
<div class="row justify-content-between">
    <div class="col like-box">
	    <?= $form->field($model, 'native_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
	    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col like-box">
	    <?= BackendHelper::getStatusWidget($form, $model, null, $model::STATUS_ACTIVE)?>
    </div>
</div>

<h3>Список товаров</h3>

<?php /*
<h3>Вывод карточки товара</h3>
<div class="row justify-content-between">
    <div class="col like-box">
	    <?= $form->field($model, 'product_id')
	             ->widget(SelectizeDropDownList::className(), [
		             'items' => ['' => 'Не выводить товар'] + ArrayHelper::map(Product::find()->all(), 'id', 'name'),
		             'options' => ['multiple' => false, 'class' => 'form-control'],
		             'clientOptions' => ['plugins' => ['remove_button']]
	             ]);
	    ?>
    </div>
</div>
 */ ?>

<div class="row justify-content-between">
    <div class="col like-box">
	    <?= $form->field($model, 'seo_h1')?>
    </div>
    <div class="col like-box">
	    <?= $form->field($model, 'seo_title')?>
    </div>
</div>

<div class="row justify-content-between">
    <div class="col like-box">
		<?= $form->field($model, 'seo_description')->textarea(['rows' => 3])?>
    </div>
    <div class="col like-box">
		<?= $form->field($model, 'seo_keywords')->textarea(['rows' => 3])?>
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

			    'imageUpload' => Url::to(['seo-page/image-upload']),
			    'imageManagerJson' => Url::to(['seo-page/images-get']),
			    'imageDelete' => Url::to(['seo-page/file-delete']),
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