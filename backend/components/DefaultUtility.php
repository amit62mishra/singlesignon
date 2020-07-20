<?php
namespace app\backend\components;

use Yii; 
/**
* Includes all the Utilities that can be used in the projects
* @author Amit Mishra
*/
class DefaultUtility
{
    
    /**
    * this function is used to santize the parameters to avoid the sql injections
    */
    /**
    * @author Amit Mishra
    */
    public $enableCsrfValidation = false;
    static function isLoggedIn(){
            @session_start(); 
                return true;
           
        }
}