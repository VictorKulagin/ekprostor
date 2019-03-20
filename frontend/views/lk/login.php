<?php
/* @var $this yii\web\View */

//use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->registerCssFile('/css/person.css');

$model = new \frontend\models\LkForm();
?>
<!--<link href="http://ekprostor.ru/assets/d27c61a4/css/bootstrap.css" rel="stylesheet">-->
<!--<h1>personal-area/index</h1>-->

<!--<p>
    You may change the content of this page by modifying
    the file <code><?//= __FILE__; ?></code>.
</p>-->

<div class="container">
    <div style="text-align: center"><h1 class="page-header">Авторизация</h1></div>
    <div class="col-sm-12">
        <? $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
        ]) ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end() ?>
    </div>



</div>
