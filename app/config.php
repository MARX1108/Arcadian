<?php
# config file contains constants that might vary from one web server to another

define('SYSTEM_PATH', dirname(__FILE__)); # location of 'app' folder - don't change

define('BASE_URL','http://localhost:8080/Arcadian'); # your base URL

// constants for admin access
define('ADMIN_USERNAME','Mr.Thanos');
define('ADMIN_PASSWORD','Mr.Thanos');

// database credentials
define('DB_HOST','localhost');
define('DB_DBNAME','Arcadian');
define('DB_USER','root');
define('DB_PASS','');
