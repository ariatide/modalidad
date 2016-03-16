<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	 
	 //public $ID_USR;
	 
	public function authenticate()
	{
        $username = $this->username;
        $user = Usuario::model()->find('NICKNAME_USR=?', array($username));
			
		
        
        if($user === NULL) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if(!$user->validatePassword($this->password, $this->username)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else{
                $this->username = $user->NICKNAME_USR;
                $this->setState('idUsuario', $user->ID_USR);
                $this->errorCode=self::ERROR_NONE;

        }
        
        
        
        return !$this->errorCode;
	}


}
