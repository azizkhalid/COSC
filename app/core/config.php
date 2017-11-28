<?php

define('VERSION', '0.7.0');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('APPS', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('LIBS', ROOT . DS . 'lib');
define('MODELS', ROOT . DS . 'models');
define('VIEWS', ROOT . DS . 'views');
define('CONTROLLERS', ROOT . DS . 'controllers');
define('LOGS', ROOT . DS . 'logs');	
define('FILES', ROOT . DS. 'files');

define('BASE_URL', 'http://localhost/');

// ---------------------  NEW FENIX DATABASE TABLE -------------------------
define('DB_HOST',         '127.0.0.1');
define('DB_USER',         'root'); 
define('DB_PASS',         '');
define('DB_DATABASE',     'cosc');
define('DB_PORT',         '');
