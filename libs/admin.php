<?php
require_once('smarty/Smarty.class.php');
require_once("config.php");
require_once("misc.php");

Class Admin{
	public $id;
	public $nome;
	public $cognome;
	public $email;
	function __construct($id, $nome, $cognome, $email){
		$this->id=$id;
		$this->nome=strtoupper($nome);
		$this->cognome=strtoupper($cognome);
		$this->email=$email;
	}
}

class Reset_Procedure{
	private const toreturn_forms=[" <form method='POST' action='".ENV['domain_name']."/admin/reset_password/step_1'>
								<input type='hidden' name='token' value='1'>
								<div class='form-group'>
									<div class='form-label-group'>
										  <input type='email' id='inputEmail' name='email' class='form-control' placeholder='Email address' required='required' autofocus='autofocus'>
										  <label for='inputEmail'>Email</label>
									</div>
								</div>
								<input type='submit' class='btn btn-primary btn-block' value='Ok'>
							 </form> ",
							 "<form method='POST' action='".ENV['domain_name']."/admin/reset_password/step_2'>
								<input type='hidden' name='token' value='1'>
								<div class='form-group'>
									<div class='form-label-group'>
										  <input type='password' id='code' name='code' class='form-control' placeholder='Codice OTP' required='required' autofocus='autofocus'>
										  <label for='code'>Codice OTP</label>
									</div>
								</div>
								<input type='submit' class='btn btn-primary btn-block' value='Ok'>
							 </form>",
							 "<form method='POST' action='".ENV['domain_name']."/admin/reset_password/step_3'>
									<input type='hidden' name='token' value='1'>
									<div class='form-group'>
												<div class='form-label-group'>
													<input type='password' id='inputPassword' name='password' class='form-control' placeholder='Password' required='required'>
													<label for='inputPassword'>Password</label>
												</div>
									</div>
									<div class='form-group'>
												<div class='form-label-group'>
													<input type='password' id='confirmPassword'  class='form-control' placeholder='Confirm password' required='required'>
													<label for='confirmPassword'>Conferma password</label>
												</div>
									</div>
									<input type='submit' class='btn btn-primary btn-block' value='Modifica Password'>
								</form>"
							];
	public function __construct(){ $this->validated=False;}
	
	private static function msg(string $str=''){
		return '<div class="text-center"><span class="d-block small mt-3" id="message_box"><p style="color: black;">'.$str.'</p></span></div>';
	}
	
	public function procedure(array $params=[]){
		$state=param_by_name(param_by_name($params, 'PATH'), 3);
		if($state=='step_0' || $state==NULL) return Reset_Procedure::toreturn_forms[0];
		if($state=='step_1'){ 
			$email=param_by_name($params, 'email');
			if(!(isset($params['token']) && check_params([$email]))) return Reset_Procedure::toreturn_forms[0];
			$db=get_database_instance();
			$stmt=$db->prepare("SELECT id_amministratore FROM amministratori WHERE email=?");
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows!=1) return  Reset_Procedure::toreturn_forms[0].Reset_Procedure::msg('Email errata');
			$stmt->bind_result($id);
			$stmt->fetch();
			$this->otp_code=rand_token(3);
			$this->id=$id;
			send_mail($email, 'Reset Password', "Ciao, è stato richiesto un cambio password per l'account legato a questo indirizzo mail, 
												per confermarlo inserisci questo codice univoco: <strong>".$this->otp_code."</strong>");
			return Reset_Procedure::msg('Inserisci il codice che ti è stato inoltrato per mail').Reset_Procedure::toreturn_forms[1];
		}
		if($state=='step_2'){
			$code=param_by_name($params, 'code');
			if($code!=$this->otp_code) return Reset_Procedure::toreturn_forms[1].Reset_Procedure::msg("Codice OTP errato");
			$this->validated=True;
			return Reset_Procedure::toreturn_forms[2];
		}
		if($state=='step_3'){
			if(!$this->validated) return Reset_Procedure::toreturn_forms[1];
			$passwd=param_by_name($params, 'password');
			if(!isset($params['token']) || !check_params([$passwd])) return Reset_Procedure::toreturn_forms[2];
			$db=get_database_instance();
			$passwd=hash('sha256', $passwd);
			$stmt=$db->prepare("UPDATE amministratori SET passwd=? WHERE id_amministratore=?");
			$stmt->bind_param('ss', $passwd, $this->id);
			$stmt->execute();
			$stmt->store_result();
			return Reset_Procedure::msg("Password modificata con successo")."<a href='".ENV['domain_name']."/admin'><button class='btn btn-primary btn-block'>Torna al Login</button></a>";
		}
	}
}

