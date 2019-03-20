<?
namespace frontend\models;

use yii\base\Model;

class LkForm extends Model
{
    public $username;
    public $password;
    public $userpwd;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            'password' => [['password'], 'string', 'max' => 60],
            ['username', 'email'],
        ];
    }
}
