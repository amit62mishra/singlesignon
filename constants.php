<?php
	if(YII_ENV=='dev'){
		defined('APP_NAME') or define('APP_NAME', 'CMREF of Government of Himachal Pradesh'); 
		defined('DB_NAME') or define('DB_NAME', 'transfer');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', '');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		 

	}
	if(YII_ENV=='production'){
		 defined('APP_NAME') or define('APP_NAME', 'CMREF of Government of Himachal Pradesh'); 
		defined('DB_NAME') or define('DB_NAME', 'transfer');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', '');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		 
	}
	else{
		defined('APP_NAME') or define('APP_NAME', 'CMREF of Government of Himachal Pradesh'); 
		defined('DB_NAME') or define('DB_NAME', 'transfer');
		defined('DB_USERNAME') or define('DB_USERNAME', 'root');
		defined('DB_PASSWORD') or define('DB_PASSWORD', '');
		defined('PASSWORD_KEY') or define('PASSWORD_KEY', '1-1eM@nT#908');
		 
	}

?>