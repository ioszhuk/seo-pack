<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model noIT\seo\models\SeoPage */

$__params = require __DIR__ .'/__params.php';

$this->title = 'Создать страницу';
$this->params['breadcrumbs'][] = ['label' => $__params['items'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-form-section">
    <div class="custom-form-section-box">

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

    </div>
</div>
