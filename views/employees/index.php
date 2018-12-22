<?php

use app\models\Employee;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Персонал';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<br>
	<div class="box">
		<div class="box-body">
			<p>
                <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success pull-left']) ?>
                <?= Html::a('Показать доп. информацию', '#', ['class' => 'btn btn-default pull-right', 'id' => 'infoVisibilityBtn']) ?>
			</p>
			<div class="clearfix"></div>
			<br>
			<?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'full_name',
                    'positionName',
                    'birth_year',
                    [
                        'attribute' => 'gender',
	                    'contentOptions' => ['class' => 'should-hide'],
					    'headerOptions' => ['class' => 'should-hide'],
                        'value' => function ($model) {
                            return Employee::$genders[$model->gender];
                        }
                    ],
	                [
                        'attribute' => 'groupsForView',
                        'contentOptions' => ['class' => 'should-hide'],
                        'headerOptions' => ['class' => 'should-hide'],
					],
                    [
                    		'class' => 'yii\grid\ActionColumn',
                    		'template' => '{update}'
                    ],
                ],
            ]); ?>
		</div>
	</div>
</div>
