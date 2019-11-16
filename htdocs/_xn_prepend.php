<?php	

ini_set('display_errors','On'); 
//include ('plugins/task/checkwarn.php');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING | E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
 
if (extension_loaded('redis')) {
 	ini_set("session.save_handler","redis");
 	ini_set("session.save_path","tcp://127.0.0.1:6379");
	ini_set("session.gc_maxlifetime","86400");
}
if (strpos($_SERVER["SERVER_SOFTWARE"],"nginx") !==false)
{
	$domain=$_SERVER['HTTP_HOST'];
	$domain = str_replace(":7000","",$domain);
}
else
{
	$domain=$_SERVER['SERVER_NAME'];
}


$domainArray=explode('.',$domain);
$domain=$domainArray[0];
if ($domain == '192') $domain = 'localhost';
$_SERVER['domain']=$domain;




if ( $domain != 'mail' && $domain != 'ldap' && $domain != 'jira' && $domain != 'crowd' && $domain != 'www' )
{

	//date_default_timezone_set('PRC');

	define('XN_INCLUDE_PREFIX', $_SERVER['DOCUMENT_ROOT']); 
	//define('XN_INCLUDE_PREFIX', 'c:/xampp/htdocs');  
	
	$_SERVER["HTTP_X_NING_LOCAL_API_HOST_PORT"]="127.0.0.1:8000";
	//$_SERVER["HTTP_X_NING_LOCAL_API_HOST_PORT"]="124.232.138.107:8000";//修改



	require XN_INCLUDE_PREFIX . '/XN/Cache.php';
	require XN_INCLUDE_PREFIX . '/XN/MemCache.php';
	require XN_INCLUDE_PREFIX . '/XN/Rob.php'; 
	require XN_INCLUDE_PREFIX . '/XN/Content.php';
	require XN_INCLUDE_PREFIX . '/XN/Profile.php';
	require XN_INCLUDE_PREFIX . '/XN/Application.php';
	require XN_INCLUDE_PREFIX . '/XN/Backup.php';
	require XN_INCLUDE_PREFIX . '/XN/Query.php';
	require XN_INCLUDE_PREFIX . '/XN/Exception.php'; 
	require XN_INCLUDE_PREFIX . '/XN/REST.php';
	require XN_INCLUDE_PREFIX . '/XN/AtomHelper.php'; 
	require XN_INCLUDE_PREFIX . '/XN/ModentityNum.php'; 
	//require XN_INCLUDE_PREFIX . '/XN/XG_App.php';

	 
	XN_REST::$LOCAL_API_HOST_PORT = $_SERVER['HTTP_X_NING_LOCAL_API_HOST_PORT'];
	XN_Application::$CURRENT_URL = $_SERVER['domain'];
	//XN_Profile::$VIEWER = "20snqodspk86x";

	   
	$login =  $_COOKIE['xn_id_'.XN_Application::$CURRENT_URL];  

	if ($login != null)
	{  
		XN_Profile::$VIEWER = $login;     
	} 
}
else if ($domain == 'www')
{
	$domain = "admin";
    $_SERVER['domain']=$domain;
	define('XN_INCLUDE_PREFIX', $_SERVER['DOCUMENT_ROOT']); 
	//define('XN_INCLUDE_PREFIX', 'c:/xampp/htdocs');  


	$_SERVER["HTTP_X_NING_LOCAL_API_HOST_PORT"]="127.0.0.1:8000";



	require XN_INCLUDE_PREFIX . '/XN/Cache.php';
	require XN_INCLUDE_PREFIX . '/XN/MemCache.php'; 
	require XN_INCLUDE_PREFIX . '/XN/Content.php';
	require XN_INCLUDE_PREFIX . '/XN/Profile.php';
	require XN_INCLUDE_PREFIX . '/XN/Application.php';
	require XN_INCLUDE_PREFIX . '/XN/Backup.php';
	require XN_INCLUDE_PREFIX . '/XN/Query.php';
	require XN_INCLUDE_PREFIX . '/XN/Exception.php'; 
	require XN_INCLUDE_PREFIX . '/XN/REST.php';
	require XN_INCLUDE_PREFIX . '/XN/AtomHelper.php'; 
	require XN_INCLUDE_PREFIX . '/XN/ModentityNum.php'; 
	//require XN_INCLUDE_PREFIX . '/XN/XG_App.php';

	 
	XN_REST::$LOCAL_API_HOST_PORT = $_SERVER['HTTP_X_NING_LOCAL_API_HOST_PORT'];
	XN_Application::$CURRENT_URL = $_SERVER['domain'];
	//XN_Profile::$VIEWER = "20snqodspk86x";

	   
	$login =  $_COOKIE['xn_id_'.XN_Application::$CURRENT_URL];  

	if ($login != null)
	{  
		XN_Profile::$VIEWER = $login;     
	} 
}

?>
