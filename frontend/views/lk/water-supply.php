<?php
/* @var $this yii\web\View */

//use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/jquery-3.3.1.min.js');
$this->registerCssFile('/css/person.css');
$this->registerJsFile('/js/personLazyLoad.js');
//$this->registerJsFile('/js/personLazyLoad.js', ['position' => \yii\web\View::POS_READY]);

$this->title = "Водоснабжение/Канализация";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/lk/']];
$this->params['breadcrumbs'][] = $this->title;

//$model = new \frontend\models\LkForm();
?>
<p><? //var_dump($paidBillsService); ?></p>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <?= $this->render('_menu') ?>
                </div>
                <div class="col-md-8">
<!--                    <div class="headline-block-left">-->
<!--                        <div class="headline-li-right">-->
<!--                            <span><a href="#">Главная</a></span><span>&#8250;</span><span><a href="index">Лк</a></span><span>&#8250;</span><span>Электроснабжение</span>-->
<!--                        </div>-->
<!--                    </div>-->
                    <h1 class="page-header">Водоснабжение/Канализация</h1>
                    <div class="headline-substrate-left">
                        <div class="headline-block_top-left">Неоплаченные счета</div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Месяц</th>
                                <th>№ Счетчика</th>
                                <th>Показания Начальные</th>
                                <th>Конечные</th>
                                <th>Начислено</th>
                                <th>Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Июнь 2018</td>
                                <td>2122</td>
                                <td>15405</td>
                                <td>15480</td>
                                <td>75</td>
                                <td>150 р.</td>
                            </tr>
                            <tr>
                                <td>Июль 2018</td>
                                <td>2122</td>
                                <td>15405</td>
                                <td>15480</td>
                                <td>75</td>
                                <td>150 р.</td>
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
                                <th>Показания Начальные</th>
                                <th>Конечные</th>
                                <th>Начислено</th>
                                <th>Сумма</th>
                                <th>Дата оплаты</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? if($paidBillsService) : ?>
                                <? //var_dump($paidBillsService); ?>
                                <? foreach ($paidBillsService as $_value=>$key): ?>
                                <tr id="tr">
                                    <td><?=$key['month_name'] . " " . $key["year"]; ?></td>
                                    <td><?=$key["initialT1"]; ?></td>
                                    <td><?=$key["currentT1"]; ?></td>
                                    <td><?=$key["accrued"]; ?></td>
                                    <td><?=$key["sum"]; ?></td>
                                    <td><?=$key["date_of_payment"]; ?></td>
                                </tr>
                              <? endforeach; ?>
                          <? endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-outline-success">&#8634; Еще</button>
                </div>
            </div>
        </div>
    </div>
</div>