Class Admin_application{

	private $admin=NULL;
	private $tpl;
	private $message=NULL;
	private $allowed= [ 'login',  'home', 'reset_password', 'logout', 'management', 'loans', 'books', 'new_book', 'register'];
	private $no_login_required= [ 'register', 'reset_password'];
	public function __construct(){
		$this->admin=NULL;
		$this->message='';
		$this->tpl= new Smarty;
		$this->tpl->caching = false;
		foreach(ENV as $name => $value) {
			$this->tpl->assign($name, $value);
		}
	}
	
	public function is_logged(){
		return $this->admin!=NULL ? True : False;
	}	
	
	private function set_message(){
		$this->tpl->assign('message', $this->message);
	}
	
	private function unset_message(){
		$this->tpl->clearAssign('message');
		$this->message=NULL;
	}
	
 	public function get_page(string $page, array $params=[]){
		$page= $page=='' ? 'home' : $page;
		if($this->is_logged()){
			if(in_array($page, $this->allowed)) $this->{$page}($params);
			else $this->page_not_found($page);
		}
		else if(in_array($page, $this->no_login_required))
			$this->{$page}($params);
		else $this->login($params);
		
	}

	private function page_not_found($page){
		header("HTTP/1.0 404 Not Found");
		echo "<div align='center'><h1>Pagina $page non trovata</h1></div>";
	}
	
	private function logout(array $params=[]){
		$this->admin=NULL;
		redirect('/admin');
	}
	
	private function reset_password(array $params=[]){
		$new=param_by_name(param_by_name($params, 'PATH'), 3);
		if(!property_exists($this, 'reset_p')){
			$this->reset_p=new Reset_Procedure();
		}
		$res=$this->reset_p->procedure($params);
		$this->tpl->assign('form', $res);
		$this->set_message();
		$this->tpl->display(ENV['admin_tpl_prefix'].'reset.tpl');
		$this->unset_message();
		return;
	}
	
	private function register(array $params=[]){
		if(isset($params['token'])){
			$masterkey=param_by_name($params, 'masterkey');
			$name=param_by_name($params, 'name');
			$surname=param_by_name($params, 'surname');
			$email=param_by_name($params, 'email');
			$passwd=param_by_name($params, 'password');
			if(!check_params([$masterkey, $name, $surname, $email, $passwd])){
				$this->message="<span style='color: red'>Impossibile registrare nuovo admin, parametri errati</span>";
				redirect('/admin/login');
				return;
			}
			$masterkey=hash('sha256', $masterkey);
			$passwd=hash('sha256', $passwd);
			if($masterkey!=MASTER_KEY){
				$this->message="<span style='color: red'>Impossibile registrare nuovo admin, MasterKey errata</span>";
				redirect('/admin/login');
				return;
			}
			$db=get_database_instance();
			$stmt=$db->prepare("INSERT INTO amministratori VALUES(HEX(UUID_SHORT()), ?, ?, ?, ?)");
			$stmt->bind_param('ssss', $name, $surname, $email, $passwd);
			$stmt->execute();
			$stmt->store_result();
			$this->message="<span style='color: green'>Amministratore registrato correttamente!</span>";
			redirect('/admin/login');
		}
		else $this->tpl->display(ENV['admin_tpl_prefix'].'register.tpl');
	}
	
	private function login(array $params=[]){
		if($this->is_logged())redirect('/admin');
		if(isset($params['token'])){
			$email=param_by_name($params, 'inputemail');
			$hash_passwd=hash('sha256', param_by_name($params, 'inputpassword'));
			if(!check_params([$email, $hash_passwd])){
				$this->message="<span style='color: red'>Parametri errati</span>";
				redirect('/admin/login');
				return;
			}
			$db=get_database_instance();
			$stmt=$db->prepare("SELECT id_amministratore, nome, cognome, email, passwd FROM amministratori WHERE email=?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows==1){
				$stmt->bind_result($id, $nome, $cognome, $email, $db_passwd);
				$stmt->fetch();
				if($db_passwd==$hash_passwd){
					$this->message=NULL;
					$this->admin=new Admin($id, $nome, $cognome, $email);
					$this->tpl->registerObject('admin', $this->admin);
					redirect('/admin');
					return;
				}
				else
					$this->message="<p style='color: red;'>Password errata</p>";
			}
			else $this->message="<p style='color: red;'>Utente non esistente</p>";
				
			$stmt->close();
			$db->close();
		}
		//else $this->message=NULL;
		$this->set_message();
		$this->tpl->display(ENV['admin_tpl_prefix'].'login.tpl');
		$this->unset_message();
	}
	
	private function home(array $params=[]){
		$query="SELECT richieste.id_richiesta, richieste.email, richieste.nome, richieste.cognome, libri.titolo, libri.autore, libri.id_libro 
		FROM richieste INNER JOIN libri ON richieste.id_libro=libri.id_libro WHERE richieste.id_richiesta NOT IN (SELECT id_richiesta FROM prestiti) AND richieste.validato=1 AND richieste.rifiutato=0";
		$db=get_database_instance();
		$stmt=$db->prepare($query);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_richiesta, $email, $nome, $cognome, $titolo, $autore, $id_libro);
		$requests=[];
		for($i=0; $i<$stmt->num_rows; $i++){
			$stmt->fetch();
			$requests[]= ['id_richiesta'=> $id_richiesta, 
						  'email'=>$email,
						  'nome'=>$nome,
						  'cognome'=>$cognome,
						  'titolo'=>$titolo, 
						  'autore'=>$autore, 
						  'id_libro'=>$id_libro, 
						  'link_accept'=>ENV['domain_name']."/admin/management/accept/$id_richiesta", 
						  'link_reject'=>ENV['domain_name']."/admin/management/reject/$id_richiesta"
						 ]; 
		}
		$this->tpl->assign('requests', $requests);
		$this->set_message();
		$this->tpl->display(ENV['admin_tpl_prefix'].'home.tpl');
		$this->unset_message();
	}


	private function loans(array $params=[]){
		$query="SELECT UPPER(amministratori.nome), UPPER(amministratori.cognome), libri.id_libro, libri.titolo, 
				libri.autore, richieste.nome, richieste.cognome, prestiti.id_prestito, 
				prestiti.data_start, DATE_ADD(prestiti.data_start, INTERVAL prestiti.durata DAY), richieste.email, DATEDIFF(DATE_ADD(prestiti.data_start, INTERVAL prestiti.durata DAY), CURDATE()) as d FROM prestiti, amministratori, richieste, libri 
				WHERE libri.id_libro=richieste.id_libro
				AND prestiti.id_richiesta=richieste.id_richiesta
				AND prestiti.id_amministratore=amministratori.id_amministratore
				AND prestiti.restituito=0";
		$db=get_database_instance();
		$stmt=$db->prepare($query);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($admin_name, $admin_surname, $bookid, $title, $author, $name, $surname, $loanid, $start, $end, $email, $days);
		$loans=[];
		for($i=0; $i<$stmt->num_rows; $i++){
			$stmt->fetch();
			$loan=['admin_nome'=>$admin_name, 
					  'admin_cognome'=>$admin_surname,
					  'nome'=>$name, 
					  'cognome'=>$surname,
					  'email'=>$email, 
					  'titolo'=>$title, 
					  'autore'=>$author, 
					  'id_libro'=>$bookid, 
					  'id_prestito'=>$loanid, 
					  'data_inizio'=>$start, 
					  'data_fine'=>$end, 
					  'link_giveback'=>ENV['domain_name']."/admin/management/giveback/$loanid",
					  'link_report'=>ENV['domain_name']."/admin/management/report/$loanid"
					  ];
			if(intval($days)<=0)$loan['data_fine']="<span class='text-danger'>".$loan['data_fine']."</span>";
			$loans[]=$loan;
		}
		$this->tpl->assign('loans', $loans);
		$this->set_message();
		$this->tpl->display(ENV['admin_tpl_prefix'].'loans.tpl');
		$this->unset_message();
	}
	
	private function books(array $params=[]){
		$action=param_by_name(param_by_name($params, 'PATH'), 3);
		if($action=='search' || $action==NULL){
			$title=param_by_name($params, 'title');
			$author=param_by_name($params, 'author');
			$bookid=param_by_name($params, 'bookID');
			$category=param_by_name($params, 'category');
			$db=get_database_instance();
			$query="SELECT richieste.id_libro FROM richieste INNER JOIN prestiti ON richieste.id_richiesta=prestiti.id_richiesta WHERE prestiti.restituito=0 OR prestiti.restituito IS NULL";
			$res=$db->query($query);
			$in_loan=[];
			for($i=0; $i<$res->num_rows; $i++) $in_loan[]=$res->fetch_array()[0];
			$query="SELECT id_libro, titolo, autore, editore, catalogazione, posizione, annotazioni FROM libri WHERE 1=1 ";
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
			if($bookid!=NULL){
				$numpar++;
				$query.=" AND id_libro=? LIMIT 1";
				$tobind[]=$bookid;
			}
			$stmt=$db->prepare($query);
			if(count($tobind)>0)$stmt->bind_param(str_repeat('s', $numpar), ...$tobind);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($bookid, $title, $author, $editor, $category, $location, $notes);
			$books=[];
			for($i=0; $i<$stmt->num_rows; $i++){
				$stmt->fetch();
				$books[]=[
						'bookid'=>$bookid,
						'title'=>$title,
						'author'=>$author, 
						'editor'=>$editor, 
						'category'=>$category,
						'location'=>$location,
						'notes'=>$notes,
						'state'=> (in_array($bookid, $in_loan)==1 ? "red" : "green"),
						'mod_url'=>ENV['domain_name']."/admin/books/$bookid"
						 ];
			}
			$this->tpl->assign('books', $books);
			$this->set_message();
			$this->tpl->display(ENV['admin_tpl_prefix'].'books.tpl');
			$this->unset_message();

		}
		else{
			$ID=$action;
			$db=get_database_instance();
			$stmt=$db->prepare("SELECT id_libro, titolo, autore, editore, catalogazione, posizione, annotazioni FROM libri WHERE id_libro=? LIMIT 1");
			$stmt->bind_param("s", $ID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows!=1){
				$this->message=get_message_html("ID Libro non corretto.");
				redirect('/admin/books');
				return;
			}
			$stmt->bind_result($id, $title, $editor, $author, $category, $location,  $notes);
			$stmt->fetch();
			$form_fields=['action'=>"/admin/management/modify/$id",
						  'title'=>$title,
						  'editor'=>$editor,
						  'author'=>$author,
						  'category'=>$category,
						  'location'=>$location,
						  'notes'=>$notes];
			$delete_link=ENV['domain_name']."/admin/management/delete/$id";
			$this->tpl->assign('form_fields', $form_fields);
			$this->tpl->assign('delete_link', $delete_link);
			$this->tpl->assign('act_page', 'Modifica Libro');
			$this->set_message();
			$this->tpl->display(ENV['admin_tpl_prefix'].'book_scheme.tpl');
			$this->unset_message();
			
		}
		
	}
	
	private function new_book(array $params=[]){
		$form_fields=['action'=>"/admin/management/add", 
					  'title'=>NULL,
					  'author'=>NULL,
					  'category'=>NULL,
					  'editor'=>NULL,
					  'location'=>NULL,
					  'notes'=>NULL
					 ];
		$this->tpl->assign("form_fields", $form_fields);
		$this->tpl->assign("delete_link", NULL);
		$this->tpl->assign('act_page', 'Aggiungi Libro');
		$this->set_message();
		$this->tpl->display(ENV['admin_tpl_prefix'].'book_scheme.tpl');
		$this->unset_message();
	}
	
		
	private function management(array $params=[]){
		$action=param_by_name(param_by_name($params, 'PATH'), 3);
		if($action==NULL || !in_array($action, ['accept', 'reject', 'giveback', 'report', 'modify', 'add', 'delete'])){
			$this->message=get_message_html("Errore nella request.");
			redirect('/admin');
			return;
		}
		$db=get_database_instance();
		if(in_array($action, ['accept', 'reject'])){ //azioni su richieste
			$ID=param_by_name(param_by_name($params, 'PATH'), 4);
			$stmt=$db->prepare("SELECT richieste.email, libri.titolo, richieste.nome, richieste.cognome FROM richieste INNER JOIN libri ON richieste.id_libro=libri.id_libro WHERE id_richiesta=? LIMIT 1");
			$stmt->bind_param("s", $ID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows!=1){
				$this->message=get_message_html("ID Richiesta libro non corretto.");
				redirect('/admin');
				return;
			}
			else{
				$stmt->bind_result($email, $titolo, $nome, $cognome);
				$stmt->fetch();
				if($action=='accept'){
					$start=param_by_name($params, 'start');
					if(!check_params([$start])){ 
						$this->message=get_message_html("Errore nella request.");
						redirect('/admin');
						return;
					}
					$this->message=Management::accept($this->admin, $db, $ID, $email, $titolo, $nome, $cognome, $start, ENV['loan_period']);
				}
				else if($action=='reject')
					$this->message=Management::reject($db, $ID, $email, $titolo, $nome);
					
				redirect('/admin');
			}
		}
		else if(in_array($action, ['giveback', 'report'])){ //azioni su prestiti
			$ID=param_by_name(param_by_name($params, 'PATH'), 4);
			$stmt=$db->prepare("SELECT richieste.nome, richieste.cognome, richieste.email, DATEDIFF(DATE_ADD(prestiti.data_start, INTERVAL prestiti.durata DAY), CURDATE()) as giorni, libri.titolo, libri.autore FROM prestiti, richieste, libri
			WHERE prestiti.id_richiesta=richieste.id_richiesta AND richieste.id_libro=libri.id_libro AND prestiti.id_prestito=? LIMIT 1");
			$stmt->bind_param('s', $ID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows!=1){
				$this->message=get_message_html("ID Prestito libro non corretto.");
				redirect('/admin/loans');
				return;
			}
			else{
				$stmt->bind_result($name, $surname, $email, $days, $title, $author);
				$stmt->fetch();
				if($action=='giveback')
					$this->message=Management::giveback($db, $ID);
				else if($action=='report')
					$this->message=Management::report($db, $name, $surname, $email, $days, $title, $author);
				
				redirect('/admin/loans');
			}
		}
		else if(in_array($action, ['modify', 'add', 'delete'])){ //azioni su libri
			if($action=='modify'){
				$ID=param_by_name(param_by_name($params, 'PATH'), 4);
				$stmt=$db->prepare("SELECT 1 FROM libri WHERE id_libro=? LIMIT 1");
				$stmt->bind_param('s', $ID);
				$stmt->execute();
				$stmt->store_result();
				if($stmt->num_rows!=1){
					$this->message=get_message_html("ID Libro non corretto.");
					redirect('/admin/books');
					return;
				}
				$title=param_by_name($params, 'title');
				$editor=param_by_name($params, 'editor', '');
				$author=param_by_name($params, 'author', '');
				$category=param_by_name($params, 'category', '');
				$location=param_by_name($params, 'location', '');
				$notes=param_by_name($params, 'notes', '');
				if(!check_params([$title])){
					$this->message=get_message_html("Impossibile modificare il libro., $title - $author, $category");
					redirect('/admin/books');
					return;
				}
				$this->message=Management::modify($db, $ID, $title, $author, $editor, $category, $location, $notes);
				redirect('/admin/books');
			}
			else if($action=='add'){
				$title=param_by_name($params, 'title');
				$author=param_by_name($params, 'author', '');
				$editor=param_by_name($params, 'editor', '');
				$category=param_by_name($params,'category', '');
				$location=param_by_name($params, 'location', '');
				$notes=param_by_name($params, 'notes', '');
				if(!check_params([$title])){
					$this->message=get_message_html("Impossibile aggiungere il libro.");
					redirect('/admin');
					return;
				}
				$this->message=Management::add($db, $title, $author, $editor, $category, $location, $notes);
				redirect('/admin');
			}
			else if($action=='delete'){
				$ID=param_by_name(param_by_name($params, 'PATH'), 4);
				if(!check_params([$ID])){
					$this->message=get_message_html("Nessun id libro specificato.");
					redirect('/admin/books');
					return;
				}
				$this->message=Management::delete($db, $ID);
				redirect('/admin/books');
			}
		}
		else{
			$this->message=get_message_html("Errore nella request.");
			redirect('/admin');
			return;
		}
	}
	
}

