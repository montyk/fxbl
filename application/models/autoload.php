<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Helper files
| 4. Custom config files
| 5. Language files
| 6. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packges
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/

$autoload['packages'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in the system/libraries folder
| or in your application/libraries folder.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'session', 'xmlrpc');
*/

$autoload['libraries'] = array('parser','database', 'session', 'xmlrpc','DB_Session','login_lib','Email','Form_validation','encrypt','MY_encrypt','users_lib','users_address_lib','users_contacts_lib','users_ecurrencies_lib','users_logs_lib','users_settings_lib','pages_lib','attachments_lib','users_attachments_lib','testimonials_lib','accounts_lib','ecurrencies_lib','payment_methods_lib','rates_lib','news_lib','contactus_lib','sent_mails_lib','formtoken','login_trace','browser','pamm_manager_lib','pamm_relations_lib','wallet_logs_lib','CMT4DataReciver','pamm_funds_history_lib','pagination','payment_log_lib');


/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/

$autoload['helper'] = array('url', 'file','form','conversion','ipaddress','json','selectbox','attachment','date_helper','simple_html_dom_helper','download');


/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/

$autoload['config'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/

$autoload['language'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('model1', 'model2');
|
*/

$autoload['model'] = array('mql_model','login_model','users_model','pages_model','contactus_model','mail_model','testimonials_model','common_model','liberty_account_model','ecurrency_model','payment_model','rates_model','news_model','fileupload_model','adminmenus_model','adminfootermenus_model','adminsettings_model','adminwidget_model','adminhomepage_model','pamm_manager_model','pamm_relations_model','wallet_logs_model','pamm_funds_history_model','webapi_model','ticket_model','payment_log_model');

/* End of file autoload.php */
/* Location: ./application/config/autoload.php */