<?php
require_once("libs/misc.php");
require_once("libs/admin.php");
require_once("libs/guest.php");

function handle(string $action){
	$action=explode('?', $action)[0];
	$path=explode('/', $action);
	$params=get_params($_SERVER['REQUEST_METHOD']);
	$params['PATH']=sanitize_params($path);
	if($path[1]=='admin'){
		if(!isset($_SESSION['admin_instance']))
			$_SESSION['admin_instance']=new Admin_application();
		$application=&$_SESSION['admin_instance'];
		$page=count($path)>2 ? $path[2] : '';
		$application->get_page($page, $params);
	}
	else{
		if(!isset($_SESSION['guest_instance']))
			$_SESSION['guest_instance']=new Guest_application();
		$application=&$_SESSION['guest_instance'];
		$page=count($path)>1 ? $path[1] : '';
		$application->get_page($page, $params);
	}
}

try{
	//uncomment in production 
	set_error_handler(function (int $errno, string $message){
							throw new Exception($message);
						}); 
	session_start();
	handle($_SERVER['REQUEST_URI']);
}
catch(Exception $e){
	$application=new Guest_application();
	$application->set_message(get_message_html("Errore generico: ".$e->getMessage()));
	$application->get_page('');
}
?>
