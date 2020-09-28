<?php
namespace frontend\models;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use Yii;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password, $password_repeat, $old_password;

    /**
     * @var \app\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($config = [])
    {
        $this->_user = User::findIdentity(Yii::$app->user->identity->id);
        if (!$this->_user) {
            throw new InvalidParamException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_repeat', 'old_password'], 'required'],
            [['password', 'password_repeat', 'old_password'], 'string', 'min' => 5], 
            [['password'], 'compare', 'compareAttribute' => 'old_password', 'operator' => '!='],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function attributeLabels () {
        return [
            'password' => 'New Password',
            'password_repeat' => 'Confirm New Password',
            'old_password' => 'Old Password'
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function changePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->_user;
            // $user->setPassword($this->password);
            $user->password = $this->password;
            //$user->removePasswordResetToken();

            return $user->save(false);
        }
        return false;
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->old_password)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
