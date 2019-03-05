<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \noIT\seo\models\SeoByUrl */

$__params = require __DIR__ .'/__params.php';

$this->title = Yii::t('app', '{modelClass}: ', [
		'modelClass' => $__params['item'],
	]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $__params['items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $model->id);
?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

    </div>
</div>
