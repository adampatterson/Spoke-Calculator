<?php if(!defined('DINGO')){die('External Access to File Denied');}

/**
 * Dingo Framework Basic Configuration File
 *
 * @Author          Evan Byrne
 * @Copyright       2008 - 2010
 * @Project Page    http://www.dingoframework.com
 */

/**
 * Your Application's Default Timezone
 * Syntax for your local timezone can be found at
 * http://www.php.net/timezones
 */
date_default_timezone_set('America/New_York');


/* Auto Load Libraries */
config::set('autoload_library',array('url','db','note','session','user', 'pagination'));

/* Auto Load Helpers */
config::set('autoload_helper',array('calculator','user','inflector', 'date'));


/* Sessions */
config::set('session',array(
	'connection'=>'default',
	'table'=>'sessions',
	'cookie'=>array('path'=>'/','expire'=>'+1 months')
));

/* Notes */
config::set('notes',array('path'=>'/','expire'=>'+5 minutes'));


/* Application Folder Locations */
config::set('folder_views','view');             // Views
config::set('folder_controllers','controller'); // Controllers
config::set('folder_models','model');           // Models
config::set('folder_helpers','helper');         // Helpers
config::set('folder_languages','language');     // Languages
config::set('folder_errors','error');           // Errors
config::set('folder_orm','orm');                // ORM