class Management{
	static public function accept(Admin $admin, MySqli $db, string $ID, string $email, string $titolo, string $nome, string $cognome, string $start, int $period) : string{
		$stmt=$db->prepare("SELECT id_prestito FROM prestiti INNER JOIN richieste ON prestiti.id_richiesta=richieste.id_richiesta WHERE  
							(NOT ((STR_TO_DATE(?, '%Y-%m-%d')>DATE_ADD(prestiti.data_start, INTERVAL prestiti.durata DAY) || DATE_ADD(STR_TO_DATE(?, '%Y-%m-%d'), INTERVAL ? DAY)<prestiti.data_start)))
							AND prestiti.restituito=0
							AND richieste.id_libro=(SELECT id_libro FROM richieste WHERE id_richiesta=?)"); //controllo overlapping tra più prenotazioni
		$stmt->bind_param("ssds", $start, $start, $period, $ID);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows>0)
			return get_message_html("Impossibile accettare questa richiesta poichè in conflitto con un altro prestito.");
		$stmt=$db->prepare("INSERT INTO prestiti(id_prestito, id_amministratore, id_richiesta, data_start, durata) VALUES(HEX(UUID_SHORT()), ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), ?)");
		$stmt->bind_param("sssd", $admin->id, $ID, $start, $period);
		$stmt->execute();
		$stmt->store_result();
		$start=join('/', array_reverse(explode('-', $start)));
		send_mail($email, "Richiesta libro accettata", "Ciao <strong>$nome</strong>, <br \>
														ti informiamo che la tua richiesta per il libro <i>$titolo</i> è stata accettata da un 
														responsabile, potrai venire a ritirare il tuo libro il giorno <strong>$start</strong>.
														Ricordati di riconsegnarlo entro <strong>30</strong> giorni dalla data del ritiro.<br><br>
														A presto!");
		return get_message_html("Ok, richiedente avvisato!");
	}
	
	static public function reject(MySQLi $db, string $ID , string $email, string $titolo, string $nome) : string{
		$stmt=$db->prepare("UPDATE richieste SET rifiutato=1 WHERE id_richiesta=?");
		$stmt->bind_param("s", $ID);
		$stmt->execute();
		$stmt->store_result();
		send_mail($email, "Richiesta libro rifiutata", "Ciao <strong>$nome</strong>, <br \>
														ci dispiace ma ti informiamo che il libro <i>$titolo</i> non è disponibile per il periodo da te scelto. 
														Ti invitiamo a riprovare nuovamente.<br><br>
														A presto!");
		return get_message_html("Ok, richiedente avvisato!");
	}
	static public function giveback(MySQLi $db, string $ID): string {
		$stmt=$db->prepare("UPDATE prestiti SET restituito=1 WHERE id_prestito=?");
		$stmt->bind_param('s', $ID);
		$stmt->execute();
		$stmt->store_result();
		return "";
	}
	static public function report(MySQLi $db, string $nome, string $cognome, string $email, string $giorni, string $titolo, string $autore): string {
		$giorni=intval($giorni);
		$message="Ciao <strong>$nome</strong>,<br>
				ti informiamo che il prestito per il libro <i>$titolo</i> di $autore %s.
				Ti invitiamo a rispettare tale scadenza.<br>
				A presto!";
		if($giorni>0)
			$message=sprintf($message, "terminerà tra $giorni giorni");
		else if($giorni<0)
			$message=sprintf($message, "è terminato da $giorni giorni");
		else $message=sprintf($message, "termina oggi");
		send_mail($email, "Avviso", $message);
		return get_message_html("Inivata email di sollecito a $nome $cognome");
	}
	
	static public function add(MySQLi $db, string $title, string $author, string $editor, string $category,string $location,  string $notes) : string {
		$stmt=$db->prepare("INSERT INTO libri VALUES(HEX(UUID_SHORT()), ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssss', $category, $title, $editor, $author, $location, $notes);
		$stmt->execute();
		$stmt->store_result();
		return get_message_html("Libro inserito correttamente");
	}
	
	static public function modify(MySQLi $db, string $id, string $title, string $author, string $editor, string $category, string $location, string $notes): string{
		$stmt=$db->prepare("UPDATE libri SET titolo=?, autore=?, editore=?, catalogazione=?, posizione=?, annotazioni=? WHERE id_libro=?");
		$stmt->bind_param('sssssss', $title, $author, $editor, $category, $location, $notes, $id);
		$stmt->execute();
		$stmt->store_result();
		return get_message_html("Libro aggiornato correttamente");
	}
	
	static public function delete(MySQLi $db, string $id): string{
		$stmt=$db->prepare("DELETE FROM libri WHERE id_libro=?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->store_result();
		return get_message_html("Libro eliminato correttamente");
	}
}




