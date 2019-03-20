<?php
/* @var $this yii\web\View */

//use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/js/jquery-3.3.1.min.js');
$this->registerCssFile('/css/person.css');
$this->registerJsFile('/js/personLazyLoad.js');


$this->title = "Видеонаблюдение";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/lk/']];
$this->params['breadcrumbs'][] = $this->title;


//$model = new \frontend\models\LkForm();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-text">Видеонаблюдение</div>
            <div class="row">
                <div class="col-md-4">
                    <!--<div class="headline-block-right">
                        <span class="headline-text-right">Личный кабинет</span>
                        <div class="headline-ul-right">
                            <div><a href="water-supply">Водоснабжение/Канализация</a></div>
                            <div><a href="power-supply">Электроснабжение</a></div>
                            <div><a href="dnt-other-services">Услуги ДНТ/Прочее</a></div>
                            <div><a href="cctv">Видеонаблюдение</a></div>
                            <div><a href="exit">Выход</a></div>
                        </div>
                    </div>-->
                    <?= $this->render('_menu') ?>
                </div>
                <div class="col-md-8">
                    <!--<div class="headline-block-left">
                        <span class="headline-text_block_top-right">Приветствуем Вас в личном кабинете посёлка "Дворянское озеро"</span>
                        <div class="headline-li-right">
                            <span><a href="#">Главная</a></span><span>&#8250;</span><span><a href="index.html">Лк</a></span><span>&#8250;</span><span>Видеонаблюдение</span>
                        </div>
                    </div>-->
                    <h1 class="page-header">Услуги ДНТ/Прочее</h1>
                    <div class="headline-substrate-left">
                        <section class="a">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-4 a1">Камера 1</div>
                                    <div class="col-sm-6 col-lg-4 a2">Камера 2</div>
                                    <!--<div class="clearfix visible-sm-block visible-md-block"></div>-->
                                    <div class="col-sm-6 col-lg-4 a3">Камера 3</div>
                                    <!--<div class="clearfix visible-lg-block"></div>-->
                                    <div class="col-sm-6 col-lg-4 a4">Камера 4</div>
                                    <!--<div class="clearfix visible-sm-block visible-md-block"></div>-->
                                    <div class="col-sm-6 col-lg-4 a5">Камера 5</div>
                                    <div class="col-sm-6 col-lg-4 a6">Камера 6</div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>