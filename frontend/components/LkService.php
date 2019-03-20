<?php

namespace frontend\components;

use frontend\models\LkForm;
use Yii;

/**

 *
 * Class LkService
 * @package frontend\components
 */
class LkService
{
    public $userpwd;

    const VALUE_SERVICE_WATER_SUPPLY_SEWAGE = "Водоснабжение/Канализация";
    const VALUE_SERVICE_POWER_SUPPLY = 'Электроэнергия';

    public function __construct()
    {
        $this->userpwd = 'DNTOwner';
    }

    public function login(LkForm $form)
    {
        $result = $this->auth($form->username, $form->password);

        //echo "<meta charset='UTF-8'>";
        $errorUser = json_decode($result);
        if ($result && !$errorUser[2]->Type) {
            $this->SetCookie($result);
            return true;
        }

        throw new \DomainException($errorUser[2]->Descr);
    }

    public function logout()
    {
        return Yii::$app->getResponse()->cookies->remove('LkProstor');
    }

    private function SetCookie($value)
    {
        $domen = $_SERVER['HTTP_HOST'];
        $cookies = new \yii\web\Cookie([
            'name' => 'LkProstor',
            'value' => $value,
            'domain' => $domen,
            'expire' => time() + 20 * 60, //14400
        ]);

        Yii::$app->getResponse()->getCookies()->add($cookies);
    }


    /**
     * кука
     *
     * @return mixed
     */
    public function auth($username, $password)
    {
        $url = "http://venus/prostor/hs/dnt/l/" . $username . "/p/" . $password;
        $info = $this->cURL($url);
//        echo "<meta charset='UTF-8'>";
//        $info = json_decode($info);
        return $info;
    }

    public function getMain($OwnerCodeMain)
    {
        $url = "http://venus/prostor/hs/dnt/mains/oc/" . $OwnerCodeMain;
        return $this->cURL($url);
    }

    public function getBill($OwnerCodeBill)
    {
        $url = "http://venus/prostor/hs/dnt/mainc/oc/" . $OwnerCodeBill;
        return $this->cURL($url);
    }

    public function getCookies()
    {
        return Yii::$app->getRequest()->getCookies()->getValue('LkProstor', false);
    }

    //middle name Отчество
    public function fullNameToShortName($fullName)
    {
        $name = explode(" ", $fullName);
        return $name[1] . " " . $name[2];
    }

    private function monthsList($val)
    {
        $_monthsList = array(
            "1" => "январь",
            "2" => "февраль",
            "3" => "март",
            "4" => "апрель",
            "5" => "май",
            "6" => "июнь",
            "7" => "июль",
            "8" => "август",
            "9" => "сентябрь",
            "10" => "октябрь",
            "11" => "ноябрь",
            "12" => "декабрь"
        );
        return $_monthsList[$val];
    }


    //Unpaid bills неоплаченые счета
    public function unpaidBills()
    {
        $OwnerCodeBill = $this->getBill($OwnerCode);
        $OwnerCodeBill = json_decode($OwnerCodeBill);
        if ($OwnerCodeBill) {
            foreach ($OwnerCodeBill as $value => $key) {
                if ($key->Month === "2") {
                    $er = $key->InitialT1;
                    $data[$value] = $er;
                }
            }
        }
    }

    public function waterSupply()
    {
        return $this->paidBillsService(self::VALUE_SERVICE_WATER_SUPPLY_SEWAGE);
    }

    public function powerSupply()
    {
        return $this->paidBillsService(self::VALUE_SERVICE_POWER_SUPPLY);
    }

    /**
     * paid bills water supply sewage Оплаченные счета 'Водоснабжение/Канализация
     *
     * @param $valueService
     * @return array
     * @internal param $valueOwnerCodeBill
     */
    private function paidBillsService($valueService)
    {
        $cookies = $this->getCookies();
        $cookies = json_decode($cookies);
        if ($cookies) {
            $OwnerCode = $cookies[0]->OwnerCode;
        }

        $valueOwnerCodeBill = $this->getBill($OwnerCode);

        $valueOwnerCodeBill = json_decode($valueOwnerCodeBill);
        if ($valueOwnerCodeBill) {
            foreach ($valueOwnerCodeBill as $value => $key) {
                if ($key->SignPaid === "1" && $key->ServiceName === $valueService) {

                    $Month = $key->Month;
                    $Year = $key->Year;
                    $InitialT1 = $key->InitialT1;
                    $CurrentT1 = $key->CurrentT1;
                    $SumPaid = $key->SumPaid;

                    $data_["month_name"] = $this->monthsList($Month);
                    $data_["month"] = $Month;
                    $data_["year"] = (int)$Year = preg_replace("/[^x\d|*\.]/", "", $Year);
                    $data_["initialT1"] = $InitialT1;
                    $data_["currentT1"] = $CurrentT1;
                    $data_["accrued"] = (int)$CurrentT1 - (int)$InitialT1;
                    $data_["sum"] = $SumPaid;
                    $data_["date_of_payment"] = "11.01.2011";
                    $data[$value] = $data_;
                }
            }
        }
        if ($data) {
            usort($data, function ($a, $b) {
                if ($a["year"] . $a["month"] == $b["year"] . $b["month"]) return 0;
                return $a["year"] < $b["year"] ? 1 : -1;
            });
            return $data;
        } else {
            return $data;
        }
    }


    private function cURL($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, "" . $this->userpwd . ":");

        $output = curl_exec($ch);

        if (curl_error($ch)) {
            echo curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }
}