<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = 'Редактирование сотрудника: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Персонал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->full_name];
?>
<div class="sale-update">

    <h1><?= Html::encode($this->title) ?></h1>
	<br>

    <?= $this->render('_form', compact('model')) ?>

</div>
