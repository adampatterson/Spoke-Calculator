<?php

error_reporting(E_STRICT|E_ALL);

// Application configuration
//----------------------------------------------------------------------------------------------
// Does Application Use Mod_Rewrite URLs?
define('MOD_REWRITE',TRUE);

# Turn Debugging On?
define('DEBUG', TRUE);
define('DEBUG_SQL', FALSE);

// Turn Error Logging On?
define('ERROR_LOGGING',TRUE);

// Error Log File Location
define('ERROR_LOG_FILE','log.txt');


// Configuration
define('CONFIGURATION','development');

// Dingo Location
define('SYSTEM','system');

// Application Location
define('APPLICATION','application');

// Config Directory Location (in relation to application location)
define('CONFIG','config');

// Allowed Characters in URL
define('ALLOWED_CHARS','/^[ \!\,\~\&\.\:\+\@\-_a-zA-Z0-9]+$/');

define( 'APP_ROOT'      , __DIR__ );

define( 'DS'			, DIRECTORY_SEPARATOR );

require_once('application/config/define.php');

// End of configuration
//----------------------------------------------------------------------------------------------
define('DINGO',1);
require_once('application/bootstrap.php');
bootstrap::run();