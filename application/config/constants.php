<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


define('T_MT4_HOST',      '91.109.24.215');               // MetaTrader: Server
define('T_MT4_PORT',       443);                      // MetaTrader: Port
define('T_PLUGIN_MASTER', 'test1234');                  // Plugin: Master Password
define('T_PORT',443);                  // MetaTrader Server Port
define('T_TIMEOUT',5);                 // MetaTrader Server Connection Timeout, in sec

define('T_CACHEDIR','cache/');         // cache files directory
define('T_CACHETIME',5);               // cache expiration time, in sec
define('T_CLEAR_DELNUMBER',15);        // limit of deleted files, after which process of cache clearing should be stopped



//------

define('DEMO_T_MT4_HOST','144.76.25.179');   // MetaTrader: Server
define('DEMO_T_MT4_PORT',443);                // MetaTrader: Port
define('DEMO_PLUGIN_MASTER', 'Tul!p100');   // MetaTrader: Master Password


/*
2014.04.03 01:39:45.730	144.76.25.179:443	'1': connected

define('DEMO_T_MT4_HOST','185.17.151.147');   // MetaTrader: Demo Server
define('DEMO_T_MT4_PORT',443);                // MetaTrader: Port
define('DEMO_PLUGIN_MASTER', '1000tulips');   // MetaTrader: Demo Master Password


define('DEMO_T_MT4_HOST','91.109.24.215');   // MetaTrader: Server
define('DEMO_T_MT4_PORT',443);                // MetaTrader: Port
define('DEMO_PLUGIN_MASTER', 'test1234');   // MetaTrader: Master Password
*/


//*MAM properties Server Details
define('MAM_HOST','91.109.24.215');   // MAM properties Server   
define('MAM_USERNAME','ftp_user');    // MAM properties Server Username
define('MAM_PASSWORD', 'D@ta!100');   // MAM properties Server Password    
//* End of MAM properties Server Details

/* End of file constants.php */
/* Location: ./application/config/constants.php */