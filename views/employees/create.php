<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = 'Добавление сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Персонал', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<br>

    <?= $this->render('_form', compact('model')) ?>

</div>
