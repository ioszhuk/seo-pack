<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \noIT\seo\models\SeoPage */

$__params = require __DIR__ .'/__params.php';

$this->title = $model->native_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $__params['items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', $model->native_name);
?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

    </div>
</div>