<?php
require_once('smarty/Smarty.class.php');
require_once("config.php");
require_once("misc.php");


class User{
	public $name;
	public $surname;
	public $email;
	public $cf;
	public function __construct($name, $surname, $email, $cf){
		$this->name=strtoupper($name);
		$this->surname=strtoupper($surname);
		$this->email=$email;
		$this->cf=strtoupper($cf);
	}

}


class Guest_application{
	private $allowed=['home', 'search_book', 'demand_book', 'confirm'];
	private $message=NULL;
	
	function __construct(){
		$this->tpl=new Smarty();
		foreach(ENV as $k => $v)
			$this->tpl->assign($k, $v);
		$this->tpl->assign('message', NULL);
	}
	public function set_message(string $m=NULL){
		if($m!=NULL) $this->message=$m;
		$this->tpl->assign('message', $this->message);
	}
	public function unset_message(){
		$this->tpl->clearAssign('message');
		$this->message=NULL;
	}
	public function get_page(string $page, array $params=[]){
		$page=$page=='' ? 'home' : $page;
		if(in_array($page, $this->allowed)) $this->{$page}($params); 
		else $this->page_not_found($page);
	}

	private function page_not_found($page){
		$this->message=get_message_html("Pagina <strong>$page</strong> non trovata");
		redirect();
	}

	private function home(array $params=[]){
		$this->set_message();
		$this->tpl->display(ENV['guest_tpl_prefix'].'home.tpl'); 
		$this->unset_message();
	}
	
	private function search_book(array $params=[]){//aggiungi controlli lunghezza
		if(isset($params['token'])){
			$category=param_by_name($params, 'category');
			$title=param_by_name($params, 'title');
			$author=param_by_name($params, 'author');
			$db=get_database_instance();
			$query="SELECT id_libro, titolo, autore, editore FROM libri WHERE 1=1";
			$numpar=0;
			$tobind=[];
			if($category!=NULL){
				$numpar++;
				$query.=" AND catalogazione LIKE CONCAT(?, '%')";
				$tobind[]=$category;
			}
			if($title!=NULL){
				$numpar+=2;
				$query.=" AND (levenshtein(LOWER(titolo), LOWER(?))<=2 OR LOWER(titolo) LIKE CONCAT('%', LOWER(?), '%')) ";
				$tobind[]=$title;
				$tobind[]=$title;
			}
			if($author!=NULL){
				$numpar+=2;
				$query.=" AND (levenshtein(LOWER(autore), LOWER(?))<=2 OR LOWER(autore) LIKE CONCAT('%', LOWER(?), '%'))";
				$tobind[]=$author;
				$tobind[]=$author;
			}
			$stmt=$db->prepare($query);
			if(count($tobind)>0)$stmt->bind_param(str_repeat('s', $numpar), ...$tobind);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($db_id, $db_titolo, $db_autore, $db_editore);
			$results=[];
			for($i=0; $i<$stmt->num_rows; $i++){
				$stmt->fetch();
				$results[]=["book_url" => ENV['domain_name']."/demand_book?bookID=$db_id&bookTitle=$db_titolo", 
								"autore" => $db_autore, 
								"titolo" => $db_titolo, 
								"editore" => $db_editore
							];
			}
			$this->tpl->assign('books', $results);
			$this->tpl->display(ENV['guest_tpl_prefix'].'search.tpl');
			
		}
		else redirect();
	}
	
	private function demand_book(array $params=[]){
		if(isset($params['token'])){
			$name=param_by_name($params, 'name');
			$surname=param_by_name($params, 'surname');
			$email=param_by_name($params, 'email');
			$cf=param_by_name($params, 'cf');
			//$start=param_by_name($params, 'start');
			//$end=param_by_name($params, 'end');
			if(!isset($this->demanding_bookID) || $this->demanding_bookID==NULL || !check_params([$name, $surname, $email, $cf])){
				$this->message=get_message_html("Impossibile richiedere il libro");
				redirect();
				return;
			}
			$user=new User($name, $surname, $email, $cf);
			setcookie('INFO', base64_encode(json_encode($user)), time()+(86400*30)); //30gg
			$db=get_database_instance();
			$req_ID=get_id_from_db($db);
			$secret_token=strtoupper(rand_token(16));
			$query="INSERT INTO richieste(id_richiesta, nome, cognome, cf, email, id_libro, token)
				 VALUES ('$req_ID', ?, ?, ?, ?, '$this->demanding_bookID', '$secret_token')";
			$stmt=$db->prepare($query);
			$stmt->bind_param("ssss", $user->name, $user->surname, $user->cf, $user->email);
			$stmt->execute();
			$stmt->close();
			$link=ENV['domain_name']."/confirm/$req_ID?secret=$secret_token";
			if(send_mail($user->email, "Conferma la tua richiesta", "Clicca sul link sottostante per confermare la tua richiesta <br><a href='$link'>$link</a>"))
					$this->message=get_message_html("Ok! Richiesta avvenuta, riceverai presto una mail di conferma.");
			else $this->message=get_message_html("Invio richiesta fallito!");
			redirect();
		}
		else{
			$bookid=param_by_name($params, "bookID");
			if($bookid==NULL){ 
				$this->message=get_message_html("Nessun libro scelto"); 
				redirect();
				return;
			}
			$booktitle=param_by_name($params, "bookTitle");
			$values=['title'=>strtoupper($booktitle), 'name'=>NULL, 'surname'=>NULL, 'email'=>NULL, 'cf'=>NULL];
			if(isset($_COOKIE['INFO'])){ 
				$v=sanitize_params(json_decode(base64_decode($_COOKIE['INFO']), true));
				$values['name']=param_by_name($v, 'name');
				$values['surname']=param_by_name($v, 'surname');
				$values['email']=param_by_name($v, 'email');
				$values['cf']=param_by_name($v, 'cf');
			}
			$this->demanding_bookID=$bookid;
			$this->tpl->assign('demand', $values);
			$this->set_message();
			$this->tpl->display(ENV['guest_tpl_prefix'].'demand.tpl');
			$this->unset_message();
		}
	}
	
	private function confirm(array $params=[]){
		if(!isset($params['PATH'][2])){$this->message=get_message_html('ID richiesta non specificato'); redirect(); return;}
		$req_id=$params['PATH'][2]; //da cambiare
		$db=get_database_instance();
		$stmt=$db->prepare("UPDATE richieste SET validato=1, token=NULL WHERE id_richiesta=? AND token=? AND validato=0");
		$token=param_by_name($params, 'secret');
		$stmt->bind_param('ss', $req_id, $token); 
		$stmt->execute(); 
		$stmt->store_result();
		$this->message=get_message_html("Richiesta confermata");
		redirect();
	}
	
}
