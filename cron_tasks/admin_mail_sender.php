<?php
chdir('/home/biblioteve');
require_once('www/libs/config.php');
require_once('www/libs/misc.php');
/*
define("DB_SERVER", "bibliotevebiblio.mysql.db"); 
define("DB_USER", "bibliotevebiblio"); 
define("DB_PASS", "NuPNruL9R7m8Jx"); 
define("DB_NAME", "bibliotevebiblio");
define("MAIL_SENDER_FROM", 'Mailing System bibliotecapacinotti <system@bibliotecapacinotti.it>');



function send_mail(string $to, string $subject, string $content): bool{
	$headers=['From' => MAIL_SENDER_FROM,
			  'Content-Type' => 'text/html; charset="UTF-8"'
			  ];
	return mail($to, $subject, $content, $headers); 
}

function get_database_instance() : object{
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$db=new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$db->set_charset("utf8");
	return $db;
}
*/

$db=get_database_instance();
$res=$db->query("SELECT COUNT(*) FROM richieste WHERE rifiutato=0 AND validato=1 AND id_richiesta NOT IN(SELECT id_richiesta FROM prestiti)");
$num_new=$res->fetch_array()[0];
$res=$db->query("SELECT UPPER(nome) as nome, email FROM amministratori WHERE notifiche=1");
if($num_new>0){
	$str=$num_new==1 ? "è arrivata una nuova richiesta di prestito" : "ci sono $num_new nuove richieste di prestito";
	for($i=0; $i<$res->num_rows; $i++){
		$row=$res->fetch_object();
		send_mail($row->email, "Nuove richieste", "Ciao <strong>$row->nome</strong>, ".$str.". <a href='".ENV['domain_name']."/admin'>Accedi</a> alla piattaforma per gestirle.");
	}
}


