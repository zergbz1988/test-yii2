<?php

namespace app\controllers;

use app\models\Employee;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;


class EmployeesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post())) {
            try {
                if ($model->save()) {
                    Yii::$app->session->setFlash('info', 'Сотрудник был добавлен.');
                    return $this->redirect(['update', 'id' => $model->id]);
                }

                Yii::$app->session->addFlash('error', 'При добавлении сотрудника возникла ошибка.');

            } catch (\Exception $e) {
                Yii::$app->session->addFlash('error', 'При добавлении сотрудника возникла ошибка.');
            }
        }

        return $this->render('create', compact('model'));
    }

    /**
     * @param int $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            try {
                if ($model->save()) {
                    Yii::$app->session->setFlash('info', 'Сотрудник был изменён.');
                    return $this->redirect(['update', 'id' => $model->id]);
                }

                Yii::$app->session->addFlash('error', 'При сохранении сотрудника возникла ошибка.');

            } catch (\Exception $e) {
                Yii::$app->session->addFlash('error', 'При сохранении сотрудника возникла ошибка.');
            }
        }

        return $this->render('update', compact('model'));
    }

    /**
     * @param $id
     * @return Employee|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не найдена.');
    }
}
