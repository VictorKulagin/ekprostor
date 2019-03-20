<?php

namespace frontend\controllers;

use frontend\components\LkService;
use Yii;
use yii\base\Module;
use yii\web\Controller;
use frontend\models\LkForm;

class LkController extends Controller
{
    public $service;

    public function __construct($id, Module $module, array $config = [], LkService $service)
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    public function beforeAction($action)
    {
        $lkService = new LkService();
        if (!parent::beforeAction($action)) {
            return false;
        }
        if ($action->id !== 'login' && !$lkService->getCookies()) {
            return $this->redirect('login');
        }
        return true;
    }

    public function actionIndex()
    {
        $lkService = new LkService();
        $cookies = $lkService->getCookies();
        $cookies = json_decode($cookies);
        if ($cookies) {
            $OwnerCode = $cookies[0]->OwnerCode;
            $OwnerFullName = $lkService->fullNameToShortName($OwnerFullName = $cookies[0]->OwnerFullName);
            $DNTName = $cookies[0]->DNTName;
        }

        $OwnerCodeC = $this->service->getMain($OwnerCode);
        $OwnerCodeBill = $this->service->getBill($OwnerCode);

        $valueService = "Водоснабжение/Канализация";

        $paidBillsService = $lkService->paidBillsService($OwnerCodeBill, $valueService);

        return $this->render('index', [
            'getMain' => $OwnerCodeC,
            'OwnerCodeBill' => $OwnerCodeBill,
            //'cookies' =>  $cookies,
            'OwnerFullName' => $OwnerFullName,
            'DNTName' => $DNTName,
            'paidBillsService' => $paidBillsService,
        ]);
    }

    public function actionWaterSupply()
    {
        $paidBillsService = $this->service->waterSupply();

        return $this->render('water-supply', [
            'paidBillsService' => $paidBillsService,
        ]);
    }

    public function actionPowerSupply()
    {
        $paidBillsService = $this->service->powerSupply();

        return $this->render('power-supply', [
            'paidBillsService' => $paidBillsService,
        ]);
    }

    public function actionDntOtherServices()
    {
        return $this->render('dnt-other-services', [

        ]);
    }

    public function actionCctv()
    {
        return $this->render('cctv', [

        ]);
    }

    public function actionExit()
    {
        $this->service->logout();
        return $this->redirect('login');
    }

    public function actionLogin()
    {
        $form = new LkForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->login($form);
                $this->redirect('index');
            } catch (\DomainException $e) {
                $form->addError('password', $e->getMessage());
            }
        }
        return $this->render('login', [
            'model' => $form,
        ]);
    }




}