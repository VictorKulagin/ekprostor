<?php
/* @var $this yii\web\View */
/* @var $OwnerFullName string */
/* @var $DNTName string */

$this->title = "Главная страница личного кабинета";
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/person.css');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?= $this->render('_menu') ?>
        </div>
        <div class="col-md-8">
            <h1 class="page-header">Главная страница Личного кабинета</h1>
                <span><?= $OwnerFullName; ?>, приветствуем Вас в личном кабинете посёлка <?= $DNTName; ?></span>

                <h3>Добавление показаний</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>№ Счетчика</th>
                        <th>Услуга</th>
                        <th>Предыдущее показание</th>
                        <th>Новое показание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2122</td>
                        <td>Водоснабжение/Канализация</td>
                        <td>15405</td>
                        <td><input type="text" size="12"></td>
                    </tr>
                    <tr>
                        <td>2122</td>
                        <td>Электроэнергия Дневной тариф</td>
                        <td>15405</td>
                        <td><input type="text" size="12"></td>
                    </tr>
                    <tr>
                        <td>2122</td>
                        <td>Электроэнергия Ночной тариф</td>
                        <td>15405</td>
                        <td><input type="text" size="12"></td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-outline-success">Отправить</button>

                <h3>Неоплаченные счета</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Тип</th>
                        <th>Месяц</th>
                        <th>Примечание</th>
                        <th>Показания Начальные</th>
                        <th>Конечные</th>
                        <th>Начислено</th>
                        <th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" size="12"></td>
                        <td>Водоснабжение</td>
                        <td>Июнь 2018</td>
                        <td>Счетчик №2122</td>
                        <td>15405</td>
                        <td>15480</td>
                        <td>75</td>
                        <td>150 р.</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" size="12"></td>
                        <td>Водоснабжение</td>
                        <td>Июнь 2018</td>
                        <td>Счетчик №2122</td>
                        <td>15405</td>
                        <td>15480</td>
                        <td>75</td>
                        <td>150 р.</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" size="12"></td>
                        <td>Электроснабжение</td>
                        <td>Июнь 2018</td>
                        <td>Счетчик №2122</td>
                        <td>15405</td>
                        <td>15480</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" size="12"></td>
                        <td>Электроснабжение</td>
                        <td>Июнь 2018</td>
                        <td>Счетчик №2122</td>
                        <td>15405</td>
                        <td>15480</td>
                        <td>75</td>
                        <td>150 р.</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" size="12"></td>
                        <td>ДНТ/Прочее</td>
                        <td>Июнь 2018</td>
                        <td>Участок №1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            <button type="button" class="btn btn-outline-success">Получить квитанцию и оплатить</button>
        </div>
    </div>
</div>

