<?php

define("DB_SERVER", ""); 
define("DB_USER", ""); 
define("DB_PASS", ""); 
define("DB_NAME", "");
define("MASTER_KEY", ""); //hashed sha256
define("MAIL_SENDER_FROM", 'Mailing System bibliotecapacinotti <system@bibliotecapacinotti.it>');



define("ENV", ["title" => "Biblioteca Pacinotti", 
				"domain_name" => "https://bibliotecapacinotti.online", 
				"footer_phrase" => "Biblioteca Pacinotti @".date('Y')." <br/>Developers: Christian Cotignola & Giulio Palumbo",
				"poetic_period" => ["<i>I libri pesano tanto: eppure, chi se ne ciba e se li mette in corpo, vive tra le nuvole</i><br><strong>Luigi Pirandello</strong>",
									"<i>Un libro ben scelto ti salva da qualsiasi cosa, persino da te stesso.</i><br><strong>Daniel Pennac</strong>",
									"<i>Questo lungo viaggio immobile che chiamiamo leggere.</i> <strong>Guy Goffette</strong>",
									"<i>Leggere è andare incontro a qualcosa che sta per essere e ancora nessuno sa cosa sarà.</i><br><strong>Italo Calvino</strong>",
									"<i>Ogni lettore, quando legge, legge se stesso.</i><br><strong>Marcel Proust</strong>",
									"<i>Un libro deve essere un’ascia per il mare ghiacciato che è dentro di noi.</i><br><strong>Franz Kafka</strong>",
									"<i>Talvolta penso che il paradiso sia leggere continuamente, senza fine.</i><br><strong>Virginia Woolf</strong>",
									"<i>Non leggete, come fanno i bambini, per divertirvi, o, come fanno gli ambiziosi per istruirvi. No,
									leggete per vivere.</i><br><strong>Gustave Flaubert</strong>",
									"<i>I libri mi riempivano il cranio e mi allargavano la fronte. Leggerli somigliava a prendere il largo
									con la barca, il naso era la prua, le righe onde.</i><br><strong>Erri De Luca</strong>",
									"<i>Ogni volta che si legge un buon libro, in qualche parte del mondo, una porta si apre per lasciare
									entrare più luce.</i><br><strong>Vera Nazarian</strong>",
									"<i>I libri sono riserve di grano da ammassare per l’inverno dello spirito.</i><br><strong>Marguerite Yourcenar</strong>",
									"<i>Non riesco a dormire se non sono circondato da libri.</i><br><strong>Jorge Louis Borges</strong>",
									"<i>I libri si rispettano usandoli, non lasciandoli stare.</i><br><strong>Umberto Eco</strong>",
									"<i>Il verbo leggere non sopporta l’imperativo.</i><br><strong>Gianni Rodari</strong>",
									"<i>Vorrei che tutti leggessero. Non per diventare letterati o poeti, ma perché nessuno sia più schiavo.</i><br><strong>Gianni Rodari</strong>",
									"<i>Una casa senza libri è come una stanza senza finestre.</i><br><strong>Marco Tullio Cicerone</strong>",
									"<i>«Per sognare non bisogna chiudere gli occhi, bisogna leggere.»</i><br><strong>Michel Foucault</strong>",
									"<i>«Non c’è nessun amico più leale di un libro.»</i><br><strong>Ernest Hemingway</strong>",
									"<i>«Quando leggo un libro, desidero che anche tu lo stia leggendo. Voglio sapere cosa ne pensi. Non è
									forse amore, questo?»</i><br><strong>Gabrielle Zevin</strong>",
									"<i>Leggere, leggere un libro – per me è questa l’esplorazione dell’universo.” </i><br><strong>Marguerite Duras</strong>",
									"<i>Se possedete una biblioteca e un giardino, avete tutto ciò che vi serve. </i><br><strong>Marco Tullio Cicerone</strong>",
									"<i>I libri ci offrono un godimento molto profondo, ci parlano, ci danno consigli e ci si congiungono,
									vorrei dire, di una loro viva e penetrante familiarità.</i><br><strong>Francesco Petrarca</strong>",
									"<i>“Un buon libro è un compagno che ci fa passare dei momenti felici.”</i><br><strong>Giacomo Leopardi</strong>",
									"<i>“Il bene di un libro sta nell' essere letto. Un libro è fatto di segni che parlano di altri segni, i quali a
									loro volta parlano delle cose. Senza un occhio che lo legga, un libro reca segni che non producono
									concetti, e quindi è muto.”</i><br><strong>Umberto Eco</strong>"][rand(0, 23)],
				"admin_tpl_prefix" => "admin_",
				"guest_tpl_prefix" => "guest_", 
				"loan_period" => 30
				]
);




