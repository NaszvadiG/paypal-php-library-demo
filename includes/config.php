<?php
/**
 * Timezone Setting
 * List of Supported Timezones: http://www.php.net/manual/en/timezones.php
 */
date_default_timezone_set('America/Chicago');

/**
  * Enable Sessions
  * Checks to see if a session_id exists.  If not, a new session is started.
  */
if(!session_id()) session_start();

/** 
 * Sandbox Mode - TRUE/FALSE
 *
 * Here we are setting the $sandbox field to TRUE so that all calls made
 * by the demo scripts will hit the PayPal sandbox servers.
 *
 * We are also setting a $domain value so that we can easily create
 * our ReturnURL, CancelURL, etc. within our API calls.
 */
$sandbox = TRUE;
$domain = $sandbox ? 'http://paypalphp-sandbox.angelleye.com/' : 'http://paypalphp.angelleye.com/';

/**
 * Enable error reporting if running in sandbox mode.
 */
if($sandbox)
{
	error_reporting(E_ALL|E_STRICT);
	ini_set('display_errors', '1');	
}

/**
 * PayPal API Version
 * ------------------
 * The library is currently using PayPal API version 109.0.  
 * You may adjust this value here and then pass it into the PayPal object when you create it within your scripts to override if necessary.
 */
$api_version = '119.0';

/**
 * PayPal Application ID
 * --------------------------------------
 * The application is only required with Adaptive Payments applications.
 * You obtain your application ID but submitting it for approval within your 
 * developer account at http://developer.paypal.com
 *
 * We're using shorthand if/else statements here to set both Sandbox and Production values.
 * Your sandbox values go on the left and your live values go on the right.
 * The sandbox value included here is a global value provided for developers to use in the PayPal sandbox.
 */
$application_id = $sandbox ? 'APP-80W284485P519543T' : '';	// Only required for Adaptive Payments.  You get your Live ID when your application is approved by PayPal.

/**
 * PayPal Developer Account Email Address
 * This is the email address that you use to sign in to http://developer.paypal.com
 */
$developer_account_email = '';		// This is what you use to sign in to http://developer.paypal.com.  Only required for Adaptive Payments.

/**
 * PayPal Gateway API Credentials
 * ------------------------------
 * These are your PayPal API credentials for working with the PayPal gateway directly.
 * These are used any time you're using the parent PayPal class within the library.
 * 
 * We're using shorthand if/else statements here to set both Sandbox and Production values.
 * Your sandbox values go on the left and your live values go on the right.
 * 
 * You may obtain these credentials by logging into the following with your PayPal account: https://www.paypal.com/us/cgi-bin/webscr?cmd=_login-api-run
 */
$api_username = $sandbox ? 'sandbo_1215254764_biz_api1.angelleye.com' : '';
$api_password = $sandbox ? '1215254774' : '';
$api_signature = $sandbox ? 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAb6E3l6my.pY9br1z2qxKx96W18v' : '';

/**
 * Payflow Gateway API Credentials
 * ------------------------------
 * These are the credentials you use for your PayPal Manager:  http://manager.paypal.com
 * These are used when you're working with the PayFlow child class.
 * 
 * We're using shorthand if/else statements here to set both Sandbox and Production values.
 * Your sandbox values go on the left and your live values go on the right.
 * 
 * You may use the same credentials you use to login to your PayPal Manager, 
 * or you may create API specific credentials from within your PayPal Manager account.
 */
$payflow_username = $sandbox ? 'tester' : 'LIVE_PAYFLOW_USERNAME';
$payflow_password = $sandbox ? 'Pr0t3ct!' : 'LIVE_PAYFLOW_PASSWORD';
$payflow_vendor = $sandbox ? 'angelleye' : 'LIVE_PAYFLOW_VENDOR';
$payflow_partner = $sandbox ? 'PayPal' : 'LIVE_PAYFLOW_PARTNER';

/**
 * Third Party User Values
 * These can be setup here or within each caller directly when setting up the PayPal object.
 */
$api_subject = '';	// If making calls on behalf a third party, their PayPal email address or account ID goes here.
$device_id = '';
$device_ip_address = $_SERVER['REMOTE_ADDR'];

/**
 * Enable Headers
 * Option to print headers to screen when dumping results or not.
 */
$print_headers = true;

/**
 * Enable Logging
 * Option to log API requests and responses to log file.
 * Make sure this directory exists and is writable.
 */
$log_results = true;
$log_path = $_SERVER['DOCUMENT_ROOT'].'/vendor/angelleye/paypal-php-library/logs/';