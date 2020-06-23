<?php
// Recupero i valori inseriti nel form
$nome = $_POST['nome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$argomento = $_POST['argomento'];
$msg = $_POST['msg'];
$url = $_POST['url'];

$delay = "4";
$url = "www.agricoladenicolo.altervista.org/menu.html";

// verifico che tutti i campi siano stati compilati
if (!$nome || !$email || !$tel || !$argomento || !$msg) {
  echo 'Tutti i campi del modulo sono obbligatori!';    
}
// verifico che il nome non contenga caratteri nocivi
elseif (!preg_match('/^[A-Za-z \'-]+$/i',$nome)) {
  echo 'Il nome contiene caratteri non ammessi';    
}
// verifico se un indirizzo email è valido
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Indirizzo email non corretto';
}else{
 
// compilo un messaggio combinando i dati recuperati dal form
$testo = "Nome: " . $nome . "\n"
       . "Email: " . $email . "\n"
       . "Tel: " . $tel . "\n"
       . "Argomento: " . $argomento . "\n"
       . "Messaggio: " . $msg;

// uso la funzione mail di PHP per inviare questi dati al mio indirizzo di posta
mail('vito.dn83@gmail.com', 'Mail azienda agricola', $testo);

// Mostro un messaggio di conferma all'utente
print "<body>
<table align='center' bordercolor='#CCCCCC'>
  <tr>
    <td>
<div align='center'><font face='Verdana, Arial, Helvetica, sans-serif'>
Grazie per averci contattato</font><br><br>
Uno dei nostri consulenti le risponderà al più presto all'indirizzo $email<br><br>		
Per tornare all'Home attendi 4 secondi o <a href=''>Clicca qui</a></font></div></td>
<meta http-equiv='refresh' content='$delay;  url=$url'>
</tr>
</table>
</body>";
}
?>