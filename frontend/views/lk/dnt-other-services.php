<?php
/* @var $this yii\web\View */

//use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*$this->registerJsFile('/js/jquery-3.3.1.min.js');
$this->registerCssFile('/css/person.css');*/
$this->registerJsFile('/js/personLazyLoad.js');

$this->title = "Услуги ДНТ/Прочее";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/lk/']];
$this->params['breadcrumbs'][] = $this->title;


//$model = new \frontend\models\LkForm();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--<div class="main-text">Услуги ДНТ/Прочее</div>-->
            <div class="row">
                <div class="col-md-4">
                    <?= $this->render('_menu') ?>
                </div>
                <div class="col-md-8">
                    <!--<div class="headline-block-left">
                        <div class="headline-li-right">
                            <span><a href="#">Главная</a></span><span>&#8250;</span><span><a href="index">Лк</a></span><span>&#8250;</span><span>Услуги ДНТ/Прочее</span>
                        </div>
                    </div>-->
                    <h1 class="page-header">Услуги ДНТ/Прочее</h1>
                    <div class="headline-substrate-left">
                        <div class="headline-block_top-left">Неоплаченные счета</div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>Примечание</th>
                                <th>Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Июнь 2018</td>
                                <td>Участок № 1</td>
                                <td>150 p.</td>
                            </tr>
                            <tr>
                                <td>Июль 2018</td>
                                <td>Участок № 1</td>
                                <td>150 p.</td>
                            </tr>
                            </tbody>
                        </table>
                        <!--<button type="button" class="btn btn-outline-success">Отправить</button>-->
                    </div>
                    <div class="headline-substrate-left">
                        <div class="headline-block_top-left">Оплаченные счета</div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>Примечание</th>
                                <th>Сумма</th>
                                <th>Дата оплаты</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Май 2018</td>
                                <td>Участок № 1</td>
                                <td>150 р.</td>
                                <td>24.06.2018</td>
                            </tr>
                            <tr>
                                <td>Март 2018</td>
                                <td>Участок № 1</td>
                                <td>150 р.</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Февраль 2018</td>
                                <td>Участок № 1</td>
                                <td>150 р.</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Январь 2018</td>
                                <td>Участок № 1</td>
                                <td>150 р.</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-outline-success">&#8634; Ещё *</button>
                </div>
            </div>
        </div>
    </div>
</div>