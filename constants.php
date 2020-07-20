<?php
	if(YII_ENV=='dev'){
		defined('APP_NAME') or define('APP_NAME', 'Identified fake news by Monitoring Unit of Government of Himachal Pradesh');
		defined('DB_SERVER') or define('DB_SERVER', 'localhost');
		defined('DB_NAME') or define('DB_NAME', 'fake_news_hp');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', 'Test@908');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		defined('APP_URL') or define('APP_URL', 'http://localhost:908/fakenews.hp.gov.in');
		defined('APP_URL_LOCAL_IP') or define('APP_URL_LOCAL_IP', 'http://localhost:908/fakenews.hp.gov.in');
		/*SMS Gateway*/
		defined('SMS_GATEWAY_USER_ID') or define('SMS_GATEWAY_USER_ID', 'hpgovt-covid');
		defined('SMS_GATEWAY_PASSWD') or define('SMS_GATEWAY_PASSWD', 'Covid@12345');
		defined('SMS_GATEWAY_SENDER_ID') or define('SMS_GATEWAY_SENDER_ID', 'hpgovt');
		defined('SMS_DEPT_SECURE_KEY') or define('SMS_DEPT_SECURE_KEY', 'f005c2a6-dcf3-4f24-886d-53a51c043be6');
		defined('SMS_GATEWAY_URL') or define('SMS_GATEWAY_URL', 'https://msdgweb.mgov.gov.in/esms/sendsmsrequest');
		defined('OTP_KEY') or define('OTP_KEY', '1-1eM@nT#908@44');

	}
	if(YII_ENV=='production'){
		defined('APP_NAME') or define('APP_NAME', 'Identified fake news by Monitoring Unit of Government of Himachal Pradesh');
		defined('DB_SERVER') or define('DB_SERVER', 'localhost');
		defined('DB_NAME') or define('DB_NAME', 'fake_news_hp');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', 'Test@908');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		defined('APP_URL') or define('APP_URL', 'http://localhost:908/fakenews.hp.gov.in');
		defined('APP_URL_LOCAL_IP') or define('APP_URL_LOCAL_IP', 'http://localhost:908/fakenews.hp.gov.in');
		/*SMS Gateway*/
		defined('SMS_GATEWAY_USER_ID') or define('SMS_GATEWAY_USER_ID', 'hpgovt-covid');
		defined('SMS_GATEWAY_PASSWD') or define('SMS_GATEWAY_PASSWD', 'Covid@12345');
		defined('SMS_GATEWAY_SENDER_ID') or define('SMS_GATEWAY_SENDER_ID', 'hpgovt');
		defined('SMS_DEPT_SECURE_KEY') or define('SMS_DEPT_SECURE_KEY', 'f005c2a6-dcf3-4f24-886d-53a51c043be6');
		defined('SMS_GATEWAY_URL') or define('SMS_GATEWAY_URL', 'https://msdgweb.mgov.gov.in/esms/sendsmsrequest');
		defined('OTP_KEY') or define('OTP_KEY', '1-1eM@nT#908@44');
	}
	else{
		defined('APP_NAME') or define('APP_NAME', 'Identified fake news by Monitoring Unit of Government of Himachal Pradesh');
		defined('DB_SERVER') or define('DB_SERVER', 'localhost');
		defined('DB_NAME') or define('DB_NAME', 'fake_news_hp');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', 'Test@908');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		defined('APP_URL') or define('APP_URL', 'http://localhost:908/fakenews.hp.gov.in');
		defined('APP_URL_LOCAL_IP') or define('APP_URL_LOCAL_IP', 'http://localhost:908/fakenews.hp.gov.in');
		/*SMS Gateway*/
		defined('SMS_GATEWAY_USER_ID') or define('SMS_GATEWAY_USER_ID', 'hpgovt-covid');
		defined('SMS_GATEWAY_PASSWD') or define('SMS_GATEWAY_PASSWD', 'Covid@12345');
		defined('SMS_GATEWAY_SENDER_ID') or define('SMS_GATEWAY_SENDER_ID', 'hpgovt');
		defined('SMS_DEPT_SECURE_KEY') or define('SMS_DEPT_SECURE_KEY', 'f005c2a6-dcf3-4f24-886d-53a51c043be6');
		defined('SMS_GATEWAY_URL') or define('SMS_GATEWAY_URL', 'https://msdgweb.mgov.gov.in/esms/sendsmsrequest');
		defined('OTP_KEY') or define('OTP_KEY', '1-1eM@nT#908@44');
	}

?>