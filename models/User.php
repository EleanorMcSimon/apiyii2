<?php

namespace app\models;
use Yii;
class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $nickname;
    public $fullname;
    public $statusid;
    public $created_date;
    public $last_login_date;
    public $reset_password;
    public $status_id;
    public $authKey;
    public $accessToken;

    /*private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];*/


    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $userType = null) {

        $dbUser = DbUser::find()
                ->where(["accessToken" => $token])
                ->one();
        if (!count($dbUser)) {
            return null;
        }
        return new static($dbUser);
    }
    public static function findByemail($email) {
        $c =  Yii::$app->db->createCommand('SELECT * FROM api_users Where email = :email')->bindParam(':email',$email);
        $dbUser =$c->queryOne();
        //$dbUser->authKey = 'test100key';
if (!count($dbUser)) {
    return null;
}
return new static($dbUser);
    
    }
    public static function findIdentity($id)
    {
        
        $c =  Yii::$app->db->createCommand('SELECT * FROM api_users Where id = :id')->bindParam(':id',$id);
        $dbUser =$c->queryOne();
        //$dbUser->authKey = 'test100key';
if (!count($dbUser)) {
    return null;
}
return new static($dbUser);
    }

    /**
     * {@inheritdoc}
     */
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $c =  Yii::$app->db->createCommand('SELECT * FROM api_users Where username = :username')->bindParam(':username',$username);
        $dbUser =$c->queryOne();
       
        if (!count($dbUser)) {
            return null;
        }
        return new static($dbUser);
    }
    
    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * @inheritdoc
     */
    public function accessToken() {
        if($this->status_id == 1)
        {
            $this->accessToken = '100-token';
        }
        else{
            $this->accessToken = '101-token';
        }
       return $this->accessToken;
   }
    public function getAuthKey() {
         $this->authKey = 'test100key';
        return $this->authKey;
    }
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }
   
     /**
     * Validates password
     *
     * @param  string  $email password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validateEmail($email) {
        

        return $this->email === $email;
    }
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        

        return $this->password === $password;
    }

    /**
**/
}
