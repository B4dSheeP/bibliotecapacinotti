<?php
require_once("config.php");


function sanitize_params(array $a=[]) : array{
	$new_a=[];
	foreach($a as $name => $value)$new_a[$name]=htmlspecialchars($value, ENT_QUOTES);//do other stuff here 
	return $new_a;
}

function get_params(string $method='GET') : array{
	if($method=='GET')$a=$_GET;
	else if($method=='POST')$a=$_POST;
	$res=[];
	foreach($a as $name => $value)$res[$name]=$value; 
	return sanitize_params($res);
}

function get_database_instance() : object{
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$db=new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");
	return $db;
}

function redirect(string $path='/'){
	header("location: ".$path);
}

function param_by_name(array $params, $name, $default=NULL ,string $null_value=''){
	if(!isset($params[$name]) || $params[$name]==$null_value) return $default;
	return $params[$name];
}


function rand_token(int $length): string {
	$finalstr="";
	for($i=0; $i<$length; $i++) $finalstr.=pack("C", rand(0, 255));
	return bin2hex($finalstr);
}

function get_message_html(string $message): string{
	return "
	<div class=\"modal fade\" id=\"myModal\">
		<div class=\"modal-dialog\">
			<div class=\"modal-content\">
      
				<!-- Modal Header -->
				<div class=\"modal-header\">
					<h4 class=\"modal-title\">Messaggio del sistema</h4>
					<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
				</div>
        
				<!-- Modal body -->
				<div class=\"modal-body\">
					$message
				</div>
        
				<!-- Modal footer -->
				<div class=\"modal-footer\">
					<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Chiudi</button>
				</div>
        
			</div>
		</div>
	</div>
		";
	
}

function send_mail(string $to, string $subject, string $content): bool{
	$headers=['From' => MAIL_SENDER_FROM,
			  'Content-Type' => 'text/html; charset="UTF-8"'
			  ];
	return mail($to, $subject, $content, $headers); 
}

function get_id_from_db($db_instance): string{
	$res=$db_instance->query("SELECT HEX(UUID_SHORT())");
	return $res->fetch_array()[0];
}

function check_params(array $required) : bool{
	foreach($required as $i) if($i==NULL) return false;
	return true;
}


