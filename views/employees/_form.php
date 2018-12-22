<?php

use app\models\Employee;
use app\models\Position;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Group;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-lg-8">
			<div class="box">
				<div class="box-body">
                    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'position_id')->widget(Select2::class, [
                        'initValueText' => $model->position ? $model->position->name : '',
                        'options' => ['placeholder' => 'Выберите должность'],
                        'data' => Position::getList(),
                        'pluginOptions' => [
                            'minimumInputLength' => 0,
                        ],
                    ]) ?>
                    <?= $form->field($model, 'birth_year')->textInput([
                        'maxlength' => true,
                        'type' => 'number',
                        'min' => (new DateTime( '-65 years'))->format('Y'),
                        'max' => (new DateTime( '-16 years'))->format('Y')
                    ]) ?>
                    <?= $form->field($model, 'gender')->widget(Select2::class, [
                        'initValueText' => $model->gender,
                        'options' => ['placeholder' => 'Выберите пол'],
                        'data' => Employee::$genders,
                        'pluginOptions' => [
                            'minimumInputLength' => 0,
                            'minimumResultsForSearch' => -1
                        ],
                    ]) ?>

                    <?= $form->field($model, 'editableGroups')->checkboxList(Group::getList(), ['class' => 'checkbox-group']) ?>

					<div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php ActiveForm::end(); ?>

</div>
